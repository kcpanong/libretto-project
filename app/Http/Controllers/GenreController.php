<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::paginate(10);
        return view('genres.index', compact('genres'));
    }

    public function create() {
        return view('genres.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        Genre::create($request->only('name'));
        return redirect()->route('genres.index')->with('success', 'Genre added.');
    }

    public function show(Genre $genre) {
        return view('genres.show', compact('genre'));
    }

    public function edit(Genre $genre) {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre) {
        $request->validate(['name' => 'required']);
        $genre->update($request->only('name'));
        return redirect()->route('genres.index')->with('success', 'Genre updated.');
    }

    public function destroy(Genre $genre) {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre deleted.');
    }
}
