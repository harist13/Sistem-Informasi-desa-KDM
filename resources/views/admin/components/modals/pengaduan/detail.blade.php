<div id="detail-modal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Pengaduan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-modal-{{ $pengaduan->id_pengaduan }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>NIK:</strong> {{ $pengaduan->nik }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>Tanggal Pengaduan:</strong> {{ $pengaduan->tgl_pengaduan }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>Isi Laporan:</strong> {{ $pengaduan->isi_laporan }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>Status:</strong> {{ $pengaduan->status }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>No Telp:</strong> {{ $pengaduan->masyarakat->telp }}
                </p>
                <div>
                    <strong class="text-base leading-relaxed text-gray-500 dark:text-gray-400">Foto:</strong>
                    <img src="{{ asset('storage/pengaduan/'.$pengaduan->foto) }}" alt="Foto Pengaduan" class="mt-2 max-w-full h-auto">
                </div>
                @if($pengaduan->tanggapans->isNotEmpty())
                    <div>
                        <strong class="text-base leading-relaxed text-gray-500 dark:text-gray-400">Tanggapan:</strong>
                        @foreach($pengaduan->tanggapans as $tanggapan)
                            <p class="mt-2 text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                {{ $tanggapan->tanggapan }} 
                                <br>
                                <small>({{ $tanggapan->tgl_tanggapan }})</small>
                            </p>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="detail-modal-{{ $pengaduan->id_pengaduan }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tutup</button>
            </div>
        </div>
    </div>
</div>