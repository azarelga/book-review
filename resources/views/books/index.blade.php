<x-layout>
    @if($search)
        <x-slot:title>Search results for "{{$search}}"</x-slot:title>
    @endif

    @if($books->isEmpty())
        <h1 class="font-bold text-2xl">No books found</h1>
    @endif
    <div class="grid grid-cols-3 gap-4">
        @foreach ($books as $book)
            <a type="button" class="block text-center p-4" href="{{ route('books.book', ['id' => $book->id]) }}">
                <div class="flex-col">
                    <img src="{{ $book->cover_image }}" alt="" class="mx-auto h-48 object-contain">
                        <p class="font-bold">{{ $book->title }}</p>
                        <p>by {{Str::limit(explode('; ',$book->authors->first()->name)[0], 80)}}</p>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
