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
                    <span class="font-medium"><a href="/">Home</a> / </span> Struktur Pemerintahan
                </div>
                <img src="" alt="">
                <h1 class="text-3xl font-bold mb-2">Pemerintahan Desa Kedang Murung</h1>
                <p>Adapun struktural nama pemerintahan yang mengatur di Desa Kedang Murung</p>
                <div class="relative overflow-hidden mt-6">
                    <div class="flex flex-col justify-center items-center lg:grid lg:grid-cols-4 gap-6"
                        style="font-family: 'Poppins', sans-serif">
                        <div class="bg-green-500 shadow-xl rounded-lg max-w-xs">
                            <a href="{{ route('detailpem') }}">
                                <img class="w-full rounded-t-lg"
                                    src="https://img.freepik.com/free-photo/real-people-natural-portrait-happy-guy-smiling-laughing-looking-upbeat-camera-standing-glasses-white-background_1258-65662.jpg?t=st=1722863823~exp=1722867423~hmac=2457a1788e16917040472a2d2c6f75c203292172e1d9ca570742bf4262c6aaa4&w=996"
                                    alt="">
                            </a>
                            <div class="text-center p-4">
                                <h3 class="text-xl text-white font-bold">Uzummaki Naruto</h3>
                                <p class="text-white">Kepala Desa</p>
                                <span class="text-sm text-white opacity-75">2021 - 2024</span>
                            </div>
                        </div>
                        <div class="bg-green-500 shadow-xl rounded-lg max-w-xs">
                            <img class="w-full rounded-t-lg"
                                src="https://img.freepik.com/free-photo/real-people-natural-portrait-happy-guy-smiling-laughing-looking-upbeat-camera-standing-glasses-white-background_1258-65662.jpg?t=st=1722863823~exp=1722867423~hmac=2457a1788e16917040472a2d2c6f75c203292172e1d9ca570742bf4262c6aaa4&w=996"
                                alt="">
                            <div class="text-center p-4">
                                <h3 class="text-xl text-white font-bold">Uzummaki Naruto</h3>
                                <p class="text-white">Kepala Desa</p>
                                <span class="text-sm text-white opacity-75">2021 - 2024</span>
                            </div>
                        </div>
                        <div class="bg-green-500 shadow-xl rounded-lg max-w-xs">
                            <img class="w-full rounded-t-lg"
                                src="https://img.freepik.com/free-photo/real-people-natural-portrait-happy-guy-smiling-laughing-looking-upbeat-camera-standing-glasses-white-background_1258-65662.jpg?t=st=1722863823~exp=1722867423~hmac=2457a1788e16917040472a2d2c6f75c203292172e1d9ca570742bf4262c6aaa4&w=996"
                                alt="">
                            <div class="text-center p-4">
                                <h3 class="text-xl text-white font-bold">Uzummaki Naruto</h3>
                                <p class="text-white">Kepala Desa</p>
                                <span class="text-sm text-white opacity-75">2021 - 2024</span>
                            </div>
                        </div>
                        <div class="bg-green-500 shadow-xl rounded-lg max-w-xs">
                            <img class="w-full rounded-t-lg"
                                src="https://img.freepik.com/free-photo/real-people-natural-portrait-happy-guy-smiling-laughing-looking-upbeat-camera-standing-glasses-white-background_1258-65662.jpg?t=st=1722863823~exp=1722867423~hmac=2457a1788e16917040472a2d2c6f75c203292172e1d9ca570742bf4262c6aaa4&w=996"
                                alt="">
                            <div class="text-center p-4">
                                <h3 class="text-xl text-white font-bold">Uzummaki Naruto</h3>
                                <p class="text-white">Kepala Desa</p>
                                <span class="text-sm text-white opacity-75">2021 - 2024</span>
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
