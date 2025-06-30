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

<label for="name">Name:</label>
<input type="text" name="name" id="name" value="{{ old('name', $author->name ?? '') }}" required>

<button type="submit">Save</button>
