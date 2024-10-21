<x-app-layout>
    <script>
    function updateStars(list, value) {
        list.forEach(star => {
            star.classList.remove('text-yellow-400');
            star.classList.add('text-gray-500');
        });
        for (let i = 0; i < parseFloat(value); i++) {
            list[i].classList.add('text-yellow-400');
        }
    }
    </script>
    <section class="bg-white py-8 antialiased md:py-16">
        <div class="mx-auto max-w-screen-xl  px-4 2xl:px-0">
            <div class="grid grid-cols-3 gap-10 sm:grid-cols-3">
                <div class="col-span-1">
                    <img src="{{ $book->cover_image }}" alt=""
                        class="display: block;background-color: hsl(0, 0%, 90%);height: ">
                </div>
                <div class="col-span-2">
                    <div class="mb-5 gap-3 mx-auto">
                        <h1 class="text-3xl font-semibold text-gray-900 ">{{ $book->title }}</h1>
                        <h2 class="text-xl font-bold text-gray-500 ">
                            {{ explode('; ', $book->authors->first()->name)[0] }}</h2>
                        <!--  list genre of the books $book->genre -->
                        <h2 class="text-lg mt-4 font-semibold text-gray-900 ">Genres</h2>
                        <div class="p-4 gap-2 flex flex-wrap rounded bg-gray-200 ">
                            @foreach ($book->genres as $genre)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-3.5 py-1.5 rounded dark:bg-blue-900 dark:text-blue-300">{{Str::remove("'",$genre->name)}}</span>
                            @endforeach
                        </div>
                        <p class="mt-4 text-lg font-normal text-gray-900 ">{{ $book->description }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <h2 class="text-2xl font-semibold text-gray-900">Reviews</h2>
                        <div class="mt-2 flex items-center gap-2 sm:mt-0">
                            <div class="flex items-center gap-0.5" id="rating-info">
                                @for($i = 0; $i < 5; $i++)
                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477 l-4.552-.36-1.754-4.17Z"/> </svg>
                                @endfor
                            </div>
                            <p class="text-sm font-medium leading-none text-gray-500" id='rating-result'>
                                {{ $book->rating }}</p>
                            <a href="#"
                                class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline ">
                                {{ $book->reviews->count() }} Reviews </a>
                        </div>
                    </div>

                    <div class="my-6 gap-8 sm:flex sm:items-start md:my-8">
                        <div class="shrink-0 space-y-4">
                            <p class="text-2xl font-semibold leading-none text-gray-900 ">{{ $book->rating }} out of 5 </p>
                            <button type="button" data-modal-target="review-modal" data-modal-toggle="review-modal"
                                class="block mb-2 me-2 rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-200">Write
                                a review</button>
                        </div>

                        <div class="mt-6 min-w-0 flex-1 space-y-3 sm:mt-0">
                            @foreach (range(5, 1) as $rating)
                                <div class="flex items-center gap-2">
                                    <p class="w-2 shrink-0 text-start text-sm font-medium leading-none text-gray-900 ">{{ $rating }}</p>
                                    <svg class="h-4 w-4 shrink-0 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>
                                    <div class="h-1.5 w-80 rounded-full bg-gray-200 ">
                                        <div class="h-1.5 rounded-full bg-yellow-300"
                                            style="width: {{ ($book->reviews->where('rating', $rating)->count() / max($book->reviews->count(), 1)) * 100 }}%">
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="w-8 shrink-0 text-right text-sm font-medium leading-none text-primary-700 hover:underline sm:w-auto sm:text-left">
                                        {{ $book->reviews->where('rating', $rating)->count() }} <span
                                            class="hidden sm:inline">reviews</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                        @if ($book->reviews == null)
                            <p class="text-lg font-normal text-gray-500 ">No reviews yet</p>
                        @else
                            @foreach ($book->reviews as $review)
                                <div class="mt-6 divide-y divide-gray-200">
                                    <div class="gap-3 pb-6 sm:flex sm:items-start">
                                        <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
                                            <h3 class="font-bold">{{ $review->user->username }}</h3>
                                            <div class="flex items-center gap-0.5" id="ratingUser">
                                            @for($i = 0; $i < 5; $i++)
                                                @if($i < $review->rating)
                                                    <!-- Star for the rated portion (filled) -->
                                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477 l-4.552-.36-1.754-4.17Z"/>
                                                    </svg>
                                                @else
                                                    <!-- Star for the unrated portion (empty) -->
                                                    <svg class="h-4 w-4 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477 l-4.552-.36-1.754-4.17Z"/>
                                                    </svg>
                                                @endif
                                            @endfor
                                                <span class="pl-3 hidden" id="ratingUserText">{{ $review->rating }}</span>
                                            </div>
                                            <div class="space-y-0.5">
                                                <p class="text-sm font-normal text-gray-500 ">
                                                    {{ $review->created_at }}</p>
                                            </div>
                                        </div>

                                        <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
                                            <h2 class="font-semibold text-black">{{ $review->title }}</h2>
                                            <p class="font-normal text-gray-500">{{ $review->description }}</p>
                                        </div>
                                    </div>
                                </div>
                    @endforeach
                    @endif

    </section>

    <!-- Add review modal -->
    <div id="review-modal" tabindex="-1" aria-hidden="true"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white bg-blend-multiply shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4  md:p-5">
                    <div>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Add a review for:</h3>
                        <a href="#"
                            class="font-medium text-primary-700 hover:underline ">{{ $book->title }}</a>
                    </div>
                    <button type="button"
                        class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 "
                        data-modal-toggle="review-modal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('reviews.store', $book->id) }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <div class="flex items-center" id="rating-radio">
                                <svg class="h-6 w-6 hover:text-yellow-300 text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"
                                    data-value="1">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="h-6 w-6 hover:text-yellow-300 text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"
                                    data-value="2">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="h-6 w-6 hover:text-yellow-300 text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"
                                    data-value="3">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="h-6 w-6 hover:text-yellow-300 text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"
                                    data-value="4">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="h-6 w-6 hover:text-yellow-300 text-gray-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"
                                    data-value="5">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <span class="ms-2 text-lg font-bold text-gray-900 "><span id="ratingnum"
                                        name="ratingnum">0</span> out of 5</span>
                                <input id="rating" type="hidden" name="rating" value="">
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-900 ">Review
                                title</label>
                            <input type="text" id="title" name="title"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 "
                                required="true" />
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="mb-2 block text-sm font-medium text-gray-900 ">Review
                                description</label>
                            <textarea id="description" type="text" name="description" rows="6"
                                class="mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 "
                                required="true"></textarea>
                        </div>
                        <div class="col-span-2">
                        </div>
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <input id="review-checkbox" type="checkbox" value=""
                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 " />
                                <label for="review-checkbox" class="ms-2 text-sm font-medium text-gray-500 ">By
                                    publishing this review you agree with the <a href="#"
                                        class="text-primary-600 hover:underline ">terms and conditions</a>.</label>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4  md:pt-5">
                        <button type="submit"
                            class="me-2 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 ">Add
                            review</button>
                        <button type="button" data-modal-toggle="review-modal"
                            class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 ">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const stars = document.querySelectorAll('#rating-info svg');
    const starsRadio = document.querySelectorAll('#rating-radio svg');
    const ratingResult = document.getElementById('rating-result');
    const ratingRadio = document.getElementById('ratingnum');
    const ratingHidden = document.getElementById('rating');

    starsRadio.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingRadio.textContent = value;
            ratingHidden.value = value;
            updateStars(starsRadio, value);
        });
    });

    updateStars(stars, ratingResult.textContent);
</script>

