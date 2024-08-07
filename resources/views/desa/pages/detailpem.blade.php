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

<body class="bg-[#f8f8f8]">

    {{-- navbar --}}
    @include('layouts.navbar')
    <section>
    <div class="container mx-auto min-h-screen px-4 lg:px-8 mt-7">
        <div>
            <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2"
                role="alert">
                <span class="font-medium"><a href="/">Home</a> / </span> Struktur Pemerintahan /
            </div>
            <img src="" alt="">
            <h1 class="text-xl lg:text-3xl font-bold mb-2">Biodata Diri Struktur Pemerintahan</h1>
            <div class="relative overflow-hidden mt-6">
                <div class="flex flex-col justify-center gap-6" style="font-family: 'Poppins', sans-serif">
                   <div class="bg-white shadow-lg w-full">
    <div class="flex flex-col lg:flex-row gap-6 p-4 lg:p-8">
        <img class="lg:h-72 rounded-lg w-full lg:w-auto object-cover"
            src="{{ asset('storage/pemerintahdesa/' . $pemerintahdesa->foto) }}"
            alt="{{ $pemerintahdesa->nama }}">
        <div class="w-full lg:w-[650px] border-2 border-gray-200 rounded-lg p-6">
            <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $pemerintahdesa->nama }}" readonly />
                </div>
                <div class="space-y-2">
                    <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $pemerintahdesa->jabatan }}" readonly />
                </div>
                <div class="space-y-2">
                    <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                    <input type="text" name="nip" id="nip"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $pemerintahdesa->NIP }}" readonly />
                </div>
                <div class="space-y-2">
                    <label for="ttl" class="block text-sm font-medium text-gray-700">Tempat / Tanggal Lahir</label>
                    <input type="text" name="ttl" id="ttl"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $pemerintahdesa->Tempat_dan_tanggal_lahir }}" readonly />
                </div>
                <div class="space-y-2">
                    <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                    <input type="text" name="agama" id="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $pemerintahdesa->Agama }}" readonly />
                </div>
                <div class="space-y-2">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $pemerintahdesa->jenis_kelamin }}" readonly />
                </div>
                <div class="space-y-2 md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="alamat" id="alamat" rows="3" readonly>{{ $pemerintahdesa->alamat }}</textarea>
                </div>
            </form>
        </div>
    </div>
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
