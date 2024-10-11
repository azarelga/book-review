<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>Home</h1>
    <br>

    {{-- buat card --}}
    <div class="w-full relative">
        <div class="swiper multiple-slide-carousel swiper-container relative">
            {{-- make text book you might like with bold and big font --}}
            <h2 class="text-3xl font-bold mb-4">Books You Might Like</h2>
            <div class="swiper-wrapper">
                @foreach ($books as $book)
                    <div class="swiper-slide">
                        <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                            <img src="{{ $book->cover_image }}" alt=""
                                class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center gap-8 lg:justify-start justify-center">
                <button
                    class="swiper-button-prev group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !left-5 hover:bg-indigo-600"
                    data-carousel-prev>
                    <svg class="h-5 w-5 text-indigo-600 group-hover:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button
                    class="swiper-button-next group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !right-5 hover:bg-indigo-600"
                    data-carousel-next>
                    <svg class="h-5 w-5 text-indigo-600 group-hover:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M5.99984 4.00012L10 8.00029L5.99748 12.0028" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="w-full relative">
        <div class="swiper multiple-slide-carousel swiper-container relative">
            {{-- make text book you might like with bold and big font --}}
            <h2 class="text-3xl font-bold mb-4">Books You Might Like</h2>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1327541822l/146127.jpg"
                            alt=""
                            class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1364852559l/16085481.jpg"
                            alt=""
                            class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1327541822l/146127.jpg"
                            alt=""
                            class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1364852559l/16085481.jpg"
                            alt=""
                            class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1327541822l/146127.jpg"
                            alt=""
                            class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1364852559l/16085481.jpg"
                            alt=""
                            class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1327541822l/146127.jpg"
                            alt=""
                            class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-8 lg:justify-start justify-center">
                <button
                    class="swiper-button-prev group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !left-5 hover:bg-indigo-600"
                    data-carousel-prev>
                    <svg class="h-5 w-5 text-indigo-600 group-hover:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button
                    class="swiper-button-next group !p-2 flex justify-center items-center border border-solid border-indigo-600 !w-12 !h-12 transition-all duration-500 rounded-full !top-2/4 !-translate-y-8 !right-5 hover:bg-indigo-600"
                    data-carousel-next>
                    <svg class="h-5 w-5 text-indigo-600 group-hover:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M5.99984 4.00012L10 8.00029L5.99748 12.0028" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</x-layout>
