<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\Product;
use Session;

class PaymentController extends Controller
{
    public function initiateCheckout(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $paymentMethod = $request->input('payment_method'); // 'stripe' or 'paypal'
        if (!in_array($paymentMethod, ['stripe', 'paypal'])) {
            return response()->json(['error' => 'Invalid payment method'], 400);
        }

        // Get cart items
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        $totalAmount = 0;
        $items = [];
        foreach ($cartItems as $item) {
            $totalAmount += $item->product->price * $item->quantity;
            $items[] = [
                'product_id' => $item->product_id,
                'title' => $item->product->title,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ];
        }

        // Create order in DB
        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'payment_method' => $paymentMethod,
            'items' => $items,
        ]);

        if ($paymentMethod === 'stripe') {
            return $this->stripeCheckout($order, $items);
        } else {
            return $this->paypalCheckout($order, $items);
        }
    }

    private function stripeCheckout($order, $items)
    {
        // Mock Stripe checkout session
        // In production, use: Stripe\Checkout\Session::create(...)
        return response()->json([
            'checkout_url' => 'https://checkout.stripe.com/pay/cs_test_' . uniqid(),
            'session_id' => 'cs_test_' . uniqid(),
            'order_id' => $order->id,
            'message' => 'Stripe integration demo. In production, redirect to Stripe Checkout.',
        ]);
    }

    private function paypalCheckout($order, $items)
    {
        // Mock PayPal checkout
        // In production, use PayPal SDK to create payment
        return response()->json([
            'checkout_url' => 'https://www.paypal.com/checkoutnow?token=EC-' . uniqid(),
            'approval_url' => 'https://www.paypal.com/checkoutnow?token=EC-' . uniqid(),
            'order_id' => $order->id,
            'message' => 'PayPal integration demo. In production, redirect to PayPal.',
        ]);
    }

    public function stripeWebhook(Request $request)
    {
        // Handle Stripe webhook events (payment.intent.succeeded, etc.)
        // In production, verify webhook signature and process payment
        $payload = $request->all();
        
        if (isset($payload['data']['object']['metadata']['order_id'])) {
            $orderId = $payload['data']['object']['metadata']['order_id'];
            Order::where('id', $orderId)->update(['status' => 'completed']);
            
            // Clear cart on successful payment
            $order = Order::find($orderId);
            if ($order) {
                Cart::where('user_id', $order->user_id)->delete();
            }
        }

        return response()->json(['received' => true]);
    }

    public function paypalWebhook(Request $request)
    {
        // Handle PayPal webhook events (PAYMENT.SALE.COMPLETED, etc.)
        // In production, verify webhook and process payment
        $payload = $request->all();
        
        if (isset($payload['resource']['custom_id'])) {
            $orderId = $payload['resource']['custom_id'];
            Order::where('id', $orderId)->update(['status' => 'completed']);
            
            // Clear cart
            $order = Order::find($orderId);
            if ($order) {
                Cart::where('user_id', $order->user_id)->delete();
            }
        }

        return response()->json(['received' => true]);
    }

    public function checkoutSuccess(Request $request)
    {
        $userId = Session::get('user_id');
        $orderId = $request->input('order_id');

        $order = Order::where('id', $orderId)->where('user_id', $userId)->first();
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Simulate marking as completed (in production, wait for webhook)
        $order->update(['status' => 'completed']);
        
        // Clear cart
        Cart::where('user_id', $userId)->delete();

        return response()->json(['success' => 'Order completed', 'order' => $order]);
    }

    public function orderHistory(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $orders = Order::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($orders);
    }
}
