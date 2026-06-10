<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show wallet page
     */
    public function wallet()
    {
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
            
        return view('wallet.index', compact('user', 'transactions'));
    }
    
    /**
     * Show deposit page
     */
    public function showDepositPage()
    {
        return view('deposit');
    }
    
    /**
     * Initialize deposit with Flutterwave
     */
    public function initializeDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'payment_method' => 'required'
        ]);
        
        $user = auth()->user();
        $amount = $request->amount;
        $paymentMethod = $request->payment_method;
        
        // Handle Crypto/Skrill/TON payments (manual confirmation)
        if (in_array($paymentMethod, ['usdt_erc20', 'bitcoin', 'skrill', 'toncoin'])) {
            
            // Get wallet address based on payment method
            $walletAddresses = [
                'usdt_erc20' => '0xd5c306fb59ca0f50339debdec16584dda74e01b6',
                'bitcoin' => '14VyVjsrmTcPLxoU3EFij3U1gkTuv5iA3d',
                'skrill' => 'wagershiddenhub',
                'toncoin' => 'UQDD_0uFhyCXyaiylceNS8SfSVFNGNzOQoNHPqCsiH4yvTxv'
            ];
            
            $walletAddress = $walletAddresses[$paymentMethod] ?? null;
            
            // Store pending transaction
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'transaction_id' => Flutterwave::generateReference(),
                'amount' => $amount,
                'currency' => 'USD',
                'status' => 'pending',
                'payment_method' => $paymentMethod,
                'metadata' => json_encode([
                    'wallet_address' => $walletAddress,
                    'instructions' => "Send {$amount} USD equivalent to the wallet address above"
                ])
            ]);
            
            return redirect()->route('wallet.index')->with('crypto_payment', [
                'method' => $paymentMethod,
                'amount' => $amount,
                'address' => $walletAddress,
                'transaction_id' => $transaction->transaction_id
            ]);
        }
        
        // Handle M-Pesa (Kenya)
        if ($paymentMethod === 'mpesa') {
            $request->validate([
                'phone' => 'required|string'
            ]);
        }
        
        // Generate reference
        $reference = Flutterwave::generateReference();
        
        // Store transaction
        Transaction::create([
            'user_id' => $user->id,
            'transaction_id' => $reference,
            'amount' => $amount,
            'currency' => 'USD',
            'status' => 'pending',
            'payment_method' => $paymentMethod,
        ]);
        
        // Payment data for Flutterwave
        $paymentData = [
            'payment_options' => $this->getPaymentOptions($paymentMethod),
            'amount' => $amount,
            'email' => $user->email,
            'tx_ref' => $reference,
            'currency' => 'USD',
            'redirect_url' => route('flutterwave.callback'),
            'customer' => [
                'email' => $user->email,
                'name' => $user->name,
                'phonenumber' => $request->phone ?? $user->phone_number,
            ],
            'customizations' => [
                'title' => 'Betogram Deposit',
                'description' => "Deposit \${$amount} to betting account",
                'logo' => url('/images/logo.png'),
            ]
        ];
        
        // Initialize payment
        $payment = Flutterwave::initializePayment($paymentData);
        
        if ($payment['status'] !== 'success') {
            return back()->with('error', 'Unable to initiate payment. Please try again.');
        }
        
        return redirect($payment['data']['link']);
    }
    
    /**
     * Get payment options for Flutterwave
     */
    private function getPaymentOptions($method)
    {
        $options = [
            'card' => 'card',
            'mpesa' => 'mpesa',
            'paypal' => 'paypal'
        ];
        
        return $options[$method] ?? 'card';
    }
    
    /**
     * Handle Flutterwave callback
     */
    public function callback(Request $request)
    {
        $status = $request->status;
        $transactionId = Flutterwave::getTransactionIDFromCallback();
        
        $response = Flutterwave::verifyTransaction($transactionId);
        
        if ($response['status'] === 'success') {
            $data = $response['data'];
            
            if ($data['status'] === 'successful') {
                $user = User::where('email', $data['customer']['email'])->first();
                $transaction = Transaction::where('transaction_id', $transactionId)->first();
                
                if ($user && $transaction && $transaction->status === 'pending') {
                    $transaction->update([
                        'status' => 'success',
                        'payment_method' => $data['payment_type'],
                        'metadata' => json_encode($data)
                    ]);
                    
                    // Add balance to user
                    $user->balance = ($user->balance ?? 0) + $data['amount'];
                    $user->save();
                    
                    return redirect()->route('wallet.index')
                        ->with('success', 'Deposit of $' . number_format($data['amount'], 2) . ' successful!');
                }
            }
        }
        
        return redirect()->route('wallet.index')
            ->with('error', 'Payment verification failed. Please contact support.');
    }
}