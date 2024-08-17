<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Registration Page | Administrator & Staff</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="bg-cover object-cover" style="background-image: url('https://i.pinimg.com/originals/13/67/8e/13678e13661844593564d8587f112ba6.jpg')">

    <section>
        <div class="container mx-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg shadow-lg md:w-3/4 lg:w-1/2 xl:w-1/3">
                    <div class="p-6 md:p-8">
                        <h1 class="text-3xl font-bold mb-2">Registration Form</h1>
                        <p class="text-slate-500 mb-6">Please fill in this form to create an account</p>
                        @if ($errors->any())
                            <div class="mb-4">
                                <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('registerMasyarakat') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex items-center gap-4">
                                <div class="flex-1 mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama Lengkap</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Masukkan nama lengkap anda" required>
                                    @error('nama')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex-1 mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nik">Nik</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nik" name="nik" type="text" placeholder="Masukkan Nik anda" required>
                                    @error('nik')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Masukkan email anda">
                                @error('email')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="telp">No Telp</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telp" name="telp" type="text" placeholder="Masukkan nomor telepon anda">
                                @error('telp')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Masukkan password anda" required>
                                @error('password')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                             <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Konfirmasi Password</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" name="password_confirmation" type="password" placeholder="Konfirmasi password anda" required>
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">Foto</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="foto" name="foto" type="file">
                                @error('foto')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                           
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded w-full">Daftar</button>
                            <p class="text-center mt-4">Sudah punya akun?
                                <a class="no-underline font-bold text-sky-500" href="{{ route('loginMasyarakat') }}">Masuk disini</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
