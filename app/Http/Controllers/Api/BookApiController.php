<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    public function index()
    {
        return Book::with(['author', 'genres', 'reviews'])->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'genres' => 'array',
        ]);

        $book = Book::create($request->only('title', 'author_id'));
        $book->genres()->attach($request->genres ?? []);

        return response()->json($book->load(['author', 'genres']), 201);
    }

    public function show(Book $book)
    {
        return $book->load(['author', 'genres', 'reviews']);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'genres' => 'array',
        ]);

        $book->update($request->only('title', 'author_id'));
        $book->genres()->sync($request->genres ?? []);

        return response()->json($book->load(['author', 'genres']));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
