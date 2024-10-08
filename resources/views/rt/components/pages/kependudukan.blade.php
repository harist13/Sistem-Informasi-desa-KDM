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
    @include('rt.components.layouts.sidebar')
<section>
    <div class="p-4 sm:ml-64">
        <div class="flex flex-col">
            <h1 class="text-2xl lg:text-4xl font-bold mt-4 mb-2">Halaman Kependudukan</h1>
            <div class="flex justify-between items-center mb-2">
                <div class="p-3 mb-0 text-sm text-blue-800 rounded-lg lg:w-full bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <i class="fa-solid fa-house mr-1"></i> >
                    <span class="font-medium">Dashboard</span> > Kependudukan > Administrator / Staff
                </div>
                <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="relative mt-4">
            <!-- Tombol-tombol di luar container tabel -->
            <div class="flex flex-wrap justify-end items-center gap-4 mb-4 sticky top-0 bg-white z-10">
    <form action="{{ route('kependudukan.import.rt') }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-2">
        @csrf
        <input type="file" name="file" accept=".xlsx, .xls" class="border p-2 rounded">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Import Excel</button>
    </form>

    <button data-modal-target="tambah-kependudukan-modal" data-modal-toggle="tambah-kependudukan-modal"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Tambah Data
    </button>

    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center"
        type="button">
        Sort Data
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
    </button>

    <a href="{{ route('kependuduk.export.rt') }}"
        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-800">
        Export to Excel
    </a>
</div>

<!-- Pencarian diletakkan di bawah tombol Export -->
<div class="flex justify-end mt-4">
    @include('rt.components.modals.kependudukan.search')
</div>

@include('rt.components.modals.kependudukan.sort')

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
            <!-- Container tabel dengan overflow -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">RT/RW</th>
                            <th scope="col" class="px-6 py-3">Nama RT</th>
                            <th scope="col" class="px-6 py-3">Nama Penduduk</th>
                            <th scope="col" class="px-6 py-3">NIK</th>
                            <th scope="col" class="px-6 py-3">No KK</th>
                            <th scope="col" class="px-6 py-3">Tempat Lahir</th>
                            <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                            <th scope="col" class="px-6 py-3">Umur</th>
                            <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Dusun</th>
                            <th scope="col" class="px-6 py-3">Kelurahan</th>
                            <th scope="col" class="px-6 py-3">Kecamatan</th>
                            <th scope="col" class="px-6 py-3">Kabupaten</th>
                            <th scope="col" class="px-6 py-3">Provinsi</th>
                            <th scope="col" class="px-6 py-3">Agama</th>
                            <th scope="col" class="px-6 py-3">Status Perkawinan</th>
                            <th scope="col" class="px-6 py-3">Pekerjaan</th>
                            <th scope="col" class="px-6 py-3">Pendidikan</th>
                            <th scope="col" class="px-6 py-3">Kewarganegaraan</th>
                            <th scope="col" class="px-6 py-3">Status Penduduk</th>
                            <th scope="col" class="px-6 py-3">Foto</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kependudukans as $index => $kependudukan)
                            <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </th>
                                <td class="px-6 py-4">{{ $kependudukan->rt_rw }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->nama_rt }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->nama }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->nik }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->no_kk }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->tempat_lahir }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->tanggal_lahir }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->umur }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->jenis_kelamin }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->alamat }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->dusun }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->kelurahan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->kecamatan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->kabupaten }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->provinsi }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->agama }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->status_perkawinan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->pekerjaan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->pendidikan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->kewarganegaraan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->status_penduduk }}</td>
                                <td class="px-6 py-4">
                                    @if($kependudukan->foto)
                                        <img src="{{ asset('storage/kependudukan/' . $kependudukan->foto) }}" alt="{{ $kependudukan->nama }}" class="w-20 h-20 object-cover mx-auto">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button data-modal-target="edit-modal-{{ $kependudukan->id }}" data-modal-toggle="edit-modal-{{ $kependudukan->id }}" class="text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                            Edit
                                        </button>
                                        <form action="{{ route('kependudukan.hapus.rt', $kependudukan->id) }}" method="POST">
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
            <!-- Tabel Jumlah Penduduk -->
        <div class="mt-4 text-sm">
                    <h4 class="font-bold mb-2">KETERANGAN:</h4>
                    <table class="w-full md:w-1/2 text-left">
                        <tr>
                            <td class="pr-4">BH</td>
                            <td>= BUTA HURUF</td>
                        </tr>
                        <tr>
                            <td class="pr-4">BS</td>
                            <td>= BELUM SEKOLAH</td>
                        </tr>
                        <tr>
                            <td class="pr-4">TK</td>
                            <td>= TAMAN KANAK-KANAK</td>
                        </tr>
                        <tr>
                            <td class="pr-4">SD</td>
                            <td>= SEKOLAH DASAR</td>
                        </tr>
                        <tr>
                            <td class="pr-4">SLTP</td>
                            <td>= SEKOLAH LANJUTAN TINGKAT PERTAMA</td>
                        </tr>
                        <tr>
                            <td class="pr-4">SLTA</td>
                            <td>= SEKOLAH LANJUTAN TINGKAT ATAS</td>
                        </tr>
                        <tr>
                            <td class="pr-4">PT/KULIAH</td>
                            <td>= PERGURUAN TINGGI</td>
                        </tr>
                    </table>
                </div>
            <br>
            <br>

<div class="overflow-x-auto">
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Total Penduduk</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan RT</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan Dusun</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan Agama</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan Pekerjaan</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan Pendidikan</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan Status Perkawinan</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan Status Penduduk</th>
        </tr>
    </thead>
    <tbody>
        <!-- Total Penduduk -->
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 text-left font-medium text-gray-900 dark:text-white">
                {{ $kependudukans->count() }}
            </td>
            <!-- Jumlah Berdasarkan RT -->
            <td class="px-6 py-4 text-left">
                <ul class="list-disc list-inside">
                    @foreach ($kependudukans->groupBy('rt_rw') as $rt_rw => $penduduk)
                        <li>RT/RW {{ $rt_rw }}: {{ $penduduk->count() }}</li>
                    @endforeach
                </ul>
            </td>

             <td class="px-6 py-4 text-left">
                <ul class="list-disc list-inside">
                    @foreach ($kependudukans->groupBy('dusun') as $dusun => $penduduk)
                        <li>{{ $dusun }}: {{ $penduduk->count() }}</li>
                    @endforeach
                </ul>
            </td>

            <td class="px-6 py-4 text-left">
                <ul class="list-disc list-inside">
                    @foreach ($kependudukans->groupBy('agama') as $agama => $penduduk)
                        <li>{{ $agama }}: {{ $penduduk->count() }}</li>
                    @endforeach
                </ul>
            </td>

            <td class="px-6 py-4 text-left">
                <ul class="list-disc list-inside">
                    @foreach ($kependudukans->groupBy('pekerjaan') as $pekerjaan => $penduduk)
                        <li>{{ $pekerjaan }}: {{ $penduduk->count() }}</li>
                    @endforeach
                </ul>
            </td>

            <td class="px-6 py-4 text-left">
                <ul class="list-disc list-inside">
                    @foreach ($kependudukans->groupBy('pendidikan') as $pendidikan => $penduduk)
                        <li>{{ $pendidikan }}: {{ $penduduk->count() }}</li>
                    @endforeach
                </ul>
            </td>
            <!-- Jumlah Berdasarkan Status Perkawinan -->
            <td class="px-6 py-4 text-left">
                <ul class="list-disc list-inside">
                    @foreach ($kependudukans->groupBy('status_perkawinan') as $status_perkawinan => $penduduk)
                        <li>{{ $status_perkawinan }}: {{ $penduduk->count() }}</li>
                    @endforeach
                </ul>
            </td>
            <!-- Jumlah Berdasarkan Status Penduduk -->
            <td class="px-6 py-4 text-left">
                <ul class="list-disc list-inside">
                    @foreach ($kependudukans->groupBy('status_penduduk') as $status_penduduk => $penduduk)
                        <li>{{ $status_penduduk }}: {{ $penduduk->count() }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </tbody>
</table>
    </div>


        </div>
    </div>
</section>

@include('rt.components.modals.kependudukan.tambah')
@foreach($kependudukans as $kependudukan)
    @include('rt.components.modals.kependudukan.editkependudukan', ['kependudukan' => $kependudukan])
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
