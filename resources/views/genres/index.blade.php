@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Genres</h1>
        <a href="{{ route('genres.create') }}" class="btn btn-primary">Add Genre</a>
    </div>

    @if($genres->count())
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.show', $genre) }}" class="btn btn-sm btn-info text-white">View</a>
                            <a href="{{ route('genres.edit', $genre) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this genre?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $genres->links() }}
    @else
        <p>No genres found.</p>
    @endif
@endsection
