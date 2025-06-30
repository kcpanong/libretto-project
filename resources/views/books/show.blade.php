@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>

    <p><strong>Author:</strong> {{ $book->author->name }}</p>
    <p><strong>Genres:</strong> {{ $book->genres->pluck('name')->join(', ') }}</p>
    <p><strong>Reviews:</strong></p>
    <ul>
        @foreach ($book->reviews as $review)
            <li>{{ $review->content }} - Rating: {{ $review->rating }}</li>
        @endforeach
    </ul>

    <a href="{{ route('books.index') }}">Back to Book List</a>
@endsection
