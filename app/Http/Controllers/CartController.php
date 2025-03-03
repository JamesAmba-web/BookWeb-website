<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('book')
            ->where('user_id', auth()->id())
            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->book->price * $item->quantity;
        });

        // Ensure that the book relationship is loaded for each cart item
        $cartItems->each(function ($item) {
            $item->load('book');
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    // ... (rest of your controller methods remain the same)


    public function add(Book $book)
    {
        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('book_id', $book->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Book added to cart!');
    }

    public function remove(CartItem $cartItem)
    {
        if ($cartItem->user_id !== auth()->id()) {
            abort(403);
        }

        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        if ($cartItem->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', 'Cart updated');
    }
}