@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Reviews</h1>
        <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add Review</a>
    </div>

    @if($reviews->count())
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Book</th>
                    <th>Rating</th>
                    <th>Content Preview</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->book->title }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ Str::limit($review->content, 60) }}</td>
                        <td>
                            <a href="{{ route('reviews.show', $review) }}" class="btn btn-sm btn-info text-white">View</a>
                            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this review?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $reviews->links() }}
    @else
        <p>No reviews found.</p>
    @endif
@endsection
