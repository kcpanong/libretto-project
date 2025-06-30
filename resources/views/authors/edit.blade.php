@extends('layouts.app')

@section('content')
    <h1>Edit Author</h1>

    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')
        @include('authors.form')
    </form>

    <a href="{{ route('authors.index') }}">Back to Author List</a>
@endsection
