<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorApiController extends Controller
{
    public function index()
    {
        return Author::paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        return Author::create($request->only('name'));
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function update(Request $request, Author $author)
    {
        $request->validate(['name' => 'required']);
        $author->update($request->only('name'));
        return $author;
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(['message' => 'Author deleted']);
    }
}
