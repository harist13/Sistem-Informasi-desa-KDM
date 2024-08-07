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
                    <span class="font-medium"><a href="/">Home</a> / </span> Kependudukan Desa
                </div>
                <br>
                <form action="{{ route('kpendudukan') }}" method="GET" class="flex items-center gap-x-1">
                <input type="text" name="search" value="{{ $search ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block py-2 px-4 rounded-md" placeholder="Cari data disini">
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-md">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
<br>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">RT/RW</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Tempat Lahir</th>
                        <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                        <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Kelurahan</th>
                        <th scope="col" class="px-6 py-3">Kecamatan</th>
                        <th scope="col" class="px-6 py-3">Kabupaten</th>
                        <th scope="col" class="px-6 py-3">Provinsi</th>
                        <th scope="col" class="px-6 py-3">Agama</th>
                        <th scope="col" class="px-6 py-3">Status Perkawinan</th>
                        <th scope="col" class="px-6 py-3">Pekerjaan</th>
                        <th scope="col" class="px-6 py-3">Status Penduduk</th>
                     
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kependudukans as $index => $kependudukan)
                        <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + 1 }}
                            </th>
                             <td class="px-6 py-4">{{ $kependudukan->rt_rw }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->nama }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->tempat_lahir }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->tanggal_lahir }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->jenis_kelamin }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->alamat }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->kelurahan }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->kecamatan }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->kabupaten }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->provinsi }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->agama }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->status_perkawinan }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->pekerjaan }}</td>
                            <td class="px-6 py-4">{{ $kependudukan->status_penduduk }}</td>
                          
                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
