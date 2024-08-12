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
    <style>
        #sidebar-multi-level-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        @media (min-width: 768px) {
            #sidebar-multi-level-sidebar {
                transform: translateX(0);
            }
        }

        #sidebar-multi-level-sidebar.open {
            transform: translateX(0);
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>


    {{-- sidebar --}}
    @include('staff.components.layouts.sidebar')
  <section>
    <div class="p-4 sm:ml-64">
        <div class="flex flex-col">
            <h1 class="text-2xl lg:text-4xl font-bold mt-4 mb-2">Halaman Pengumuman</h1>
            <div class="flex justify-between items-center mb-2">
                <!-- Breadcrumb -->
            </div>
        </div>
        <div class="relative overflow-x-auto mt-4">
            <div class="flex justify-end items-center gap-2 mb-4">
                <button data-modal-target="tambah-pengumuman-modal" data-modal-toggle="tambah-pengumuman-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah Pengumuman
                </button>
            </div>
             @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Judul</th>
                        <th scope="col" class="px-6 py-3">Tanggal Upload</th>
                        <th scope="col" class="px-6 py-3">File</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengumumans as $index => $pengumuman)
                        <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + 1 }}
                            </th>
                            <td class="px-6 py-4">{{ $pengumuman->judul }}</td>
                            <td class="px-6 py-4">{{ $pengumuman->tanggal }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/pengumuman/' . $pengumuman->file) }}"
                                    class="text-blue-600 hover:underline" target="_blank">{{ $pengumuman->file }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center space-x-2">
                                    <button data-modal-target="edit-pengumuman-modal-{{ $pengumuman->id }}"
                                        data-modal-toggle="edit-pengumuman-modal-{{ $pengumuman->id }}"
                                        class="text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                        type="button">
                                        Edit
                                    </button>
                                    <form action="{{ route('pengumuman.hapus.staff', $pengumuman->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
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

@include('staff.components.modals.pengumuman.tambah')
@foreach ($pengumumans as $pengumuman)
    @include('staff.components.modals.pengumuman.edit', ['pengumuman' => $pengumuman])
@endforeach

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar-multi-level-sidebar');
            const toggleButton = document.querySelector('[data-drawer-toggle="sidebar-multi-level-sidebar"]');

            toggleButton.addEventListener('click', function() {
                sidebar.classList.toggle('open');
            });
        });
    </script>
</body>

</html>
