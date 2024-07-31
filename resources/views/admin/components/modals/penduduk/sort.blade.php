<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="{{ route('penduduk.sort', ['sort' => 'nama_rt', 'order' => 'asc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama RT (A-Z)</a>
        </li>
        <li>
            <a href="{{ route('penduduk.sort', ['sort' => 'nama_rt', 'order' => 'desc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama RT (Z-A)</a>
        </li>
        <li>
            <a href="{{ route('penduduk.sort', ['sort' => 'RT', 'order' => 'asc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT (Terkecil-Terbesar)</a>
        </li>
        <li>
            <a href="{{ route('penduduk.sort', ['sort' => 'RT', 'order' => 'desc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT (Terbesar-Terkecil)</a>
        </li>
    </ul>
</div>