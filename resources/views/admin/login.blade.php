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
    style="background-image: url('https://okeborneo.com/wp-content/uploads/2024/06/WhatsApp-Image-2024-06-05-at-10.25.12.jpeg')">
    <section>
        <div class="container mx-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg shadow-lg md:w-3/4 lg:w-1/2 xl:w-1/3">
                    <div class="text-white text-center bg-cover bg-center object-cover py-4 bg-opacity-50"
                        style="background-image: url('https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/177/2024/06/06/kedng-murung-873423276.jpg')">
                        <div class="flex items-center justify-center">
                            <img class="h-16 w-auto" src="{{ asset('img/logo.png') }}" alt="Your Company">
                        </div>
                        <h1 class="text-3xl font-bold">Desa Kedang murung</h1>
                        <p>Welcome back to Website Desa Kedang murung</p>
                    </div>
                    <div class="p-8 md:p-12">
                        <h1 class="text-3xl font-bold mb-2">Login Petugas</h1>
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

                        <form action="{{ route('loginAdmin') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror"
                                    id="username" name="username" type="text" placeholder="Masukkan username anda" value="{{ old('username') }}">
                                @error('username')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                                    id="password" type="password" name="password" placeholder="Masukkan password anda">
                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded w-full">Login</button>
                            <p class="text-center mt-4">
                                <a class="no-underline font-bold text-sky-500" href="{{ route('loginMasyarakat') }}">Kembali</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>