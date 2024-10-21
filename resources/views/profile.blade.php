<x-layout>
    <x-slot:title>
            {{ __('My Profile') }}
    </x-slot:title>
     <div class="flex-1">
        <h1 class="text-4xl font-semibold text-gray-800">{{ Auth::user()->username }}</h3>
        <p class="text-lg text-gray-600">{{ Auth::user()->name }}</p>
    </div>
    @foreach ($reviews as $review)
<div class="mt-6 divide-y divide-gray-200">
    <div class="gap-3 pb-6 sm:flex sm:items-center items-center">
        <!-- Book Link Section -->
        <a type="button" class="flex-none p-4 text-center" href="{{ route('books.book', ['id' => $review->book->id]) }}">
            <div class="flex flex-col">
                <img src="{{ $review->book->cover_image }}" alt="{{ $review->book->title }}" class="mx-auto h-48 object-contain">
            </div>
        </a>

        <!-- User Review Section -->
        <div class="shrink-0 space-y-2 sm:w-48 md:w-72 flex-1">
                <p class="font-bold">{{ $review->book->title }}</p>
                <p>by {{ Str::limit(explode('; ', $review->book->authors->first()->name)[0], 80) }}</p>
            <div class="flex items-center gap-0.5" id="ratingUser">
                @for($i = 0; $i < 5; $i++)
                    @if($i < $review->rating)
                        <!-- Filled Star -->
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                    @else
                        <!-- Empty Star -->
                        <svg class="h-4 w-4 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                    @endif
                @endfor
                <span class="pl-3 hidden" id="ratingUserText">{{ $review->rating }}</span>
            </div>
            <div class="space-y-0.5">
                <p class="text-sm font-normal text-gray-500">{{ $review->created_at }}</p>
            </div>
            <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
                <h2 class="font-semibold text-black">{{ $review->title }}</h2>
                <p class="font-normal text-gray-500">{{ $review->description }}</p>
            </div>
        </div>

        <!-- Review Content Section -->
    </div>
</div>
<hr>
    @endforeach
</x-layout>
