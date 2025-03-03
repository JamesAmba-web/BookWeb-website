<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->has('category') && $request->category !== '') {
            $query->where('category', $request->category);
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $books = $query->paginate(12);
        return view('shop', compact('books'));
    }

    public function show(Book $book)
    {
        // Get related books from the same category
        $relatedBooks = Book::where('category', $book->category)
            ->where('id', '!=', $book->id)
            ->take(4)
            ->get();
        return view('books.show', compact('book'));
    }
}