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
                <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2"
                    role="alert">
                    <span class="font-medium"><a href="/">Home</a> / </span> Rekapulasi Penduduk Desa
                </div>
                <h1 class="text-3xl font-bold">Table Data Penduduk Desa Kedang Murung</h1>
                <div class="flex items-center justify-end gap-3 mt-3">
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="block lg:w-1/6 my-2 lg:float-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Tambah Data
                    </button>
                    {{-- @include('admin.components.modals.penduduk.tambahdata') --}}
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">Filter Data <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    {{-- @include('admin.components.modals.penduduk.sort') --}}
                    {{-- @include('admin.components.modals.penduduk.search') --}}
                    <!-- Tambahkan komponen filter dan search jika diperlukan -->
                </div>
                {{-- @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif --}}
                <div class="relative overflow-x-auto mt-2">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th rowspan="3" class="px-6 py-3">NO</th>
                                    <th rowspan="3" class="px-6 py-3">NAMA RT</th>
                                    <th rowspan="3" class="px-6 py-3">RT</th>
                                    <th rowspan="3" class="px-6 py-3">KK</th>
                                    <th colspan="2" class="px-6 py-3">JUMLAH AWAL</th>
                                    <th colspan="17" class="px-6 py-3">PENDUDUK</th>
                                    <th colspan="8" class="px-6 py-3">MUTASI</th>
                                    <th colspan="3" class="px-6 py-3">JUMLAH AKHIR</th>
                                    <th rowspan="3" class="px-6 py-3">KETERANGAN</th>
                                    <th rowspan="3" class="px-6 py-3">AKSI</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="px-6 py-3">LAKI-LAKI</th>
                                    <th rowspan="2" class="px-6 py-3">PEREMPUAN</th>
                                    <th colspan="7" class="px-6 py-3">PENDIDIKAN</th>
                                    <th colspan="5" class="px-6 py-3">MATA PENCAHARIAN</th>
                                    <th colspan="3" class="px-6 py-3">AGAMA</th>
                                    <th colspan="2" class="px-6 py-3">KEWARGANEGARAAN</th>
                                    <th colspan="2" class="px-6 py-3">LAHIR</th>
                                    <th colspan="2" class="px-6 py-3">MATI</th>
                                    <th colspan="2" class="px-6 py-3">PINDAH</th>
                                    <th colspan="2" class="px-6 py-3">DATANG</th>
                                    <th rowspan="2" class="px-6 py-3">KK</th>
                                    <th rowspan="2" class="px-6 py-3">LK</th>
                                    <th rowspan="2" class="px-6 py-3">PR</th>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3">BH</th>
                                    <th class="px-6 py-3">BS</th>
                                    <th class="px-6 py-3">TK</th>
                                    <th class="px-6 py-3">SD</th>
                                    <th class="px-6 py-3">SLTP</th>
                                    <th class="px-6 py-3">SLTA</th>
                                    <th class="px-6 py-3">PT</th>
                                    <th class="px-6 py-3">TANI</th>
                                    <th class="px-6 py-3">DAGANG</th>
                                    <th class="px-6 py-3">PNS</th>
                                    <th class="px-6 py-3">TNI</th>
                                    <th class="px-6 py-3">SWASTA</th>
                                    <th class="px-6 py-3">ISLAM</th>
                                    <th class="px-6 py-3">KHALOTIK</th>
                                    <th class="px-6 py-3">PROTESTAN</th>
                                    <th class="px-6 py-3">WNI</th>
                                    <th class="px-6 py-3">WNA</th>
                                    <th class="px-6 py-3">LK</th>
                                    <th class="px-6 py-3">PR</th>
                                    <th class="px-6 py-3">LK</th>
                                    <th class="px-6 py-3">PR</th>
                                    <th class="px-6 py-3">LK</th>
                                    <th class="px-6 py-3">PR</th>
                                    <th class="px-6 py-3">LK</th>
                                    <th class="px-6 py-3">PR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center items-center space-x-2">
                                            <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                                class="block text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                type="button">
                                                Edit
                                            </button>
                                            <form action="" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <button type="submit"
                                                    class="block text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                        {{-- @include('admin.components.modals.penduduk.editdata') --}}

                                    </td>
                                </tr>
                                <tr class="bg-gray-100 text-center font-bold">
                                    <td colspan="2" class="px-6 py-4">Jumlah</td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4"></td>
                                    <td colspan="2" class="px-6 py-4"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8 text-md">
                        <h4 class="font-bold mb-2">KETERANGAN:</h4>
                        <div class="relative overflow-x-auto">
                            <table class="w-full md:w-1/2 text-left">
                                <tr>
                                    <td class="pr-4">BH</td>
                                    <td>BUTA HURUF</td>
                                </tr>
                                <tr>
                                    <td class="pr-4">BS</td>
                                    <td>BELUM SEKOLAH</td>
                                </tr>
                                <tr>
                                    <td class="pr-4">TK</td>
                                    <td>TAMAN KANAK-KANAK</td>
                                </tr>
                                <tr>
                                    <td class="pr-4">SD</td>
                                    <td>SEKOLAH DASAR</td>
                                </tr>
                                <tr>
                                    <td class="pr-4">SLTP</td>
                                    <td>SEKOLAH LANJUTAN TINGKAT PERTAMA</td>
                                </tr>
                                <tr>
                                    <td class="pr-4">SLTA</td>
                                    <td>SEKOLAH LANJUTAN TINGKAT ATAS</td>
                                </tr>
                                <tr>
                                    <td class="pr-4">PT/KULIAH</td>
                                    <td>PERGURUAN TINGGI</td>
                                </tr>
                            </table>
                        </div>
                    </div>

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
