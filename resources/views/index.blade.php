@php
    use Carbon\Carbon;
@endphp

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Kedang murung | Website Profile</title>

    {{-- logo --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <style>
        #mobile-menu {
            display: none;
        }

        #mobile-menu.show {
            display: block;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>

<body class="bg-[#f8f8f8]">

    {{-- navbar --}}
    @include('layouts.navbar')

    {{-- hero --}}
    <section>
        <div class="container mx-auto mb-16">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden md:h-[550px] z-10">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://img.freepik.com/free-photo/colorful-rainbow-appearing-sky-nature-landscape_23-2151521552.jpg?t=st=1722243810~exp=1722247410~hmac=a32c745f18744b8846fe87571e8997a3c90b9c763c060194dea0826c8e37189c&w=1380"
                            class="absolute block w-full xl:w-screen -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-cover bg-center object-cover"
                            alt="...">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white bg-black bg-opacity-50 px-4 py-2 rounded-md text-center">
                            <h1 class="font-bold text-xl lg:text-4xl mb-2">Selamat Datang di Desa Kedang murung</h1>
                            <p class="text-sm lg:text-lg font-normal">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                                Alias a iure, fuga inventore porro deleniti sit sunt reprehenderit voluptatum est?</p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://img.freepik.com/free-photo/beautiful-rainbow-nature_23-2151498349.jpg?t=st=1722243840~exp=1722247440~hmac=29f4657f6afc04263508c7b248715b95f3aa1d1e2296bd36cb3a658b439ccdf4&w=996"
                            class="absolute block w-full xl:w-screen -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-cover bg-center object-cover"
                            alt="...">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-3xl font-bold bg-black bg-opacity-50 px-4 py-2 rounded-md text-center">
                            <h1 class="font-bold text-xl lg:text-4xl mb-2">Pemandangan Alam yang Indah</h1>
                            <p class="text-sm lg:text-lg font-normal">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                                Alias a iure, fuga inventore porro deleniti sit sunt reprehenderit voluptatum est?</p>
                        </div>
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-10 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-10 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-10 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>

    {{-- kontent dan informasi --}}
    <section class="bg-white py-6">
        <div class="container mx-auto px-4 mt-12">
            <div class="flex flex-col lg:flex-row gap-8 mt-3">
                <!-- Artikel Terbaru -->
                <div class="flex flex-col lg:w-2/3">
                    <h1 class="text-3xl font-semibold text-[#282828] mb-2">Artikel <span
                            class="font-bold text-green-500">Terbaru</span></h1>
                    <hr class="border-2 w-1/2 mb-4">

                    @foreach ($artikels as $artikel)
                        <div class="flex flex-col lg:flex-row items-center max-w-screen-lg gap-6 mb-6">
                            <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}"
                                class="w-full lg:w-1/3 h-52 object-cover" alt="">
                            <div>
                                <a href="{{ route('berita.detail', $artikel->id) }}">
                                    <h3 class="text-2xl font-bold text-green-500 hover:text-green-600">
                                        {{ $artikel->judul }}</h3>
                                </a>
                                <p class="max-w-2xl mb-5">{{ Str::limit($artikel->deskripsi, 150) }}</p>
                                <p class="text-sm text-slate-500 mb-2"><i class="fa-solid fa-calendar-days mr-3"></i>
                                    {{ Carbon::parse($artikel->tanggal_upload)->format('d F Y') }}</p>
                            </div>
                        </div>
                    @endforeach



                </div>
                <!-- Sidebar -->
                <aside class="lg:w-1/3">
                    <!-- Pengumuman Terbaru -->
                    <div>
                        <h3 class="text-3xl font-semibold mb-2">Pengumuman Terbaru</h3>
                        <hr class="border-2 w-1/2">
                        <div class="mt-4">
                            @foreach ($artikelTerbaru as $artikelBaru)
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                                    role="alert">
                                    <a href="{{ route('berita.detail', $artikelBaru->id) }}">
                                        <span class="font-medium">{{ $artikelBaru->judul }}</span>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Struktur Pemerintahan -->
                    <div class="pt-8">
                        <h1 class="text-3xl font-semibold">Struktur Pemerintahan</h1>
                        <hr class="border-2 w-1/2 mb-4">
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-64 md:h-80 lg:h-96 overflow-hidden rounded-lg">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://img.freepik.com/free-photo/army-it-professional-examining-national-satellite-surveillance-footage_482257-89885.jpg?t=st=1721407818~exp=1721411418~hmac=15166820f8eb77a038895508d49bbbe7bb35886de798596164f30581ddd5eb3c&w=1380"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://img.freepik.com/free-photo/army-it-professional-examining-national-satellite-surveillance-footage_482257-89885.jpg?t=st=1721407818~exp=1721411418~hmac=15166820f8eb77a038895508d49bbbe7bb35886de798596164f30581ddd5eb3c&w=1380"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://img.freepik.com/free-photo/army-it-professional-examining-national-satellite-surveillance-footage_482257-89885.jpg?t=st=1721407818~exp=1721411418~hmac=15166820f8eb77a038895508d49bbbe7bb35886de798596164f30581ddd5eb3c&w=1380"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div
                                class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>


    {{-- galeri kegiatan desa --}}
   <section>
    <div class="container mx-auto px-4 mt-14">
        <div class="lg:flex lg:justify-between lg:items-center">
            <div>
                <h1 class="text-3xl font-semibold">Galeri <span class="font-bold text-green-500">
                        Kegiatan Desa</span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias minus veritatis ipsum
                    reprehenderit alias iure.</p>
            </div>
            <button class="bg-green-500 text-white px-4 py-2 rounded hidden lg:block">
                    <a href="{{ route('kegiatan') }}">Lihat Semua</a></button>
        </div>
         <div class="flex flex-col justify-center items-center lg:grid lg:grid-cols-4 gap-6 mt-8">
                @foreach($dokumentasi as $item)
                    <div>
                        <img class="w-96 h-64 object-cover cursor-pointer" 
                             src="{{ asset('storage/dokumentasi/' . $item->foto) }}" 
                             alt="{{ $item->judul }}"
                             onclick="openModal('{{ asset('storage/dokumentasi/' . $item->foto) }}', '{{ $item->judul }}')">
                        <div class="text-center mt-4">
                            <h1 class="text-xl font-bold">{{ $item->judul }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-4 rounded-lg max-w-3xl max-h-full overflow-auto">
            <img id="modalImage" src="" alt="" class="max-w-full h-auto">
            <h2 id="modalTitle" class="text-xl font-bold mt-4 text-center"></h2>
            <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Close</button>
        </div>
    </div>
</section>

    {{-- map location desa --}}
    <section>
        <div class="container mx-auto px-4 mt-12">
            <h1 class="text-3xl font-semibold mb-3">Lokasi Kami</h1>
            <iframe class="w-full h-96"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127671.90574228844!2d116.48197115814146!3d-0.3424542760586103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df648b37cc98429%3A0x579d0d08f7a1a02!2sKedang%20Murung%2C%20Kec.%20Kota%20Bangun%2C%20Kabupaten%20Kutai%20Kartanegara%2C%20Kalimantan%20Timur!5e0!3m2!1sid!2sid!4v1721395470852!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    {{-- footer --}}
    @include('layouts.footer')






    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        // JavaScript untuk mengontrol visibilitas menu mobile
        document.getElementById('menu-button').onclick = function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('show');
        };
    </script>

    <script>
function openModal(imageSrc, title) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    
    modalImage.src = imageSrc;
    modalTitle.textContent = title;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}
</script>
</body>

</html>
