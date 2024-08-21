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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        #mobile-menu {
            display: none;
        }

        #mobile-menu.show {
            display: block;
        }
         .swiper-container {
        position: relative;
        padding-bottom: 40px; /* Adjust this value to control the space below the diagram */
    }
    
    .pagination-wrapper {
        position: absolute;
        bottom: 10px; /* Adjust this value to control how far down the pagination appears */
        left: 0;
        right: 0;
    }
    
    .swiper-pagination {
        position: static; /* Override Swiper's default positioning */
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        top: 50%; /* Keep the navigation buttons centered vertically */
        transform: translateY(-50%);
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
                <span class="font-medium"><a href="/">Home</a> / </span> Kependudukan Desa
            </div>
            <br>
            <h2 class="text-2xl font-bold mb-4">Data Penduduk</h2>
            <div class="flex items-center gap-x-2">
                <form action="{{ route('kpendudukan') }}" method="GET" class="flex items-center gap-x-1">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block py-2 px-4 rounded-md" placeholder="Cari data disini">
                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-md">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                    type="button">
                    Sort Data 
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
            </div>
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('ks', ['sort_by' => 'nama', 'sort_order' => 'asc']) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama (A-Z)</a>
                    </li>
                    <li>
                        <a href="{{ route('ks', ['sort_by' => 'nama', 'sort_order' => 'desc']) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama (Z-A)</a>
                    </li>
                    <li>
                        <a href="{{ route('ks', ['sort_by' => 'rt_rw', 'sort_order' => 'asc']) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT (Terkecil)</a>
                    </li>
                    <li>
                        <a href="{{ route('ks', ['sort_by' => 'rt_rw', 'sort_order' => 'desc']) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT (Terbesar)</a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">RT/RW</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Umur</th>
                            <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                            <th scope="col" class="px-6 py-3 min-w-[200px]">Alamat</th>
                            <th scope="col" class="px-6 py-3">Kelurahan</th>
                            <th scope="col" class="px-6 py-3">Kecamatan</th>
                            <th scope="col" class="px-6 py-3">Kabupaten</th>
                            <th scope="col" class="px-6 py-3">Provinsi</th>
                            <th scope="col" class="px-6 py-3">Agama</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kependudukans as $index => $kependudukan)
                            <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </th>
                                <td class="px-6 py-4">{{ $kependudukan->rt_rw }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->nama }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->umur }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->jenis_kelamin }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->alamat }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->kelurahan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->kecamatan }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->kabupaten }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->provinsi }}</td>
                                <td class="px-6 py-4">{{ $kependudukan->agama }}</td>
                              
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <br>
            <br>
            <h2 class="text-2xl font-bold mb-4">Tabel Jumlah Penduduk</h2>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 sm:table-auto md:table-fixed">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 text-left">Total Penduduk</th>
            <th scope="col" class="px-6 py-3 text-left">Jumlah Berdasarkan RT</th>
            <th scope="col" class="px-6 py-3 text-left min-w-[200px]">Jumlah Berdasarkan Dusun</th>
            <th scope="col" class="px-6 py-3 text-left">Jumlah Berdasarkan Agama</th>
            <th scope="col" class="px-6 py-3 text-left">Jumlah Berdasarkan Pekerjaan</th>
            <th scope="col" class="px-6 py-3 text-left">Jumlah Berdasarkan Pendidikan</th>
            <th scope="col" class="px-6 py-3 text-left">Jumlah Berdasarkan Status Perkawinan</th>
            <th scope="col" class="px-6 py-3 text-left">Jumlah Berdasarkan Status Penduduk</th>
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
<br>
<br>
<br>
<h2 class="text-2xl font-bold mb-4">Data Statistik Penduduk</h2>
<div class="swiper mySwiper mt-8">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <canvas id="totalPopulationChart"></canvas>
        </div>
        <div class="swiper-slide">
            <canvas id="rtChart"></canvas>
        </div>
        <div class="swiper-slide">
            <canvas id="dusunChart"></canvas>
        </div>
        <div class="swiper-slide">
            <canvas id="agamaChart"></canvas>
        </div>
        <div class="swiper-slide">
            <canvas id="pekerjaanChart"></canvas>
        </div>
         <div class="swiper-slide">
            <canvas id="pendidikanChart"></canvas>
        </div>
        <div class="swiper-slide">
            <canvas id="statusPerkawinanChart"></canvas>
        </div>
        <div class="swiper-slide">
            <canvas id="statusPendudukChart"></canvas>
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>


<div class="mt-8">
    <br>
    <h2 class="text-2xl font-bold mb-4">Ringkasan Jumlah Penduduk</h2>
    <table id="summaryTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Kategori</th>
                <th scope="col" class="px-6 py-3">Jumlah</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
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


    <script>
    // Function to create a bar chart
    // Function to create a bar chart with different colors
function createChart(ctx, labels, data, title) {
    // Generate an array of different colors
    const colors = generateColors(data.length);
    
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: title,
                data: data,
                backgroundColor: colors,
                borderColor: colors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: title
                }
            }
        }
    });
}

// Function to generate an array of different colors
function generateColors(num) {
    const colors = [];
    for (let i = 0; i < num; i++) {
        colors.push(`hsl(${Math.random() * 360}, 70%, 50%)`);
    }
    return colors;
}

    // Function to add a row to the summary table
    function addToSummaryTable(category, count) {
        const table = document.getElementById('summaryTable').getElementsByTagName('tbody')[0];
        const row = table.insertRow();
        const cellCategory = row.insertCell(0);
        const cellCount = row.insertCell(1);
        cellCategory.textContent = category;
        cellCount.textContent = count;
    }

    // Create charts and populate summary table
    document.addEventListener('DOMContentLoaded', function() {
        // Total Population
        createChart(
            document.getElementById('totalPopulationChart').getContext('2d'),
            ['Total Penduduk'],
            [{{ $kependudukans->count() }}],
            'Total Penduduk'
        );
        addToSummaryTable('Total Penduduk', {{ $kependudukans->count() }});

        // RT Chart
        const rtLabels = {!! json_encode($kependudukans->groupBy('rt_rw')->keys()) !!};
        const rtData = {!! json_encode($kependudukans->groupBy('rt_rw')->map->count()->values()) !!};
        createChart(
            document.getElementById('rtChart').getContext('2d'),
            rtLabels,
            rtData,
            'Jumlah Berdasarkan RT'
        );
        rtLabels.forEach((label, index) => {
            addToSummaryTable(`RT ${label}`, rtData[index]);
        });

        // Dusun Chart
        const dusunLabels = {!! json_encode($kependudukans->groupBy('dusun')->keys()) !!};
        const dusunData = {!! json_encode($kependudukans->groupBy('dusun')->map->count()->values()) !!};
        createChart(
            document.getElementById('dusunChart').getContext('2d'),
            dusunLabels,
            dusunData,
            'Jumlah Berdasarkan Dusun'
        );
        dusunLabels.forEach((label, index) => {
            addToSummaryTable(`Dusun ${label}`, dusunData[index]);
        });

        // Agama Chart
        const agamaLabels = {!! json_encode($kependudukans->groupBy('agama')->keys()) !!};
        const agamaData = {!! json_encode($kependudukans->groupBy('agama')->map->count()->values()) !!};
        createChart(
            document.getElementById('agamaChart').getContext('2d'),
            agamaLabels,
            agamaData,
            'Jumlah Berdasarkan Agama'
        );
        agamaLabels.forEach((label, index) => {
            addToSummaryTable(`Agama ${label}`, agamaData[index]);
        });

        // Pekerjaan Chart
        const pekerjaanLabels = {!! json_encode($kependudukans->groupBy('pekerjaan')->keys()) !!};
        const pekerjaanData = {!! json_encode($kependudukans->groupBy('pekerjaan')->map->count()->values()) !!};
        createChart(
            document.getElementById('pekerjaanChart').getContext('2d'),
            pekerjaanLabels,
            pekerjaanData,
            'Jumlah Berdasarkan Pekerjaan'
        );
        pekerjaanLabels.forEach((label, index) => {
            addToSummaryTable(`Pekerjaan ${label}`, pekerjaanData[index]);
        });

        // Pendidikan Chart
        const pendidikanLabels = {!! json_encode($kependudukans->groupBy('pendidikan')->keys()) !!};
        const pendidikanData = {!! json_encode($kependudukans->groupBy('pendidikan')->map->count()->values()) !!};
        createChart(
            document.getElementById('pendidikanChart').getContext('2d'),
            pendidikanLabels,
            pendidikanData,
            'Jumlah Berdasarkan Pendidikan'
        );
        pendidikanLabels.forEach((label, index) => {
            addToSummaryTable(`Pendidikan ${label}`, pendidikanData[index]);
        });

        // Status Perkawinan Chart
        const statusPerkawinanLabels = {!! json_encode($kependudukans->groupBy('status_perkawinan')->keys()) !!};
        const statusPerkawinanData = {!! json_encode($kependudukans->groupBy('status_perkawinan')->map->count()->values()) !!};
        createChart(
            document.getElementById('statusPerkawinanChart').getContext('2d'),
            statusPerkawinanLabels,
            statusPerkawinanData,
            'Jumlah Berdasarkan Status Perkawinan'
        );
        statusPerkawinanLabels.forEach((label, index) => {
            addToSummaryTable(`Status Perkawinan ${label}`, statusPerkawinanData[index]);
        });

        // Status Penduduk Chart
        const statusPendudukLabels = {!! json_encode($kependudukans->groupBy('status_penduduk')->keys()) !!};
        const statusPendudukData = {!! json_encode($kependudukans->groupBy('status_penduduk')->map->count()->values()) !!};
        createChart(
            document.getElementById('statusPendudukChart').getContext('2d'),
            statusPendudukLabels,
            statusPendudukData,
            'Jumlah Berdasarkan Status Penduduk'
        );
        statusPendudukLabels.forEach((label, index) => {
            addToSummaryTable(`Status Penduduk ${label}`, statusPendudukData[index]);
        });
    });
</script>

<script>
    const swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Chart.js initialization (use the code from your original script)
    document.addEventListener('DOMContentLoaded', function() {
        // Your existing Chart.js initialization code here
    });
</script>

</body>

</html>
