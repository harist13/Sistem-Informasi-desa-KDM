<form action="{{ route('penduduk.search.staff') }}" method="GET" class="flex items-center gap-x-1">
    <input type="text" name="search"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block py-2 px-4 rounded-md w-60"
        placeholder="Cari Nama RT atau RT">
    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-md">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>