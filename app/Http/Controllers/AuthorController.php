<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'));
    }

    public function create() {
        return view('authors.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        Author::create($request->only('name'));
        return redirect()->route('authors.index')->with('success', 'Author added.');
    }

    public function show(Author $author) {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author) {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author) {
        $request->validate(['name' => 'required']);
        $author->update($request->only('name'));
        return redirect()->route('authors.index')->with('success', 'Author updated.');
    }

    public function destroy(Author $author) {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted.');
    }
}
