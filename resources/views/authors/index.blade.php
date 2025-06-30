@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Authors</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary">Add Author</a>
    </div>

    @if($authors->count())
        <div class="row">
            @foreach ($authors as $author)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $author->name }}</h5>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('authors.show', $author) }}" class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" onsubmit="return confirm('Delete this author?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $authors->links() }}
    @else
        <p>No authors found.</p>
    @endif
@endsection
