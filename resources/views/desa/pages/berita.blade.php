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
    <style>
        #mobile-menu {
            display: none;
        }

        #mobile-menu.show {
            display: block;
        }
    </style>
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
        @foreach ($pengumuman_terbaru as $pengumuman)
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <a href="{{ route('detailpengumuman', $pengumuman->id) }}">
                    <span class="font-medium">{{ $pengumuman->judul }}</span>
                </a>
            </div>
        @endforeach
    </div>
</div>

                    <!-- Struktur Pemerintahan -->
                    <div class="pt-8">
    <h1 class="text-3xl font-semibold">Struktur Pemerintahan</h1>
    <hr class="border-2 w-1/2 mb-4">
    <div id="default-carousel" class="relative w-full max-w-[400px] mx-auto" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[500px] overflow-hidden rounded-lg">
            @foreach($pemerintahdesas as $index => $pemerintah)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('storage/pemerintahdesa/' . $pemerintah->foto) }}"
                    class="absolute top-0 left-0 w-full h-full object-cover object-center" alt="{{ $pemerintah->nama }}">
                <div class="absolute bottom-0 w-full text-white bg-green-600 bg-opacity-50 px-4 py-2 text-center">
                    <h1 class="font-bold text-xl mb-2">{{ $pemerintah->nama }}</h1>
                    <p class="text-sm font-normal">{{ $pemerintah->jabatan }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
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
    <script>
        // JavaScript untuk mengontrol visibilitas menu mobile
        document.getElementById('menu-button').onclick = function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('show');
        };
    </script>
</body>

</html>
