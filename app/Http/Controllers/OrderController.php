<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function success(Order $order)
    {
        // Check if the order belongs to the current user
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.success', [
            'order' => $order
        ]);
    }

    public function index()
    {
        $orders = Order::with('items.book')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }
}