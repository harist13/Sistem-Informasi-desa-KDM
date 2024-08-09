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
    </style>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f8f8f8]">

    {{-- navbar --}}
    @include('layouts.navbar')

    <section class="">
        <div class="container mx-auto px-6 text-center">
            <br>
            <h1 class="text-4xl font-bold">Wisata Danau Tanjung Sarai</h1>
            <div class="flex flex-col lg:flex-row justify-between items-center gap-8 mt-12 lg:mt-20 lg:px-12">
                <div class="lg:w-1/2">
                   
                    <p class="text-md text-justify max-w-2xl">Di Desa Kedang Murung yang terletak di Kecamatan Kota Bangun, terdapat objek wisata unggulan bernama Danau Tanjung Sarai. Dikelilingi oleh air, danau ini menawarkan keindahan alam yang memukau dan menjadi daya tarik utama bagi wisatawan. 
                        Setiap tahunnya, wisatawan dari berbagai daerah datang ke objek wisata ini untuk menaiki perahu tradisional yang dikenal sebagai gubang, menikmati udara segar, serta melarikan diri dari polusi dan kebisingan kendaraan. Dengan luas sekitar 3,6 hektar, objek wisata Tanjung Sarai menawarkan pemandangan danau yang luas, dan pengunjung juga dapat menjelajahi danau tersebut dengan perahu.
                        
                    </p>
                </div>
                <div class="lg:w-1/2">
                    <img class="w-full h-auto"
                        src="https://img.freepik.com/free-photo/cascade-boat-clean-china-natural-rural_1417-1356.jpg?t=st=1722911812~exp=1722915412~hmac=74f8963abeb6977af26bfdf4ac0c99fb410559e5dd7f05599139a8a2bf673f3d&w=996"
                        alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-8 mt-6 lg:mt-12 lg:px-12">
                <div class="lg:w-1/2 order-2 lg:order-1">
                    <img class="w-full h-auto"
                        src="https://img.freepik.com/free-photo/cascade-boat-clean-china-natural-rural_1417-1356.jpg?t=st=1722911812~exp=1722915412~hmac=74f8963abeb6977af26bfdf4ac0c99fb410559e5dd7f05599139a8a2bf673f3d&w=996"
                        alt="">
                </div>
                <div class="lg:w-1/2 order-1 lg:order-2">
                   
                    <p class="text-md text-justify max-w-2xl">Objek wisata ini juga memiliki berbagai fasilitas, seperti toilet, jembatan kecil yang dibangun di atas danau, serta wahana bebek air. Jembatan tersebut sering menjadi tempat favorit pengunjung untuk bersantai. Selain itu, Danau Tanjung Sarai juga kerap digunakan sebagai lokasi penyelenggaraan acara yang diadakan oleh pemerintah setempat. 
                        Biaya masuk ke kawasan wisata Tanjung Sarai sangat terjangkau, yaitu Rp 5 ribu untuk kendaraan roda dua dan Rp 10 ribu untuk kendaraan roda empat. Salah satu daya tarik di kawasan ini adalah kesempatan untuk berkeliling pulau-pulau di sekitar Tanjung Sarai. Namun, pengunjung yang ingin naik perahu dibatasi hanya untuk 10 orang per perahu.
                    </p>
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
        document.getElementById('menu-button').onclick = function () {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('show');
        };
    </script>
</body>

</html>
