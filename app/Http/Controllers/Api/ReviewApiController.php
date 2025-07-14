<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewApiController extends Controller
{
    public function index()
    {
        return Review::with('book')->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required',
        ]);

        return Review::create($request->only('book_id', 'rating', 'content'));
    }

    public function show(Review $review)
    {
        return $review->load('book');
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required',
        ]);

        $review->update($request->only('book_id', 'rating', 'content'));
        return $review->load('book');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(['message' => 'Review deleted']);
    }
}
