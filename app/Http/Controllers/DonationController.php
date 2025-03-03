<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function create()
    {
        return view('donate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'condition' => 'required|string',
            'contact_number' => 'required|string',
            'pickup_address' => 'required|string',
        ]);

        $donation = Donation::create([
            'user_id' => auth()->id(),
            'book_title' => $validated['book_title'],
            'author' => $validated['author'],
            'description' => $validated['description'],
            'condition' => $validated['condition'],
            'contact_number' => $validated['contact_number'],
            'pickup_address' => $validated['pickup_address'],
            'status' => 'pending'
        ]);

        return view('donations.success', compact('donation'));
    }

    public function success()
    {
        return view('donations.success');
    }
    public function index()
    {
        $donations = Donation::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('donations.index', compact('donations'));
    }
}