@extends('layouts.app')

@section('content')
    <h1>Genre Details</h1>

    <p><strong>Name:</strong> {{ $genre->name }}</p>

    <a href="{{ route('genres.index') }}">Back to Genre List</a>
@endsection
