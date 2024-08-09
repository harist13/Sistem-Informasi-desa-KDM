<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Desa Kedang Murung | Website Profile</title>
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

        /* Style untuk mengatur ukuran gambar agar pas dengan card */
        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.375rem; /* Sama dengan ukuran border-radius card */
        }

        /* Penyesuaian layout pengumuman */
        .card {
            display: flex;
            padding: 1rem;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            overflow: hidden;
            min-height: 150px;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card img {
            flex-shrink: 0;
            width: 100px;
            height: 100px;
            border-radius: 0.375rem;
        }

        .card .content {
            flex-grow: 1;
            margin-left: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card .content h2 {
            font-size: 1.25rem;
            color: #1D4ED8;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .card .content p {
            font-size: 0.875rem;
            color: #6B7280;
            margin-bottom: 0.5rem;
        }

        .card .content .link {
            margin-top: auto;
            color: #1D4ED8;
            font-weight: 500;
        }

        .card .content .link:hover {
            text-decoration: underline;
        }

        .announcement-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .announcement-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>

    {{-- navbar --}}
    @include('layouts.navbar')

   <section class="container mx-auto px-8 mt-7">
    <div>
        <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2"
            role="alert">
            <span class="font-medium"><a href="/">Home</a> / </span> Pengumuman
        </div>
        <h1 class="text-3xl font-bold">Pengumuman Desa Kedang Murung</h1>
    </div>

    <div class="announcement-container mt-5">
        @foreach ($pengumumans as $pengumuman)
        <div class="card">
            <img src="{{ asset('img/calender.png') }}" alt="Pengumuman Image">
            <div class="content">
                <h2>{{ $pengumuman->judul }}</h2>
                <p><i class="fas fa-calendar-alt"></i> {{ $pengumuman->tanggal }} <br><i class="fas fa-user-alt"></i> {{ $pengumuman->petugas->nama_petugas }}</p>
                <a href="{{ route('detailpengumuman', $pengumuman->id) }}" class="link">selengkapnya ➜</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

    {{-- footer --}}
    @include('layouts.footer')

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
