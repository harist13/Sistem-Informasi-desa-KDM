<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
            <a href="{{ route('kependudukan.sort', ['sort_by' => 'nama', 'sort_order' => 'asc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama (A-Z)</a>
        </li>
        <li>
            <a href="{{ route('kependudukan.sort', ['sort_by' => 'nama', 'sort_order' => 'desc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama (Z-A)</a>
        </li>
        <li>
            <a href="{{ route('kependudukan.sort', ['sort_by' => 'rt_rw', 'sort_order' => 'asc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT (Terkecil)</a>
        </li>
        <li>
            <a href="{{ route('kependudukan.sort', ['sort_by' => 'rt_rw', 'sort_order' => 'desc']) }}"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RT (Terbesar)</a>
        </li>
    </ul>
</div>