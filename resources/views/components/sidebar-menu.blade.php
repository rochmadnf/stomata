    <li>
        <a href="{{ $route }}"
            class="{{ request()->is($id . '*') ? 'active-menu' : '' }} flex items-center rounded-lg p-2 text-gray-600 hover:bg-green-100 hover:text-green-500">
            {{ $slot }}
            <span class="ml-3">{{ ucwords($label) }}</span>
        </a>
    </li>
