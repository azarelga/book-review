<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <br>

    <div class="w-full relative">
        <div class="swiper multiple-slide-carousel swiper-container relative">
            {{-- make text book you might like with bold and big font --}}
            <h2 class="text-3xl font-bold mb-4">Books You Might Like</h2>
            <div class="swiper-wrapper">
                @foreach ($books as $book)
                    <div class="swiper-slide">
                        <button type="button" data-modal-target="readProductModal" data-modal-toggle="readProductModal"
                            onclick="openReadModal({{ $book->id }})"
                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 text-gray-700">
                            <div class=" flex ">
                                <img src="{{ $book->cover_image }}" alt=""
                                    class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                            </div>
                        </button>
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
            <h2 class="text-3xl font-bold mb-4">Genre : {{ $popularGenre->name }}</h2>
            <div class="swiper-wrapper">
                @foreach ($booksInPopularGenre as $book)
                    <div class="swiper-slide">
                        <button type="button" data-modal-target="readProductModal" data-modal-toggle="readProductModal"
                            onclick="openReadModal({{ $book->id }})"
                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 text-gray-700">
                            <div class=" flex ">
                                <img src="{{ $book->cover_image }}" alt=""
                                    class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                            </div>
                        </button>
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
            <h2 class="text-3xl font-bold mb-4">Genre : {{ $randomGenre->name }} </h2>
            <div class="swiper-wrapper">
                @foreach ($booksInRandomGenre as $book)
                    <div class="swiper-slide">
                        <button type="button" data-modal-target="readProductModal" data-modal-toggle="readProductModal"
                            onclick="openReadModal({{ $book->id }})"
                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 text-gray-700">
                            <div class=" flex ">
                                <img src="{{ $book->cover_image }}" alt=""
                                    class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                            </div>
                        </button>
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
            <h2 class="text-3xl font-bold mb-4">Author : {{ $popularAuthor }}</h2>
            <div class="swiper-wrapper">
                @foreach ($booksByPopularAuthor as $book)
                    <div class="swiper-slide">
                        <button type="button" data-modal-target="readProductModal"
                            data-modal-toggle="readProductModal" onclick="openReadModal({{ $book->id }})"
                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 text-gray-700">
                            <div class=" flex ">
                                <img src="{{ $book->cover_image }}" alt=""
                                    class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                            </div>
                        </button>
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
            <h2 class="text-3xl font-bold mb-4">Author : {{ $randomAuthor->name }}</h2>
            <div class="swiper-wrapper">
                @foreach ($booksByRandomAuthor as $book)
                    <div class="swiper-slide">
                        <button type="button" data-modal-target="readProductModal"
                            data-modal-toggle="readProductModal" onclick="openReadModal({{ $book->id }})"
                            class="flex w-full items-center py-2 px-4 hover:bg-gray-100 text-gray-700">
                            <div class=" flex ">
                                <img src="{{ $book->cover_image }}" alt=""
                                    class="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;">
                            </div>
                        </button>
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

    <div id="readProductModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full modal-overlay">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5 modal-content">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl">
                        <h3 id="readTitle" class="font-semibold"></h3>
                        <p id="readRating" class="font-bold"></p>

                    </div>
                    <div>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex"
                            data-modal-toggle="readProductModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900">Deskripsi</dt>
                    <dd id="readDescription" class="mb-4 font-light text-gray-500 sm:mb-5"></dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900">Authors</dt>
                    <dd id="readAuthors" class="mb-4 font-light text-gray-500 sm:mb-5"></dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900">Genres</dt>
                    <dd id="readGenres" class="mb-4 font-light text-gray-500 sm:mb-5"></dd>
                </dl>
                <div class="flex justify-between items-center">
                </div>
            </div>
        </div>
    </div>

    <script>
        function openReadModal(bookId) {
            fetch(`/books/${bookId}`)
                .then(response => response.json())
                .then(book => {
                    // Isi data ke modal
                    console.log("read");
                    document.getElementById('readTitle').textContent = book.title;
                    document.getElementById('readRating').textContent = `Rating: ${book.rating}`;
                    document.getElementById('readDescription').textContent = book.description;

                    // Menampilkan penulis
                    document.getElementById('readAuthors').textContent = book.authors.map(author => author.name).join(
                        ', ');

                    // Menampilkan genre
                    document.getElementById('readGenres').textContent = book.genres.map(genre => genre.name).join(', ');

                })
                .catch(error => console.error('Error fetching book:', error));
        }
        // Close modal when clicking outside the modal content
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('readProductModal');
            const modalContent = document.querySelector('.modal-content');

            if (event.target === modal && !modalContent.contains(event.target)) {
                modal.classList.add('hidden'); // Close modal
            }
        })
    </script>
</x-layout>
