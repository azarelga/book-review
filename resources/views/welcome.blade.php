<x-layout>
    <x-slot:title>Home</x-slot:title>
    <div class="mb-5">
        <h1 class="text-3xl pb-5 font-bold">Search</h1>
        <form action="{{ route('books.search') }}" method="GET">
            <input type="text" name="search" placeholder="Search books..." class="border p-2 rounded">
            <select id="by" name="by" class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                <option value="title">Title</option>
                <option value="genre">Genre</option>
                <option value="author">Author</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
        </form>
    </div>
    <br>
    @foreach ($datas as $data)
    <div class="w-full relative">
        <div class="swiper swiper-container items-center relative">
            <h2 class="text-3xl font-bold mb-4">{{$data[1]}}</h2>
            <div class="swiper-wrapper">
                @foreach ($data[0] as $book)
                    <div class="swiper-slide">
                        <a type="button" class="block text-center p-4" href="{{ route('books.book', ['id' => $book->id]) }}">
                            <div class="flex-col">
                                <img src="{{ $book->cover_image }}" alt="" class="mx-auto h-48 object-contain">
                                    <p class="font-bold">{{ $book->title }}</p>
                                    <p>by {{Str::limit(explode('; ',$book->authors->first()->name)[0], 80)}}</p>
                            </div>
                        </a>
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
    @endforeach

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
                    document.getElementById('readAuthors').textContent = book.authors.map(author => author.name).join( ', ');

                    // Menampilkan genre
                    document.getElementById('readGenres').textContent = book.genres.map(genre => genre.name).join(', ');

                })
                .catch(error => console.error('Error fetching book:', error));
        }
        document.addEventListener('hover', function(event) {
            const modal = document.getElementById('readProductModal');
            const modalContent = document.querySelector('.modal-content');

            if (event.target === modal && !modalContent.contains(event.target)) {
                modal.classList.add('hidden'); // Close modal
            }
        })
    </script>
</x-layout>
