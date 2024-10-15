<x-layout>
    <x-slot:title>Books</x-slot:title>

    <h1>Books</h1>

    <a href="{{ route('books.create') }}">Create New Book</a>

    <ul>
        @foreach ($books as $book)
            <li>
                <strong>{{ $book->title }}</strong> - by {{ $book->authors->pluck('name')->join(', ') }}
                <br>
                Genres: {{ $book->genres->pluck('name')->join(', ') }}
                <br>
                <a href="{{ route('books.edit', $book) }}">Edit</a> |
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
