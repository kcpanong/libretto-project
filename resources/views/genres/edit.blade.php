@extends('layouts.app')

@section('content')
    <h1>Edit Genre</h1>

    <form action="{{ route('genres.update', $genre) }}" method="POST">
        @csrf
        @method('PUT')
        @include('genres.form')
    </form>

    <a href="{{ route('genres.index') }}">Back to Genre List</a>
@endsection
