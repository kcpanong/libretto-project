@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        @include('books.form')
    </form>

    <a href="{{ route('books.index') }}">Back to Book List</a>
@endsection
