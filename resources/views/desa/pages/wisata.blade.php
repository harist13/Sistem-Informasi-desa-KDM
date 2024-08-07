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
    <section class="">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-8 mt-12 lg:mt-20 lg:px-12">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold">Judul Geyzzz</h2>
                    <p class="text-md text-justify max-w-2xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Voluptate consectetur veniam ex quo
                        neque
                        harum magni, laboriosam itaque qui, deserunt quaerat. Inventore asperiores quam enim facere
                        atque
                        maxime perferendis eius nostrum. Libero, dolores quisquam nam explicabo tempora, laudantium
                        facilis
                        quas labore maxime ratione autem odit sit fuga alias sed quasi.</p>
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
                    <h2 class="text-3xl font-bold">Judul Geyzzz</h2>
                    <p class="text-md text-justify max-w-2xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Voluptate consectetur veniam ex quo
                        neque
                        harum magni, laboriosam itaque qui, deserunt quaerat. Inventore asperiores quam enim facere
                        atque
                        maxime perferendis eius nostrum. Libero, dolores quisquam nam explicabo tempora, laudantium
                        facilis
                        quas labore maxime ratione autem odit sit fuga alias sed quasi.</p>
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
