<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('book')
            ->where('user_id', auth()->id())
            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->book->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'shipping_address' => 'required',
            'shipping_city' => 'required',
            'shipping_phone' => 'required',
        ]);

        // Get cart items
        $cartItems = CartItem::with('book')
            ->where('user_id', auth()->id())
            ->get();

        // Calculate total
        $total = $cartItems->sum(function($item) {
            return $item->book->price * $item->quantity;
        });

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $total,
            'shipping_address' => $validated['shipping_address'],
            'shipping_city' => $validated['shipping_city'],
            'shipping_phone' => $validated['shipping_phone'],
            'status' => 'pending'
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            $order->items()->create([
                'book_id' => $item->book_id,
                'quantity' => $item->quantity,
                'price' => $item->book->price
            ]);
        }

        // Clear cart
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->route('orders.success', $order);
    }
}