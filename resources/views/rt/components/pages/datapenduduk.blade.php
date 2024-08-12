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

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #e5e7eb;
        padding: 8px;
        text-align: center;
        font-size: 12px;
    }

    th {
        background-color: #f3f4f6;
    }
</style>

<body>


    {{-- sidebar --}}
    @include('rt.components.layouts.sidebar')
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
                    @include('rt.components.modals.penduduk.tambahdata')
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">Filter Data <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    @include('rt.components.modals.penduduk.sort')
                    <a href="{{ route('penduduk.export.rt') }}" class="block lg:w-1/6 my-2 lg:float-end text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-800">
    Export to Excel
</a>

                    @include('rt.components.modals.penduduk.search')
                   
                    <!-- Tambahkan komponen filter dan search jika diperlukan -->
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
            </div>
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
                            @foreach ($rekapulasi as $index => $data)
                                <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">{{ $data->nama_rt }}</td>
                                    <td class="px-6 py-4">{{ $data->RT }}</td>
                                    <td class="px-6 py-4">{{ $data->KK }}</td>
                                    <td class="px-6 py-4">{{ $data->LAKI_LAKI }}</td>
                                    <td class="px-6 py-4">{{ $data->PEREMPUAN }}</td>
                                    <td class="px-6 py-4">{{ $data->BH }}</td>
                                    <td class="px-6 py-4">{{ $data->BS }}</td>
                                    <td class="px-6 py-4">{{ $data->TK }}</td>
                                    <td class="px-6 py-4">{{ $data->SD }}</td>
                                    <td class="px-6 py-4">{{ $data->SLTP }}</td>
                                    <td class="px-6 py-4">{{ $data->SLTA }}</td>
                                    <td class="px-6 py-4">{{ $data->PT }}</td>
                                    <td class="px-6 py-4">{{ $data->TANI }}</td>
                                    <td class="px-6 py-4">{{ $data->DAGANG }}</td>
                                    <td class="px-6 py-4">{{ $data->PNS }}</td>
                                    <td class="px-6 py-4">{{ $data->TNI }}</td>
                                    <td class="px-6 py-4">{{ $data->SWASTA }}</td>
                                    <td class="px-6 py-4">{{ $data->ISLAM }}</td>
                                    <td class="px-6 py-4">{{ $data->KHALOTIK }}</td>
                                    <td class="px-6 py-4">{{ $data->PROTESTAN }}</td>
                                    <td class="px-6 py-4">{{ $data->WNI }}</td>
                                    <td class="px-6 py-4">{{ $data->WNA }}</td>
                                    <td class="px-6 py-4">{{ $data->LK1 }}</td>
                                    <td class="px-6 py-4">{{ $data->PR1 }}</td>
                                    <td class="px-6 py-4">{{ $data->LK2 }}</td>
                                    <td class="px-6 py-4">{{ $data->PR2 }}</td>
                                    <td class="px-6 py-4">{{ $data->LK3 }}</td>
                                    <td class="px-6 py-4">{{ $data->PR3 }}</td>
                                    <td class="px-6 py-4">{{ $data->LK4 }}</td>
                                    <td class="px-6 py-4">{{ $data->PR4 }}</td>
                                    <td class="px-6 py-4">{{ $data->KK2 }}</td>
                                    <td class="px-6 py-4">{{ $data->LK5 }}</td>
                                    <td class="px-6 py-4">{{ $data->PR5 }}</td>
                                    <td class="px-6 py-4">{{ $data->KETERANGAN }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center items-center space-x-2">
                                            <button data-modal-target="edit-modal-{{ $data->id }}"
                                                data-modal-toggle="edit-modal-{{ $data->id }}"
                                                class="block text-white bg-yellow-300 hover:bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                type="button">
                                                Edit
                                            </button>
                                            <form action="{{ route('penduduk.hapus.rt', $data->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                        @foreach ($rekapulasi as $data)
                                            @include('rt.components.modals.penduduk.editdata', [
                                                'rekapulasi' => $data,
                                            ])
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-gray-100 text-center font-bold">
                                <td colspan="2" class="px-6 py-4">Jumlah</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('RT') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('KK') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('LAKI_LAKI') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PEREMPUAN') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('BH') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('BS') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('TK') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('SD') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('SLTP') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('SLTA') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PT') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('TANI') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('DAGANG') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PNS') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('TNI') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('SWASTA') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('ISLAM') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('KHALOTIK') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PROTESTAN') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('WNI') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('WNA') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('LK1') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PR1') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('LK2') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PR2') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('LK3') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PR3') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('LK4') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PR4') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('KK2') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('LK5') }}</td>
                                <td class="px-6 py-4">{{ $rekapulasi->sum('PR5') }}</td>
                                <td colspan="2" class="px-6 py-4">{{ $rekapulasi->sum('RT') + $rekapulasi->sum('KK') + $rekapulasi->sum('LAKI_LAKI') + $rekapulasi->sum('PEREMPUAN') + $rekapulasi->sum('BH') + $rekapulasi->sum('BS') + $rekapulasi->sum('TK') + $rekapulasi->sum('SD') + $rekapulasi->sum('SLTP') + $rekapulasi->sum('SLTA') + $rekapulasi->sum('PT') + $rekapulasi->sum('TANI') + $rekapulasi->sum('DAGANG') + $rekapulasi->sum('PNS') + $rekapulasi->sum('TNI') + $rekapulasi->sum('SWASTA') + $rekapulasi->sum('ISLAM') + $rekapulasi->sum('KHALOTIK') + $rekapulasi->sum('PROTESTAN') + $rekapulasi->sum('WNI') + $rekapulasi->sum('WNA') + $rekapulasi->sum('LK1') + $rekapulasi->sum('PR1') + $rekapulasi->sum('LK2') + $rekapulasi->sum('PR2') + $rekapulasi->sum('LK3') + $rekapulasi->sum('PR3') + $rekapulasi->sum('LK4') + $rekapulasi->sum('PR4') + $rekapulasi->sum('KK2') + $rekapulasi->sum('LK5') + $rekapulasi->sum('PR5') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

            </div>
        </div>
        @include('rt.components.modals.editprofile.editprofil')
    </section>

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
