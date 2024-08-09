<!doctype html>
<html lang="id">

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

<body>

    {{-- navbar --}}
    @include('layouts.navbar')

    <section>
        <div class="container mx-auto min-h-screen px-8 mt-7">
            <div>
                <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2"
                    role="alert">
                    <span class="font-medium"><a href="/">Home</a> / </span> Visi Misi
                </div>

                <img src="" alt="">

                <h1 class="text-3xl font-bold">Visi Misi Desa Kedang Murung</h1>

                <p class="text-justify my-5">
                    <strong>Visi</strong><br>
                    "Menuju Terwujudnya Masyarakat Desa Kedang Murung Tentram, Sejahtera dan Berkeadilan"
                </p>

                <p class="text-justify my-5">
                    <strong>Misi</strong>
                    <p>
                        Dalam mewujudkan visi desa, diperlukan langkah-langkah untuk membangun sebuah perubahan kearah yang lebih baik yang dituangkan dalam Misi Desa Kedang Murung. Adapun Misi Desa Kedang Murung, antara lain:
                    </p>
                    <ol type="1" class="list-decimal pl-5 my-4">
                        <li>Meningkatkan kehidupan beragama sebagai salah satu penangkal bahaya Penyalahgunaan Narkoba bagi Pemuda.</li>
                        <li>Meningkatkan Pembangunan Infrastruktur Perekonomian Masyarakat sehingga dapat menunjang kesejahteraan.</li>
                        <li>Meningkatkan pengelolaan potensi Desa berupa Pertanian dan Perikanan dalam arti luas untuk mendukung Perekonomian Masyarakat.</li>
                        <li>Meningkatkan Pengelolaan Sumber Daya Alam di desa yang berkelanjutan dan berwawasan Lingkungan.</li>
                        <li>Meningkatkan Pengelolaan Wisata sebagai pembuka lapangan kerja bagi pemuda dan menjadi salah satu Sumber Pendapatan Asli Desa.</li>
                        <li>Meningkatkan Keberdayaan Pemuda dalam kehidupan bermasyarakat guna mengurangi kenakalan remaja serta peran Perempuan dalam segala aspek Pembangunan di Desa.</li>
                    </ol>
                </p>

                <h3 class="text-2xl font-semibold">Strategi dan Arah Kebijakan Desa</h3>

                <p class="text-justify my-5">
                    Untuk menjalankan visi dan misi di atas memerlukan strategi yang efektif dan efisien, agar tepat sasaran sehingga mengurangi bias yang akan terjadi. Adapun strategi yang diterapkan adalah melakukan peningkatan dan pengembangan untuk sarana dan prasarana kemudian peningkatan kualitas SDM (melalui bantuan biaya pendidikan untuk siswa berprestasi). Peningkatan sarana prasarana Wisata, Pertanian, Perkebunan, dan Perikanan, peningkatan kualitas SDM, kemudian pembangunan sarana jalan dan jembatan untuk memperlancar transportasi di Desa.
                    Desa Kedang Murung, Kecamatan Kota Bangun, Kabupaten Kutai Kartanegara.
                </p>
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
