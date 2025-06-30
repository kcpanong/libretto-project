@extends('layouts.app')

@section('content')
    <h1>Add New Author</h1>

    <form action="{{ route('authors.store') }}" method="POST">
        @include('authors.form')
    </form>

    <a href="{{ route('authors.index') }}">Back to Author List</a>
@endsection
