<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Dashboard Page | Administrator & Staff</title>
    {{-- logo --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>


    {{-- sidebar --}}
    @include('admin.components.layouts.sidebar')
    <section>
    <div class="p-4 sm:ml-64">
        <div class="flex flex-col">
            <h1 class="text-2xl lg:text-4xl font-bold mt-4 mb-2">Halaman Artikel</h1>
            <div class="flex justify-between items-center mb-2">
                <div class="p-3 mb-0 text-sm text-blue-800 rounded-lg lg:w-full bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <i class="fa-solid fa-house mr-1"></i> >
                    <span class="font-medium">Dashboard</span> > Artikel > Administrator / Staff
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto mt-4">
            <div class="flex justify-end items-center gap-2 mb-4">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah Artikel
                </button>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Judul</th>
                        <th scope="col" class="px-6 py-3">Tanggal Upload</th>
                         <th scope="col" class="px-6 py-3">Deskripsi</th>
                        <th scope="col" class="px-6 py-3">Gambar</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artikels as $index => $artikel)
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">{{ $artikel->judul }}</td>
                        <td class="px-6 py-4">{{ $artikel->tanggal_upload }}</td>
                        <td class="px-6 py-4">{{ $artikel->deskripsi }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-20 h-20 object-cover mx-auto">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center space-x-2">
                                <button data-modal-target="edit-modal-{{ $artikel->id }}" data-modal-toggle="edit-modal-{{ $artikel->id }}"
                                    class="text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="button">
                                    Edit
                                </button>
                                <form action="{{ route('artikel.hapus', $artikel->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@include('admin.components.modals.artikel.tambahdata')
@foreach($artikels as $artikel)
    @include('admin.components.modals.artikel.editdata', ['artikel' => $artikel])
@endforeach

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
