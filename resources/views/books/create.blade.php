@extends('layouts.app')

@section('content')
    <h1>Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @include('books.form')
    </form>

    <a href="{{ route('books.index') }}">Back to Book List</a>
@endsection
