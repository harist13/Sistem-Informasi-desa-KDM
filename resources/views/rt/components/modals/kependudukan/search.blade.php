<form action="{{ route('kependudukan.search.rt') }}" method="GET" class="mb-4">
    <div class="flex items-center gap-x-1">
        <input type="text" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm block py-2 px-4 rounded-md" placeholder="Cari data disini" value="{{ request('search') }}">
        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-md">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</form>