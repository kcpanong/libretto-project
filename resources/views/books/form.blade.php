@csrf

<label>Title:</label>
<input type="text" name="title" value="{{ old('title', $book->title ?? '') }}" required>

<label>Author:</label>
<select name="author_id">
    @foreach ($authors as $author)
        <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id ?? '') == $author->id)>
            {{ $author->name }}
        </option>
    @endforeach
</select>

<label>Genres:</label>
@foreach ($genres as $genre)
    <label>
        <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
            @checked(in_array($genre->id, old('genres', isset($book) ? $book->genres->pluck('id')->toArray() : [])))>
        {{ $genre->name }}
    </label>
@endforeach

<button type="submit">Save</button>
