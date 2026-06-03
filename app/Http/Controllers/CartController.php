<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Users;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return response()->json(['success' => 'Item added to cart', 'cart' => $this->getCart($userId)]);
    }

    public function removeFromCart(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $cartItemId = $request->input('cart_item_id');
        Cart::where('id', $cartItemId)->where('user_id', $userId)->delete();

        return response()->json(['success' => 'Item removed', 'cart' => $this->getCart($userId)]);
    }

    public function updateCart(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $cartItemId = $request->input('cart_item_id');
        $quantity = $request->input('quantity', 1);

        if ($quantity <= 0) {
            Cart::where('id', $cartItemId)->where('user_id', $userId)->delete();
        } else {
            Cart::where('id', $cartItemId)->where('user_id', $userId)->update(['quantity' => $quantity]);
        }

        return response()->json(['success' => 'Cart updated', 'cart' => $this->getCart($userId)]);
    }

    public function getCartItems(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        return response()->json($this->getCart($userId));
    }

    private function getCart($userId)
    {
        $items = Cart::where('user_id', $userId)
            ->with('product')
            ->get();

        $total = 0;
        $cartData = [];
        foreach ($items as $item) {
            $subtotal = $item->product->price * $item->quantity;
            $total += $subtotal;
            $cartData[] = [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'title' => $item->product->title,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'subtotal' => $subtotal,
            ];
        }

        return [
            'items' => $cartData,
            'total' => $total,
            'count' => count($items),
        ];
    }

    public function clearCart(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        Cart::where('user_id', $userId)->delete();
        return response()->json(['success' => 'Cart cleared']);
    }
}
