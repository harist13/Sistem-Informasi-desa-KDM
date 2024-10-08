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
            <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2"
                role="alert">
                <span class="font-medium"><a href="/">Home</a> / </span> Detail pengumuman
            </div>

            <!-- PDF Display Section -->
            <div class="mt-5">
                <h2 class="text-xl font-bold mb-4">{{ $pengumuman->judul }}</h2>
                <div class="border rounded-lg overflow-hidden">
                    <iframe src="{{ asset('storage/pengumuman/' . $pengumuman->file) }}" width="100%" height="600px">
                        This browser does not support PDFs. Please download the PDF to view it: 
                        <a href="{{ asset('storage/pengumuman/' . $pengumuman->file) }}">Download PDF</a>.
                    </iframe>
                </div>
                <p class="mt-4">Diposting oleh: {{ $pengumuman->petugas->nama_petugas }} | {{ $pengumuman->tanggal }}</p>
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
