<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
        $reviews = Review::with('book')->paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    public function create() {
        $books = Book::all();
        return view('reviews.create', compact('books'));
    }

    public function store(Request $request) {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        Review::create($request->only('book_id', 'content', 'rating'));
        return redirect()->route('reviews.index')->with('success', 'Review added.');
    }

    public function show(Review $review) {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review) {
        $books = Book::all();
        return view('reviews.edit', compact('review', 'books'));
    }

    public function update(Request $request, Review $review) {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review->update($request->only('book_id', 'content', 'rating'));
        return redirect()->route('reviews.index')->with('success', 'Review updated.');
    }

    public function destroy(Review $review) {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted.');
    }
}
