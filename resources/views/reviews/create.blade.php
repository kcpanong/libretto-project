@extends('layouts.app')

@section('content')
    <h1>Add New Review</h1>

    <form action="{{ route('reviews.store') }}" method="POST">
        @include('reviews.form')
    </form>

    <a href="{{ route('reviews.index') }}">Back to Review List</a>
@endsection
