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
 <section>
    <div class="container mx-auto min-h-screen px-8 mt-7">
        <div>
            <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2" role="alert">
                <span class="font-medium"><a href="/">Home</a> / </span> Berita Desa
            </div>
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-2/3">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-3xl font-semibold text-[#282828]">Berita</h1>
                    </div>

                    @foreach ($artikels as $artikel)
                    <div class="flex flex-col lg:flex-row items-center max-w-screen-lg gap-6 mb-6">
                        <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" class="w-full lg:w-1/3 h-52 object-cover" alt="">
                        <div>
                            <a href="{{ route('berita.detail', $artikel->id) }}">
                                <h3 class="text-2xl font-bold text-green-500 hover:text-green-600">{{ $artikel->judul }}</h3>
                            </a>
                            <p class="max-w-2xl mb-5">{{ Str::limit($artikel->deskripsi, 150) }}</p>
                            <p class="text-sm text-slate-500 mb-2"><i class="fa-solid fa-calendar-days mr-3"></i>{{ Carbon::parse($artikel->tanggal_upload)->format('d F Y') }}</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="mt-8">
                        {{ $artikels->links() }}
                    </div>
                </div>

                <div class="lg:w-1/3 mt-8 lg:mt-0">
                    <div class="mb-4">
                        <form action="{{ route('beritadesa') }}" method="GET" class="flex items-center">
                            <input type="text" name="search" placeholder="Cari berita..." class="px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ request()->input('search') }}">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-r-md">Cari</button>
                        </form>
                    </div>
                    <h2 class="text-2xl font-semibold text-[#282828] mb-4">Berita Terbaru</h2>
                    <div class="space-y-4">
                        @foreach ($artikelTerbaru as $artikel)
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" class="w-20 h-20 object-cover rounded" alt="">
                            <div>
                                <a href="{{ route('berita.detail', $artikel->id) }}" class="text-green-500 hover:text-green-600 font-semibold">{{ $artikel->judul }}</a>
                                <p class="text-sm text-slate-500">{{ Carbon::parse($artikel->tanggal_upload)->format('d F Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
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
