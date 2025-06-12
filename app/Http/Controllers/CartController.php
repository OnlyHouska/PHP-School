<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = $this->getCartItems();
        $total = $cartItems->sum('total');

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'integer|min:1|max:99'
        ]);

        $quantity = $request->get('quantity', 1);
        $sessionId = session()->getId();
        $userId = Auth::id();

        $cartItem = Cart::where('product_id', $product->id)
            ->where(function ($query) use ($sessionId, $userId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $quantity
            ]);
        } else {
            Cart::create([
                'session_id' => $sessionId,
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, Cart $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99'
        ]);

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(Cart $cartItem)
    {
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function clear()
    {
        $this->getCartItems()->each->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }

    private function getCartItems()
    {
        $sessionId = session()->getId();
        $userId = Auth::id();

        return Cart::with('product')
            ->where(function ($query) use ($sessionId, $userId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->get();
    }

    public function getCartCount()
    {
        return $this->getCartItems()->sum('quantity');
    }

    public function checkout()
    {
        $cartItems = $this->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $cartItems->each->delete();

        return redirect()->route('index')->with('success', 'Thank you for your order! Your cart has been processed.');
    }

}
