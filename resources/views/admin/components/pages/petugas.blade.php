<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Dashboard Page | Administrator & Staff</title>
    {{-- logo --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
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
                <h1 class="text-2xl lg:text-4xl font-bold mt-4 mb-2">Selamat Datang di Halaman Dashboard</h1>
                <div class="flex justify-between items-center mb-2">
                    <div class="p-3 mb-0 text-sm text-blue-800 rounded-lg lg:w-1/2 bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <i class="fa-solid fa-house mr-1"></i> >
                        <span class="font-medium">Dashboard</span> > Petugas > Administrator / Staff
                    </div>
                    <button data-drawer-target="sidebar-multi-level-sidebar"
                        data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="relative overflow-x-auto mt-4 px-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <div class="flex justify-end items-center gap-2">
                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="block my-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Tambah Data
                        </button>
                        @include('admin.components.modals.petugas.tambahdata')
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                            type="button">Filter Data <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        @include('admin.components.modals.petugas.sort')
                        @include('admin.components.modals.petugas.search')
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
                    <thead
                        class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Petugas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Password
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No. Telp
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $index => $p)
                            <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </th>
                                <td class="px-6 py-4">{{ $p->nama_petugas }}</td>
                                <td class="px-6 py-4">{{ $p->username }}</td>
                                <td class="px-6 py-4">********</td>
                                <td class="px-6 py-4">{{ $p->telp }}</td>
                                <!-- resources/views/admin/components/pages/petugas.blade.php -->

                                <td class="px-6 py-4">
                                    @if ($p->foto)
                                        <img src="{{ asset('storage/petugas/' . $p->foto) }}"
                                            alt="Foto {{ $p->nama_petugas }}"
                                            class="w-16 h-16 object-cover rounded-full">
                                    @else
                                        <span>No Photo</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $p->roles->pluck('name')->implode(', ') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button data-modal-target="edit-modal-{{ $p->id }}"
                                            data-modal-toggle="edit-modal-{{ $p->id }}"
                                            class="block text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                            type="button">
                                            Edit
                                        </button>
                                        <form action="{{ route('petugas.hapus', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this data?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="block text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    @include('admin.components.modals.petugas.editdata', [
                                        'petugas' => $p,
                                        'roles' => $roles,
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('admin.components.modals.editprofile.editprofil')
        </div>
    </section>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
