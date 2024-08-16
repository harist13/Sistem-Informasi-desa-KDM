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
                <br>
                <div class="flex items-center justify-end gap-3 mt-3">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center"
                        type="button">Filter Data <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div class="flex items-center gap-x-1 overflow-x-auto">
                        <form action="{{ route('penduduk.cari') }}" method="GET" class="flex items-center gap-x-1">
                            <input type="text" name="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block py-2 px-4 rounded-md w-36 lg:w-[330px]"
                                placeholder="Cari nama RT atau RT">
                            <button type="submit"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-md">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>

                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('penduduk.urut', ['sort' => 'nama_petugas', 'order' => 'asc']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama
                                    RT (A-Z)</a>
                            </li>
                            <li>
                                <a href="{{ route('penduduk.urut', ['sort' => 'nama_petugas', 'order' => 'desc']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama
                                    RT (Z-A)</a>
                            </li>
                            <li>
                                <a href="{{ route('penduduk.urut', ['sort' => 'RT', 'order' => 'asc']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT
                                    (Terkecil-Terbesar)</a>
                            </li>
                            <li>
                                <a href="{{ route('penduduk.urut', ['sort' => 'RT', 'order' => 'desc']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT
                                    (Terbesar-Terkecil)</a>
                            </li>
                        </ul>
                    </div>



                    <!-- Tambahkan komponen filter dan search jika diperlukan -->
                </div>

                <div class="relative overflow-x-auto mt-2">
                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse border border-gray-300 dark:border-gray-600">
                            <thead
                                class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th rowspan="3" class="px-6 py-3 border border-gray-300 dark:border-gray-600">NO
                                    </th>
                                    <th rowspan="3" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        NAMA RT</th>
                                    <th rowspan="3" class="px-6 py-3 border border-gray-300 dark:border-gray-600">RT
                                    </th>
                                    <th rowspan="3" class="px-6 py-3 border border-gray-300 dark:border-gray-600">KK
                                    </th>
                                    <th colspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        JUMLAH AWAL</th>
                                    <th colspan="17" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        PENDUDUK</th>
                                    <th colspan="8" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        MUTASI</th>
                                    <th colspan="3" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        JUMLAH AKHIR</th>
                                    <th rowspan="3" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        JUMLAH JIWA</th>

                                </tr>
                                <tr>
                                    <th rowspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        LAKI-LAKI</th>
                                    <th rowspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        PEREMPUAN</th>
                                    <th colspan="7" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        PENDIDIKAN</th>
                                    <th colspan="5" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        MATA PENCAHARIAN</th>
                                    <th colspan="3" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        AGAMA</th>
                                    <th colspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        KEWARGANEGARAAN</th>
                                    <th colspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        LAHIR</th>
                                    <th colspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        MATI</th>
                                    <th colspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        PINDAH</th>
                                    <th colspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        DATANG</th>
                                    <th rowspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        KK</th>
                                    <th rowspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        LK</th>
                                    <th rowspan="2" class="px-6 py-3 border border-gray-300 dark:border-gray-600">
                                        PR</th>
                                </tr>
                                <tr>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">BH</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">BS</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">TK</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">SD</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">SLTP</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">SLTA</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">PT</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">TANI</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">DAGANG</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">PNS</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">TNI</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">SWASTA</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">ISLAM</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">KHALOTIK</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">PROTESTAN</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">WNI</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">WNA</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">LK</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">PR</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">LK</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">PR</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">LK</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">PR</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">LK</th>
                                    <th class="px-6 py-3 border border-gray-300 dark:border-gray-600">PR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekapulasi as $index => $data)
                                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $index + 1 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->petugas->nama_petugas }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->RT }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->KK }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->LAKI_LAKI }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PEREMPUAN }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->BH }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->BS }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->TK }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->SD }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->SLTP }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->SLTA }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PT }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->TANI }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->DAGANG }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PNS }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->TNI }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->SWASTA }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->ISLAM }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->KHALOTIK }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PROTESTAN }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->WNI }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->WNA }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->LK1 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PR1 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->LK2 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PR2 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->LK3 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PR3 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->LK4 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PR4 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->KK2 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->LK5 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->PR5 }}</td>
                                        <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                            {{ $data->KETERANGAN }}</td>

                                    </tr>
                                @endforeach
                                <tr class="bg-gray-100 text-center font-bold">
                                    <td colspan="2" class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        Jumlah</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('RT') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('KK') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('LAKI_LAKI') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PEREMPUAN') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('BH') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('BS') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('TK') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('SD') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('SLTP') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('SLTA') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PT') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('TANI') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('DAGANG') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PNS') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('TNI') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('SWASTA') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('ISLAM') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('KHALOTIK') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PROTESTAN') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('WNI') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('WNA') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('LK1') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PR1') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('LK2') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PR2') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('LK3') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PR3') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('LK4') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PR4') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('KK2') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('LK5') }}</td>
                                    <td class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('PR5') }}</td>
                                    <td colspan="2" class="px-6 py-4 border border-gray-300 dark:border-gray-600">
                                        {{ $rekapulasi->sum('KETERANGAN') }}</td>
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
