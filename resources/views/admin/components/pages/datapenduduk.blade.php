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
            <h1 class="text-2xl lg:text-4xl font-bold mt-4 mb-2">Data Penduduk</h1>
            <div class="flex justify-between items-center mb-2">
                <div class="p-3 mb-0 text-sm text-blue-800 rounded-lg lg:w-full bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <i class="fa-solid fa-house mr-1"></i> >
                    <span class="font-medium">Dashboard</span> > Penduduk > Administrator / Staff
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
            <div class="flex items-center justify-end gap-3 mt-3">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="block lg:w-1/6 my-2 lg:float-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah Data
                </button>
                @include('admin.components.modals.penduduk.tambahdata')
                <!-- Tambahkan komponen filter dan search jika diperlukan -->
            </div>
        </div>
        <div class="relative overflow-x-auto mt-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Foto</th>
                        <th scope="col" class="px-6 py-3">NIK</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Tempat Lahir</th>
                        <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                        <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">RT/RW</th>
                        <th scope="col" class="px-6 py-3">Kelurahan</th>
                        <th scope="col" class="px-6 py-3">Kecamatan</th>
                        <th scope="col" class="px-6 py-3">Kabupaten</th>
                        <th scope="col" class="px-6 py-3">Provinsi</th>
                        <th scope="col" class="px-6 py-3">Agama</th>
                        <th scope="col" class="px-6 py-3">Status Perkawinan</th>
                        <th scope="col" class="px-6 py-3">Pekerjaan</th>
                        <th scope="col" class="px-6 py-3">Status Penduduk</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penduduk as $index => $p)
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            @if($p->foto)
                                <img src="{{ asset('storage/penduduk/' . $p->foto) }}" alt="{{ $p->nama }}" class="w-16 h-16 rounded-full mx-auto">
                            @else
                                <span>No Photo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $p->nik }}</td>
                        <td class="px-6 py-4">{{ $p->nama }}</td>
                        <td class="px-6 py-4">{{ $p->tempat_lahir }}</td>
                        <td class="px-6 py-4">{{ $p->tanggal_lahir }}</td>
                        <td class="px-6 py-4">{{ $p->jenis_kelamin }}</td>
                        <td class="px-6 py-4">{{ $p->alamat }}</td>
                        <td class="px-6 py-4">{{ $p->rt_rw }}</td>
                        <td class="px-6 py-4">{{ $p->kelurahan }}</td>
                        <td class="px-6 py-4">{{ $p->kecamatan }}</td>
                        <td class="px-6 py-4">{{ $p->kabupaten }}</td>
                        <td class="px-6 py-4">{{ $p->provinsi }}</td>
                        <td class="px-6 py-4">{{ $p->agama }}</td>
                        <td class="px-6 py-4">{{ $p->status_perkawinan }}</td>
                        <td class="px-6 py-4">{{ $p->pekerjaan }}</td>
                        <td class="px-6 py-4">{{ $p->status_penduduk }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center space-x-2">
                                <button data-modal-target="edit-modal-{{ $p->id }}" data-modal-toggle="edit-modal-{{ $p->id }}"
                                    class="text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="button">
                                    Edit
                                </button>
                                <button data-modal-target="delete-modal-{{ $p->id }}" data-modal-toggle="delete-modal-{{ $p->id }}"
                                    class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="button">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @include('admin.components.modals.penduduk.editdata', ['penduduk' => $p])
                    @include('admin.components.modals.penduduk.deleteconfirmation', ['penduduk' => $p])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
