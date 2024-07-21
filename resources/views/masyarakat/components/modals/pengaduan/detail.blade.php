<div id="detail-modal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Pengaduan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-modal-{{ $pengaduan->id_pengaduan }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img src="{{ asset('images/'.$pengaduan->foto) }}" alt="Foto Pengaduan" class="w-full h-auto rounded-lg mb-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>Tanggal Pengaduan:</strong> {{ $pengaduan->tgl_pengaduan }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>Isi Laporan:</strong> {{ $pengaduan->isi_laporan }}
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <strong>Status:</strong> {{ $pengaduan->status }}
                </p>
                @if($pengaduan->tanggapans->isNotEmpty())
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold mb-2">Tanggapan:</h4>
                        @foreach($pengaduan->tanggapans as $tanggapan)
                            <div class="mb-2 p-2 bg-gray-100 rounded">
                                <p><strong>Tanggal Tanggapan:</strong> {{ $tanggapan->tgl_tanggapan }}</p>
                                <p><strong>Petugas:</strong> {{ $tanggapan->petugas->nama_petugas }}</p>
                                <p><strong>Tanggapan:</strong> {{ $tanggapan->tanggapan }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Belum ada tanggapan.
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>