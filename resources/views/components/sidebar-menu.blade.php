    <li>
        <a href="{{ $route }}"
            class="{{ request()->is($id . '*') ? 'active-menu' : '' }} group flex items-center rounded-lg p-2 text-gray-600 transition duration-75 hover:bg-green-100 hover:text-green-500">
            {{ $slot }}
            <span class="ml-3">{{ ucwords($label) }}</span>
        </a>
    </li>
