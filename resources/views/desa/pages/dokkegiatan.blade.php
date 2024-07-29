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
            <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2" role="alert">
                <span class="font-medium"><a href="/">Home</a> / </span> Dokumentasi Kegiatan
            </div>
            <h1 class="text-3xl font-bold text-[#44b744]">Galeri Kegiatan Desa Kedang Murung</h1>
            <div class="flex flex-col justify-center items-center lg:grid lg:grid-cols-4 gap-6 mt-8">
                @foreach($dokumentasi as $item)
                    <div>
                        <img class="w-96 h-64 object-cover cursor-pointer" 
                             src="{{ asset('storage/dokumentasi/' . $item->foto) }}" 
                             alt="{{ $item->judul }}"
                             onclick="openModal('{{ asset('storage/dokumentasi/' . $item->foto) }}', '{{ $item->judul }}')">
                        <div class="text-center mt-4">
                            <h1 class="text-xl font-bold">{{ $item->judul }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-4 rounded-lg max-w-3xl max-h-full overflow-auto">
            <img id="modalImage" src="" alt="" class="max-w-full h-auto">
            <h2 id="modalTitle" class="text-xl font-bold mt-4 text-center"></h2>
            <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Close</button>
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

    <script>
function openModal(imageSrc, title) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    
    modalImage.src = imageSrc;
    modalTitle.textContent = title;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}
</script>
</body>

</html>
