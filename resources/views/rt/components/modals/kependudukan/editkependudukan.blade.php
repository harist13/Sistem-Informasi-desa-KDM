<div id="edit-modal-{{ $kependudukan->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data Kependudukan
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-modal-{{ $kependudukan->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form class="space-y-6" action="{{ route('kependudukan.update.rt', $kependudukan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="rt_rw" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT/RW</label>
                        <input type="text" name="rt_rw" id="rt_rw" value="{{ $kependudukan->rt_rw }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('rt_rw')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_rt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama RT</label>
                        <input type="text" name="nama_rt" id="nama_rt" value="{{ $kependudukan->nama_rt }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('nama_rt')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ $kependudukan->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                        <input type="text" name="nik" id="nik" value="{{ $kependudukan->nik }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        @error('nik')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    <div>
                        <label for="no kk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No KK</label>
                        <input type="text" name="no_kk" id="no_kk" value="{{ $kependudukan->no_kk }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('no_kk')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                   <div>
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="LAKI-LAKI" {{ $kependudukan->jenis_kelamin == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                            <option value="PEREMPUAN" {{ $kependudukan->jenis_kelamin == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                        </select>
                         @error('jenis_kelamin')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $kependudukan->tempat_lahir }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('tempat_lahir')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $kependudukan->tanggal_lahir }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('tanggal_lahir')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                        <input type="number" name="umur" id="umur" value="{{ $kependudukan->umur }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('umur')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="bg-gray-50
                        border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>{{ $kependudukan->alamat }}</textarea>
                         @error('alamat')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="dusun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dusun</label>
                        <input type="text" name="dusun" id="dusun" value="{{ $kependudukan->dusun }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('dusun')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kelurahan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                        <input type="text" name="kelurahan" id="kelurahan" value="{{ $kependudukan->kelurahan }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('kelurahan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" value="{{ $kependudukan->kecamatan }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('kecamatan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten</label>
                        <input type="text" name="kabupaten" id="kabupaten" value="{{ $kependudukan->kabupaten }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('kabupaten')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" value="{{ $kependudukan->provinsi }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                         @error('provinsi')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                        <select name="agama" id="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="" disabled>Pilih Agama</option>
                            <option value="ISLAM" {{ $kependudukan->agama == 'ISLAM' ? 'selected' : '' }}>ISLAM</option>
                            <option value="KHATOLIK" {{ $kependudukan->agama == 'KHATOLIK' ? 'selected' : '' }}>KHATOLIK</option>
                            <option value="PROTESTAN" {{ $kependudukan->agama == 'PROTESTAN' ? 'selected' : '' }}>PROTESTAN</option>
                        </select>
                        @error('agama')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label for="status_perkawinan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                        <select name="status_perkawinan" id="status_perkawinan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="Belum Kawin" {{ $kependudukan->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ $kependudukan->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ $kependudukan->status_perkawinan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ $kependudukan->status_perkawinan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                         @error('status_perkawinan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                   <div>
                        <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="" disabled>Pilih Pekerjaan</option>
                            <option value="TANI" {{ $kependudukan->pekerjaan == 'TANI' ? 'selected' : '' }}>TANI</option>
                            <option value="DAGANG" {{ $kependudukan->pekerjaan == 'DAGANG' ? 'selected' : '' }}>DAGANG</option>
                            <option value="PNS" {{ $kependudukan->pekerjaan == 'PNS' ? 'selected' : '' }}>PNS</option>
                            <option value="NELAYAN" {{ $kependudukan->pekerjaan == 'NELAYAN' ? 'selected' : '' }}>NELAYAN</option>
                            <option value="SWASTA" {{ $kependudukan->pekerjaan == 'SWASTA' ? 'selected' : '' }}>SWASTA</option>
                        </select>
                        @error('pekerjaan')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label for="pendidikan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="" disabled>Pilih Pendidikan</option>
                            <option value="BH" {{ $kependudukan->pendidikan == 'BH' ? 'selected' : '' }}>BH</option>
                            <option value="BS" {{ $kependudukan->pendidikan == 'BS' ? 'selected' : '' }}>BS</option>
                            <option value="TK" {{ $kependudukan->pendidikan == 'TK' ? 'selected' : '' }}>TK</option>
                            <option value="SD" {{ $kependudukan->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SLTP" {{ $kependudukan->pendidikan == 'SLTP' ? 'selected' : '' }}>SLTP</option>
                            <option value="SLTA" {{ $kependudukan->pendidikan == 'SLTA' ? 'selected' : '' }}>SLTA</option>
                            <option value="PT" {{ $kependudukan->pendidikan == 'PT' ? 'selected' : '' }}>PT</option>
                        </select>
                        @error('pendidikan')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                   <div>
                        <label for="kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                        <select name="kewarganegaraan" id="kewarganegaraan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="" disabled>Pilih Kewarganegaraan</option>
                            <option value="WNI" {{ $kependudukan->kewarganegaraan == 'WNI' ? 'selected' : '' }}>WNI</option>
                            <option value="WNA" {{ $kependudukan->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select>
                        @error('kewarganegaraan')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                   <div>
                        <label for="status_penduduk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Penduduk</label>
                        <select name="status_penduduk" id="status_penduduk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="LAHIR" {{ $kependudukan->status_penduduk == 'LAHIR' ? 'selected' : '' }}>LAHIR</option>
                            <option value="MATI" {{ $kependudukan->status_penduduk == 'MATI' ? 'selected' : '' }}>MATI</option>
                            <option value="PINDAH" {{ $kependudukan->status_penduduk == 'PINDAH' ? 'selected' : '' }}>PINDAH</option>
                            <option value="DATANG" {{ $kependudukan->status_penduduk == 'DATANG' ? 'selected' : '' }}>DATANG</option>
                        </select>
                        @error('status_penduduk')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>



                   

                    <div>
                        <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto (Biarkan kosong jika tidak ingin mengubah)</label>
                        <input type="file" name="foto" id="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                         @error('foto')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Data Kependudukan</button>
                </form>
            </div>
        </div>
    </div>
</div>