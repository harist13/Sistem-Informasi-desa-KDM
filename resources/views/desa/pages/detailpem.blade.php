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
                                <img class="lg:h-72 rounded-lg"
                                    src="https://img.freepik.com/free-photo/real-people-natural-portrait-happy-guy-smiling-laughing-looking-upbeat-camera-standing-glasses-white-background_1258-65662.jpg?t=st=1722863823~exp=1722867423~hmac=2457a1788e16917040472a2d2c6f75c203292172e1d9ca570742bf4262c6aaa4&w=996"
                                    alt="">
                                <div class="w-full lg:w-[650px] border-2 border-gray-200 rounded-lg p-6">
                                    <form class="space-y-4" action="#">
                                        <div class="flex items-center gap-4">
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="Uzumaki Naruto" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="Kepala Desa" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="-" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Tempat /
                                                Tanggal Lahir</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="Bantul, 01 Januari 1999" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="Islam" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                Kelamin</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="Laki - Laki" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <label for="email"
                                                class="text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <textarea
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                name="alamat" id="" cols="10" rows="5" required placeholder="Jl. Raya Bantul, Jogjakarta"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <div class="max-w-xs">
                                        <h1>Related Person</h1>
                                        <div class="flex items-center gap-3 mt-3">
                                            <img class="w-28 h-auto"
                                                src="https://img.freepik.com/free-photo/real-people-natural-portrait-happy-guy-smiling-laughing-looking-upbeat-camera-standing-glasses-white-background_1258-65662.jpg?t=st=1722863823~exp=1722867423~hmac=2457a1788e16917040472a2d2c6f75c203292172e1d9ca570742bf4262c6aaa4&w=996"
                                                alt="">
                                            <div>
                                                <h5 class="text-base font-semibold">Uchiha Sasuke</h5>
                                                <p class="text-[13px]">Shadow Hokage</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="max-w-xs">
                                        <div class="flex items-center gap-3 mt-3">
                                            <img class="w-28 h-auto"
                                                src="https://img.freepik.com/free-photo/real-people-natural-portrait-happy-guy-smiling-laughing-looking-upbeat-camera-standing-glasses-white-background_1258-65662.jpg?t=st=1722863823~exp=1722867423~hmac=2457a1788e16917040472a2d2c6f75c203292172e1d9ca570742bf4262c6aaa4&w=996"
                                                alt="">
                                            <div>
                                                <h5 class="text-base font-semibold">Uchiha Sasuke</h5>
                                                <p class="text-[13px]">Shadow Hokage</p>
                                            </div>
                                        </div>
                                    </div>
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
