<!-- Search -->
<form action="{{ route('petugas.search') }}" method="GET" class="flex items-center gap-2">
    <input type="text" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block py-2 px-4 rounded-md" placeholder="Cari data disini">
    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-md"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
