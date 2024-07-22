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
                    <span class="font-medium"><a href="/">Home</a> / </span> Dokumentasi Kegiatan
                </div>
                <img src="" alt="">
                <h1 class="text-3xl font-bold">Galeri Kegiatan Desa Kedang Murung</h1>
                <div class="flex flex-col justify-center items-center lg:grid lg:grid-cols-4 gap-4 mt-8">
                    <div>
                        <img class="w-96"
                            src="https://img.freepik.com/free-photo/men-women-help-each-other-collect-garbage_1150-23976.jpg"
                            alt="">
                    </div>
                    <div>
                        <img class="w-96"
                            src="https://img.freepik.com/free-photo/men-women-help-each-other-collect-garbage_1150-23976.jpg"
                            alt="">
                    </div>
                    <div>
                        <img class="w-96"
                            src="https://img.freepik.com/free-photo/men-women-help-each-other-collect-garbage_1150-23976.jpg"
                            alt="">
                    </div>
                    <div>
                        <img class="w-96"
                            src="https://img.freepik.com/free-photo/men-women-help-each-other-collect-garbage_1150-23976.jpg"
                            alt="">
                    </div>
                    <div>
                        <img class="w-96"
                            src="https://img.freepik.com/free-photo/men-women-help-each-other-collect-garbage_1150-23976.jpg"
                            alt="">
                    </div>
                    <div>
                        <img class="w-96"
                            src="https://img.freepik.com/free-photo/men-women-help-each-other-collect-garbage_1150-23976.jpg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- footer --}}
    @include('layouts.footer')



    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
