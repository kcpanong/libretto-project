@extends('layouts.app')

@section('content')
    <h1>Review Details</h1>

    <p><strong>Book:</strong> {{ $review->book->title }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>
    <p><strong>Content:</strong> {{ $review->content }}</p>

    <a href="{{ route('reviews.index') }}">Back to Review List</a>
@endsection
