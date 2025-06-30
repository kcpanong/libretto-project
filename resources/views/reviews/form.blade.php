@csrf

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="book_id">Book:</label>
<select name="book_id" id="book_id" required>
    @foreach ($books as $book)
        <option value="{{ $book->id }}"
            @selected(old('book_id', $review->book_id ?? '') == $book->id)>
            {{ $book->title }}
        </option>
    @endforeach
</select>

<label for="rating">Rating (1-5):</label>
<input type="number" name="rating" id="rating" min="1" max="5"
       value="{{ old('rating', $review->rating ?? '') }}" required>

<label for="content">Content:</label>
<textarea name="content" id="content" rows="4" required>{{ old('content', $review->content ?? '') }}</textarea>

<button type="submit">Save</button>
