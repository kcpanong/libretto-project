@extends('layouts.app')

@section('content')
    <h1>Edit Review</h1>

    <form action="{{ route('reviews.update', $review) }}" method="POST">
        @csrf
        @method('PUT')
        @include('reviews.form')
    </form>

    <a href="{{ route('reviews.index') }}">Back to Review List</a>
@endsection
