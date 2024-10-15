<x-layout>
    <x-slot:title>Create Book</x-slot:title>

    <h1>Create a New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>

        <label for="authors">Select Authors:</label>
        <select name="authors[]" id="authors" multiple required>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>

        <label for="genres">Select Genres:</label>
        <select name="genres[]" id="genres" multiple required>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create Book</button>
    </form>
</x-layout>
