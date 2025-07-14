<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreApiController extends Controller
{
    public function index()
    {
        return Genre::paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        return Genre::create($request->only('name'));
    }

    public function show(Genre $genre)
    {
        return $genre;
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate(['name' => 'required']);
        $genre->update($request->only('name'));
        return $genre;
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json(['message' => 'Genre deleted']);
    }
}
