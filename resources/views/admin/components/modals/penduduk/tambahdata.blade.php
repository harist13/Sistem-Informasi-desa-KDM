<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Penduduk
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
              <form class="space-y-4" action="{{ route('penduduk.tambah') }}" method="POST">
    @csrf
    <div>
        <label for="nama_rt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama RT</label>
        <input type="text" name="nama_rt" id="nama_rt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('nama_rt')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
    </div>
    <div>
        <label for="RT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
        <input type="text" name="RT" id="RT" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('RT')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
    </div>
    <div>
        <label for="KK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KK</label>
        <input type="number" name="KK" id="KK" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('KK')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
    </div>
    <br>
    <fieldset>
        <legend class="text-sm font-medium text-gray-900 dark:text-white text-center">JUMLAH AWAL</legend>
        <br>
        <div class="flex gap-4">
            <div class="flex-1">
                <label for="LAKI_LAKI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Laki-laki</label>
                <input type="number" name="LAKI_LAKI" id="LAKI_LAKI" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('LAKI_LAKI')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div class="flex-1">
                <label for="PEREMPUAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Perempuan</label>
                <input type="number" name="PEREMPUAN" id="PEREMPUAN" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PEREMPUAN')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <legend class="text-sm font-medium text-gray-900 dark:text-white text-center">PENDIDIKAN</legend>
        <br>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="BH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">BH</label>
                <input type="number" name="BH" id="BH" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('BH')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="BS" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">BS</label>
                <input type="number" name="BS" id="BS" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('BS')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="TK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">TK</label>
                <input type="number" name="TK" id="TK" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('TK')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="SD" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">SD</label>
                <input type="number" name="SD" id="SD" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('SD')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="SLTP" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">SLTP</label>
                <input type="number" name="SLTP" id="SLTP" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('SLTP')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="SLTA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">SLTA</label>
                <input type="number" name="SLTA" id="SLTA" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('SLTA')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">PT</label>
                <input type="number" name="PT" id="PT" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PT')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
        </div>
    </fieldset>
    
    <br>
    <fieldset>
        <legend class="text-sm font-medium text-gray-900 dark:text-white text-center">MATA PENCAHARIAN</legend>
        <br>
        <div class="grid grid-cols-5 gap-4">
            <div>
                <label for="TANI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">TANI</label>
                <input type="number" name="TANI" id="TANI" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('TANI')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="DAGANG" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">DAGANG</label>
                <input type="number" name="DAGANG" id="DAGANG" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('DAGANG')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PNS" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">PNS</label>
                <input type="number" name="PNS" id="PNS" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PNS')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="NELAYAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">NELAYAN</label>
                <input type="number" name="NELAYAN" id="NELAYAN" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('NELAYAN')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="SWASTA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">SWASTA</label>
                <input type="number" name="SWASTA" id="SWASTA" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('SWASTA')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <legend class="text-sm font-medium text-gray-900 dark:text-white text-center">AGAMA</legend>
        <br>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="ISLAM" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">ISLAM</label>
                <input type="number" name="ISLAM" id="ISLAM" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('ISLAM')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="KHALOTIK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">KHALOTIK</label>
                <input type="number" name="KHALOTIK" id="KHALOTIK" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                         @error('KHALOTIK')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PROTESTAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">PROTESTAN</label>
                <input type="number" name="PROTESTAN" id="PROTESTAN" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PROTESTAN')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <legend class="text-sm font-medium text-gray-900 dark:text-white text-center">KEWARGANEGARAAN</legend>
        <br>
        <div class="flex gap-4">
            <div class="flex-1">
                <label for="WNI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">WNI</label>
                <input type="number" name="WNI" id="WNI" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('WNI')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div class="flex-1">
                <label for="WNA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">WNA</label>
                <input type="number" name="WNA" id="WNA" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('WNA')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <legend class="text-sm font-medium text-gray-900 dark:text-white text-center">MUTASI</legend>
        <br>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="LK1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Lahir LK</label>
                <input type="number" name="LK1" id="LK1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark<input type="number" name="LK1" id="LK1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('LK1')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PR1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Lahir PR</label>
                <input type="number" name="PR1" id="PR1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PR1')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="LK2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Mati LK</label>
                <input type="number" name="LK2" id="LK2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('LK2')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PR2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Mati PR</label>
                <input type="number" name="PR2" id="PR2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PR2')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="LK3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Pindah LK</label>
                <input type="number" name="LK3" id="LK3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('LK3')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PR3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Pindah PR</label>
                <input type="number" name="PR3" id="PR3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PR3')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="LK4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Datang LK</label>
                <input type="number" name="LK4" id="LK4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('LK4')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PR4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">Datang PR</label>
                <input type="number" name="PR4" id="PR4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PR4')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            
            </div>
        </div>
    </fieldset>
<br>
    <fieldset>
        <legend class="text-sm font-medium text-gray-900 dark:text-white text-center">JUMLAH AKHIR</legend>
        <br>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="KK2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">KK</label>
                <input type="number" name="KK2" id="KK2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('KK2')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="LK5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">LK</label>
                <input type="number" name="LK5" id="LK5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('LK5')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
            <div>
                <label for="PR5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">PR</label>
                <input type="number" name="PR5" id="PR5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        @error('PR5')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
            </div>
        </div>
    </fieldset>

    <div>
        <label for="KETERANGAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-center">KETERANGAN</label>
        <textarea name="KETERANGAN" id="KETERANGAN" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                        @error('KETERANGAN')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
    </div>

    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Tambah Data
    </button>
</form>

            </div>
        </div>
    </div>
</div>
