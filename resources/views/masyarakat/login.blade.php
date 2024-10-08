<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Login Page | Administrator & Staff</title>
    {{-- logo --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="bg-cover object-cover"
    style="background-image: url('https://i.pinimg.com/originals/13/67/8e/13678e13661844593564d8587f112ba6.jpg')">

    <section>
        <div class="container mx-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg shadow-lg md:w-3/4 lg:w-1/2 xl:w-1/3">
                    <div class="text-white text-center bg-cover bg-center object-cover py-4 bg-opacity-50"
                        style="background-image: url('https://img.freepik.com/free-photo/beautiful-horizontal-shot-forest-with-green-trees-daytime_181624-4297.jpg?t=st=1721143979~exp=1721147579~hmac=9fe2feec492ce3457a5d51a07571e5da7a053b70a0804ec5374d90ae7f8dbfc9&w=996')">
                        <div class="flex items-center justify-center">
                            <img class="h-16 w-auto" src="{{ asset('img/logo.png') }}" alt="Your Company">
                        </div>
                        <h1 class="text-3xl font-bold">Desa Kedang murung</h1>
                        <p>Welcome back to Website Desa Kedang murung</p>
                    </div>
                    <div class="p-8 md:p-12">
                        <h1 class="text-3xl font-bold mb-2">Login Masyarakat</h1>
                        <p class="text-slate-500 mb-6">Login to your account to get access easily</p>
                        
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('loginMasyarakat') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nik">Nik</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nik') border-red-500 @enderror" id="nik" name="nik" type="text" placeholder="Masukkan Nik anda" required>
                                @error('nik')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" id="password" name="password" type="password" placeholder="Masukkan password anda" required>
                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded w-full">Login</button>
                            <p class="text-center mt-4">Belum punya akun?
                                <a class="no-underline font-bold text-sky-500" href="{{ route('registerMasyarakat') }}">Daftar disini</a>
                            </p>
                            <p class="text-center mt-4">
                                <a class="no-underline font-bold text-sky-500" href="{{ route('loginAdmin') }}">Login petugas/rt</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>