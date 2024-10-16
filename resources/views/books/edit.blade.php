<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1>Edit Book: {{ $book->title }}</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}">
        @error('title')
            <span>{{ $message }}</span>
        @enderror

        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description', $book->description) }}"></textarea>

        <label for="authors">Authors</label>
        <select name="authors[]" id="authors" multiple>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ $book->authors->contains($author->id) ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>

        <label for="genres">Genres</label>
        <select name="genres[]" id="genres" multiple>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" {{ $book->genres->contains($genre->id) ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update Book</button>
    </form>
</x-app-layout>
