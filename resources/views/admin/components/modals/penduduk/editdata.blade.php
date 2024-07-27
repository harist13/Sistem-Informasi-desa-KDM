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
                <form class="space-y-4" action="{{ route('penduduk.update', $rekapulasi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Add form fields here, similar to the tambahPenduduk form, but with the current values -->
                    <div>
                        <label for="petugas_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Petugas</label>
                        <select name="petugas_id" id="petugas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            @foreach($petugas as $p)
                                <option value="{{ $p->id }}" {{ $rekapulasi->petugas_id == $p->id ? 'selected' : '' }}>{{ $p->nama_petugas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="RT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                        <input type="text" name="RT" id="RT" value="{{ $rekapulasi->RT }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <div>
    <label for="KK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KK</label>
    <input type="number" name="KK" id="KK" value="{{ $rekapulasi->KK }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="LAKI_LAKI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laki-laki</label>
        <input type="number" name="LAKI_LAKI" id="LAKI_LAKI" value="{{ $rekapulasi->LAKI_LAKI }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="PEREMPUAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perempuan</label>
        <input type="number" name="PEREMPUAN" id="PEREMPUAN" value="{{ $rekapulasi->PEREMPUAN }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="BH" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BH</label>
        <input type="number" name="BH" id="BH" value="{{ $rekapulasi->BH }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="BS" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BS</label>
        <input type="number" name="BS" id="BS" value="{{ $rekapulasi->BS }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="TK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TK</label>
        <input type="number" name="TK" id="TK" value="{{ $rekapulasi->TK }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="SD" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SD</label>
        <input type="number" name="SD" id="SD" value="{{ $rekapulasi->SD }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="SLTP" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SLTP</label>
        <input type="number" name="SLTP" id="SLTP" value="{{ $rekapulasi->SLTP }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="SLTA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SLTA</label>
        <input type="number" name="SLTA" id="SLTA" value="{{ $rekapulasi->SLTA }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div>
    <label for="PT" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PT</label>
    <input type="number" name="PT" id="PT" value="{{ $rekapulasi->PT }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="TANI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TANI</label>
        <input type="number" name="TANI" id="TANI" value="{{ $rekapulasi->TANI }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="DAGANG" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DAGANG</label>
        <input type="number" name="DAGANG" id="DAGANG" value="{{ $rekapulasi->DAGANG }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="PNS" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PNS</label>
        <input type="number" name="PNS" id="PNS" value="{{ $rekapulasi->PNS }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="TNI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TNI</label>
        <input type="number" name="TNI" id="TNI" value="{{ $rekapulasi->TNI }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div>
    <label for="SWASTA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SWASTA</label>
    <input type="number" name="SWASTA" id="SWASTA" value="{{ $rekapulasi->SWASTA }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="ISLAM" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISLAM</label>
        <input type="number" name="ISLAM" id="ISLAM" value="{{ $rekapulasi->ISLAM }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="KHALOTIK" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KHALOTIK</label>
        <input type="number" name="KHALOTIK" id="KHALOTIK" value="{{ $rekapulasi->KHALOTIK }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div>
    <label for="PROTESTAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PROTESTAN</label>
    <input type="number" name="PROTESTAN" id="PROTESTAN" value="{{ $rekapulasi->PROTESTAN }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="WNI" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WNI</label>
        <input type="number" name="WNI" id="WNI" value="{{ $rekapulasi->WNI }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="WNA" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WNA</label>
        <input type="number" name="WNA" id="WNA" value="{{ $rekapulasi->WNA }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="LK1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LK1</label>
        <input type="number" name="LK1" id="LK1" value="{{ $rekapulasi->LK1 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="PR1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR1</label>
        <input type="number" name="PR1" id="PR1" value="{{ $rekapulasi->PR1 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="LK2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LK2</label>
        <input type="number" name="LK2" id="LK2" value="{{ $rekapulasi->LK2 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="PR2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR2</label>
        <input type="number" name="PR2" id="PR2" value="{{ $rekapulasi->PR2 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="LK3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LK3</label>
        <input type="number" name="LK3" id="LK3" value="{{ $rekapulasi->LK3 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="PR3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR3</label>
        <input type="number" name="PR3" id="PR3" value="{{ $rekapulasi->PR3 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>

<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="LK4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LK4</label>
        <input type="number" name="LK4" id="LK4" value="{{ $rekapulasi->LK4 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="PR4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR4</label>
        <input type="number" name="PR4" id="PR4" value="{{ $rekapulasi->PR4 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>
 <div class="flex-1">
        <label for="KK2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR4</label>
        <input type="number" name="KK2" id="KK2" value="{{ $rekapulasi->KK2 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
<div class="flex items-center gap-2">
    <div class="flex-1">
        <label for="LK5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LK5</label>
        <input type="number" name="LK5" id="LK5" value="{{ $rekapulasi->LK5 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
    <div class="flex-1">
        <label for="PR5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PR5</label>
        <input type="number" name="PR5" id="PR5" value="{{ $rekapulasi->PR5 }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
    </div>
</div>



<div>
    <label for="KETERANGAN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
    <textarea name="KETERANGAN" id="KETERANGAN" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>{{ $rekapulasi->KETERANGAN }}</textarea>
</div>

<button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Rekapulasi</button>

                    <!-- Add the rest of the form fields here -->

                  
                </form>
            </div>
        </div>
    </div>
</div>