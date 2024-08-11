<div id="edit-modal-{{ $rekapulasi->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data Penduduk
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-modal-{{ $rekapulasi->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
               <form class="space-y-6" action="{{ route('penduduk.update', $rekapulasi->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Petugas -->
   
    <div>
            <label for="nama_rt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama RT</label>
            <input type="text" name="nama_rt" id="nama_rt" value="{{ $rekapulasi->nama_rt }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('nama_rt')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
        </div>
    <!-- RT dan KK -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="RT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
            <input type="text" name="RT" id="RT" value="{{ $rekapulasi->RT }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('RT')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
        </div>
        <div>
            <label for="KK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KK</label>
            <input type="number" name="KK" id="KK" value="{{ $rekapulasi->KK }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('KK')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
        </div>
    </div>

    <!-- Jumlah Awal -->
    <div class="space-y-2">
        <br>
        <h3 class="font-medium text-gray-900 dark:text-white">JUMLAH AWAL</h3>
        <br>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="LAKI_LAKI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laki-laki</label>
                <input type="number" name="LAKI_LAKI" id="LAKI_LAKI" value="{{ $rekapulasi->LAKI_LAKI }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error('LAKI_LAKI')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
            </div>
            <div>
                <label for="PEREMPUAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perempuan</label>
                <input type="number" name="PEREMPUAN" id="PEREMPUAN" value="{{ $rekapulasi->PEREMPUAN }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('PEREMPUAN')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Pendidikan -->
    <div class="space-y-2">
        <br>
        <h3 class="font-medium text-gray-900 dark:text-white">PENDIDIKAN</h3>
        <br>
        <div class="grid grid-cols-4 gap-4">
            @foreach(['BH', 'BS', 'TK', 'SD', 'SLTP', 'SLTA', 'PT'] as $edu)
                <div>
                    <label for="{{ $edu }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $edu }}</label>
                    <input type="number" name="{{ $edu }}" id="{{ $edu }}" value="{{ $rekapulasi->$edu }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error($edu)
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        </div>
    </div>

    <!-- Mata Pencaharian -->
    <div class="space-y-2">
        <br>
        <h3 class="font-medium text-gray-900 dark:text-white">MATA PENCAHARIAN</h3>
        <br>
        <div class="grid grid-cols-3 gap-4">
            @foreach(['TANI', 'DAGANG', 'PNS', 'TNI', 'SWASTA'] as $job)
                <div>
                    <label for="{{ $job }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $job }}</label>
                    <input type="number" name="{{ $job }}" id="{{ $job }}" value="{{ $rekapulasi->$job }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error($job)
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        </div>
    </div>

    <!-- Agama -->
    <div class="space-y-2">
        <br>
        <h3 class="font-medium text-gray-900 dark:text-white">AGAMA</h3>
        <br>
        <div class="grid grid-cols-3 gap-4">
            @foreach(['ISLAM', 'KHALOTIK', 'PROTESTAN'] as $religion)
                <div>
                    <label for="{{ $religion }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $religion }}</label>
                    <input type="number" name="{{ $religion }}" id="{{ $religion }}" value="{{ $rekapulasi->$religion }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error($religion)
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        </div>
    </div>

    <!-- Kewarganegaraan -->
    <div class="space-y-2">
        <br>
        <h3 class="font-medium text-gray-900 dark:text-white">KEWARGANEGARAAN</h3>
        <br>
        <div class="grid grid-cols-2 gap-4">
            @foreach(['WNI', 'WNA'] as $citizenship)
                <div>
                    <label for="{{ $citizenship }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $citizenship }}</label>
                    <input type="number" name="{{ $citizenship }}" id="{{ $citizenship }}" value="{{ $rekapulasi->$citizenship }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    @error($citizenship)
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        </div>
    </div>

    <!-- Mutasi -->
    <div class="space-y-2">
        <br>
        <h3 class="font-medium text-gray-900 dark:text-white">MUTASI</h3>
        <br>
        <div class="grid grid-cols-2 gap-4">
            @foreach(['LAHIR', 'MATI', 'PINDAH', 'DATANG'] as $index => $mutation)
                <div>
                    <br>
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $mutation }}</h4>
                    <br>
                    <div class="flex gap-2">
                        <div class="flex-1">
                            <label for="LK{{ $index + 1 }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LK</label>
                            <input type="number" name="LK{{ $index + 1 }}" id="LK{{ $index + 1 }}" value="{{ $rekapulasi->{'LK' . ($index + 1)} }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            @error('LK'.($index + 1))
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="PR{{ $index + 1 }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR</label>
                            <input type="number" name="PR{{ $index + 1 }}" id="PR{{ $index + 1 }}" value="{{ $rekapulasi->{'PR' . ($index + 1)} }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            @error('PR'.($index + 1))
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Jumlah Akhir -->
    <div class="space-y-2">
        <br>
        <h3 class="font-medium text-gray-900 dark:text-white">JUMLAH AKHIR</h3>
        <br>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="KK2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KK</label>
                <input type="number" name="KK2" id="KK2" value="{{ $rekapulasi->KK2 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('KK2')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="LK5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LK</label>
                <input type="number" name="LK5" id="LK5" value="{{ $rekapulasi->LK5 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('LK5')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="PR5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR</label>
                <input type="number" name="PR5" id="PR5" value="{{ $rekapulasi->PR5 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('PR5')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Keterangan -->
    <div>
        <label for="KETERANGAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
        <textarea name="KETERANGAN" id="KETERANGAN" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>{{ $rekapulasi->KETERANGAN }}</textarea>
        @error('KETERANGAN')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Rekapulasi</button>
</form>
            </div>
        </div>
    </div>
</div>