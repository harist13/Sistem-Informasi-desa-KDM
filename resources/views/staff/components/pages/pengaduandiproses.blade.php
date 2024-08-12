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
                <h1 class="text-2xl lg:text-4xl font-bold mt-4 mb-2">Selamat Datang di Halaman Dashboard</h1>
                <div class="flex justify-between items-center mb-2">
                    <div class="p-3 mb-0 text-sm text-blue-800 rounded-lg lg:w-1/2 bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <i class="fa-solid fa-house mr-1"></i> >
                        <span class="font-medium">Dashboard</span> > Pengaduan > Administrator / Staff
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

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                            type="button">Filter Data <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        @include('staff.components.modals.artikel.sort')
                        @include('staff.components.modals.artikel.search')
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <thead
                        class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIK
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pengaduan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Laporan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto
                            </th>
                           
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No telp/wa
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Proses Selesai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $index => $p)
                            <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $index + 1 }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $p->nik }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $p->tgl_pengaduan }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $p->isi_laporan }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('images/' . $p->foto) }}" alt="Foto Pengaduan"
                                        class="w-20 h-20 object-cover">
                                </td>
                            
                                <td class="px-6 py-4">
                                    @if ($p->status == 'proses')
                                        <button
                                            class="px-4 py-2 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-500"
                                            role="alert">
                                            <span class="font-medium">{{ $p->status }}</span>
                                        </button>
                                    @elseif($p->status == 'selesai')
                                        <button
                                            class="px-4 py-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-500"
                                            role="alert">
                                            <span class="font-medium">{{ $p->status }}</span>
                                        </button>
                                    @else
                                        <button
                                            class="px-4 py-2 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-500"
                                            role="alert">
                                            <span class="font-medium">{{ $p->status }}</span>
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $p->masyarakat->telp }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($p->status != 'selesai')
                                        <form action="{{ route('pengaduan.selesai.staff', $p->id_pengaduan) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                onclick="return confirm('Apakah Anda yakin ingin menyelesaikan pengaduan ini?')">Selesai</button>
                                        </form>
                                    @else
                                        berhasil
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center space-x-2">



                                        <button data-modal-target="detail-modal-{{ $p->id_pengaduan }}"
                                            data-modal-toggle="detail-modal-{{ $p->id_pengaduan }}"
                                            class="block text-white bg-blue-800 hover:bg-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                            type="button">
                                            Detail
                                        </button>
                                        <form action="{{ route('pengaduan.hapus.staff', $p->id_pengaduan) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @foreach ($pengaduan as $p)
                                @include('staff.components.modals.pengaduan.detail', ['pengaduan' => $p])
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- delete --}}
            <div id="popup-modal" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                to delete this data?</h3>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            @include('staff.components.modals.editprofile.editprofil')
        </div>
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
