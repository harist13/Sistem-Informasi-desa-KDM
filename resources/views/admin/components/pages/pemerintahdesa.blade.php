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
    @include('admin.components.layouts.sidebar')
<section>
    <div class="p-4 sm:ml-64">
        <div class="flex flex-col">
            <h1 class="text-2xl lg:text-4xl font-bold mt-4 mb-2">Halaman Pemerintah Desa</h1>
            <div class="flex justify-between items-center mb-2">
                <div class="p-3 mb-0 text-sm text-blue-800 rounded-lg lg:w-full bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <i class="fa-solid fa-house mr-1"></i> >
                    <span class="font-medium">Dashboard</span> > Pemerintah Desa > Administrator / Staff
                </div>
                <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="relative overflow-x-auto mt-4">
            <div class="flex justify-end items-center gap-2 mb-4">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Tambah Data
                </button>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        <th scope="col" class="px-6 py-3">NIP</th>
                        <th scope="col" class="px-6 py-3">Tempat dan Tanggal lahir</th>
                        <th scope="col" class="px-6 py-3">Agama</th>
                        <th scope="col" class="px-6 py-3">Jenis kelamin</th>
                        <th scope="col" class="px-6 py-3">Pendidikan</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Foto</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemerintahdesas as $index => $pemerintahdesa)
                        <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + 1 }}
                            </th>
                            <td class="px-6 py-4">{{ $pemerintahdesa->nama }}</td>
                            <td class="px-6 py-4">{{ $pemerintahdesa->jabatan }}</td>
                            <td class="px-6 py-4">{{ $pemerintahdesa->NIP }}</td>
                            <td class="px-6 py-4">{{ $pemerintahdesa->Tempat_dan_tanggal_lahir	 }}</td>
                            <td class="px-6 py-4">{{ $pemerintahdesa->Agama }}</td>
                            <td class="px-6 py-4">{{ $pemerintahdesa->jenis_kelamin }}</td>
                            <td class="px-6 py-4">{{ $pemerintahdesa->pendidikan }}</td>
                            <td class="px-6 py-4">{{ $pemerintahdesa->alamat }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/pemerintahdesa/' . $pemerintahdesa->foto) }}" alt="{{ $pemerintahdesa->nama }}" class="w-20 h-20 object-cover mx-auto">
                            </td>
                          <td class="px-6 py-4">
    <div class="flex justify-center items-center space-x-2">
        <button data-modal-target="edit-modal-{{ $pemerintahdesa->id }}" data-modal-toggle="edit-modal-{{ $pemerintahdesa->id }}" class="text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
            Edit
        </button>
        <form action="{{ route('pemerintah.hapus', $pemerintahdesa->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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

@include('admin.components.modals.pemerintahdesa.tambahdata')
@foreach ($pemerintahdesas as $pemerintahdesa)
    @include('admin.components.modals.pemerintahdesa.editpemerintahdesa', ['pemerintahdesa' => $pemerintahdesa])
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
