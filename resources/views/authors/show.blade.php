@extends('layouts.app')

@section('content')
    <h1>Author Details</h1>

    <p><strong>Name:</strong> {{ $author->name }}</p>

    <a href="{{ route('authors.index') }}">Back to Author List</a>
@endsection
