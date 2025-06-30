@extends('layouts.app')

@section('content')
    <h1>Add New Genre</h1>

    <form action="{{ route('genres.store') }}" method="POST">
        @include('genres.form')
    </form>

    <a href="{{ route('genres.index') }}">Back to Genre List</a>
@endsection
