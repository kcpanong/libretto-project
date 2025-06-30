@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">Libretto Dashboard</h1>
        <p class="lead">Welcome! Select a section to manage:</p>

        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg w-100">Books</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('authors.index') }}" class="btn btn-secondary btn-lg w-100">Authors</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('genres.index') }}" class="btn btn-info btn-lg w-100 text-white">Genres</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('reviews.index') }}" class="btn btn-success btn-lg w-100">Reviews</a>
            </div>
        </div>
    </div>
@endsection
