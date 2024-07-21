@php
use Carbon\Carbon;
@endphp

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Desa Kedang murung | Website Profile</title>
    {{-- logo --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>

    {{-- navbar --}}
    @include('layouts.navbar')
    {{-- kontent dan informasi --}}
    <section class="bg-white py-6">
        <div class="container mx-auto px-4 mt-8">
            <div class="flex flex-col lg:flex-row gap-12 mt-3">
                <!-- Artikel Terbaru -->
              <div class="flex flex-col lg:w-2/3">
    <div class="p-4 mb-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2" role="alert">
        <span class="font-medium"><a href="/">Home</a> / Berita / </span> {{ $artikel->judul }}
    </div>
    <h1 class="text-4xl font-bold text-green-500 my-6">{{ $artikel->judul }}</h1>
    <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" class="w-full h-auto object-cover" alt="">
    <div class="flex items-center justify-between mt-4">
        <p class="text-sm text-slate-500 mb-2">
            by {{ $artikel->petugas->nama_petugas }}</p>
        <p class="text-sm text-slate-500 mb-2">
    {{ Carbon::parse($artikel->tanggal_upload)->format('d F Y') }}</p>
    </div>
    <div class="mt-6">
        {!! $artikel->deskripsi !!}
    </div>
</div>
                <!-- Sidebar -->
                <aside class="lg:w-1/3">
                    <!-- Pengumuman Terbaru -->
                    <div>
                        <h3 class="text-3xl font-semibold mb-2">Pengumuman Terbaru</h3>
                        <hr class="border-2 w-1/2">
                        <div class="mt-4">
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                <span class="font-medium">Kegiatan KKN Mahasiswa 2024</span>
                            </div>
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                <span class="font-medium">Kegiatan Rapat Program Desa 2024</span>
                            </div>
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                <span class="font-medium">Pengaduan Masyarakat Desa</span>
                            </div>
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
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
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
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
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
    {{-- footer --}}
    @include('layouts.footer')



    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
