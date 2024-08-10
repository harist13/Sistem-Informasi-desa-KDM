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
                        src="{{ asset('img/tj.jpg') }}"
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
                        src="{{ asset('img/serah.jpg') }}"
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
 <section class="my-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-center">Galeri</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-8">
                <div class="overflow-hidden">
                    <img src="{{ asset('img/laut.jpg')}}" alt="Galeri 1" class="w-full h-auto cursor-pointer"
                        onclick="openImageModal(this.src)">
                </div>
                <div class="overflow-hidden">
                    <img src="{{ asset('img/up.jpg')}}"
                        onclick="openImageModal(this.src)">
                </div>
                <div class="overflow-hidden">
                    <img src="{{ asset('img/pela.jpg') }} " alt="Galeri 3" class="w-full h-auto cursor-pointer"
                        onclick="openImageModal(this.src)">
                </div>
                <div class="overflow-hidden">
                    <img src="{{ asset('img/3.jpg') }}" alt="Galeri 4" class="w-full h-auto cursor-pointer"
                        onclick="openImageModal(this.src)">
                </div>
                <div class="overflow-hidden">
                    <img src="{{ asset('img/IMG_0464.jpg') }}" alt="Galeri 4" class="w-full h-auto cursor-pointer"
                        onclick="openImageModal(this.src)">
                </div>
                 <div class="overflow-hidden">
                    <img src="https://koranusantara.com/wp-content/uploads/2024/06/WhatsApp-Image-2024-06-13-at-15.26.37.jpeg" alt="Galeri 4" class="w-full h-auto cursor-pointer"
                        onclick="openImageModal(this.src)">
                </div>
                 <div class="overflow-hidden">
                    <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/177/2024/06/06/kedng-murung-873423276.jpg" alt="Galeri 4" class="w-full h-auto cursor-pointer"
                        onclick="openImageModal(this.src)">
                </div>
                 <div class="overflow-hidden">
                    <img src="{{ asset('img/tj.jpg')}}" alt="Galeri 4" class="w-full h-auto cursor-pointer"
                        onclick="openImageModal(this.src)">
                </div>
            </div>
        </div>
    </section>

    {{-- Modal for image view --}}
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="relative">
            <img id="modalImage" src="" alt="Preview Image" class="max-w-full max-h-screen">
            <button onclick="closeImageModal()"
                class="absolute top-4 right-4 text-white text-2xl font-bold">&times;</button>
        </div>
    </div>

    <section class="my-12">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-semibold text-center">Video</h2>
        <div class="flex justify-center mt-8">
            <div class="w-full lg:w-3/4 xl:w-2/3">
                <div class="aspect-w-16 aspect-h-9">
                    <iframe class="w-full h-[500px]" src="{{ asset('img/tanjung.mp4') }}" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- footer --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        document.getElementById('menu-button').onclick = function () {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('show');
        };

        function openImageModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
</body>

</html>
