<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
    class="mt-2 ml-3 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 sm:hidden">
    <span class="sr-only">Open sidebar</span>
    <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 h-screen w-64 -translate-x-full transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-gray-50 px-3 py-4 dark:bg-gray-800">
        <a href="{{ route('dashboard') }}" class="mb-5 flex items-center pl-2.5">
            <img src="https://rochmadnf.my.id/assets/images/favicon.png" class="mr-3 h-6 sm:h-7" alt="Stomata Logo" />
            <span class="self-center whitespace-nowrap text-xl font-semibold dark:text-white">Stomata</span>
        </a>
        <ul class="space-y-2 font-medium">
            {{-- @dashboard-menu --}}
            <x-sidebar-menu label="dashboard" :route="route('dashboard')" id="dashboard">
                <svg class="icon-menu group-hover:text-green-500" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                        d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z"
                        fill-rule="evenodd"></path>
                </svg>
            </x-sidebar-menu>

            {{-- @users-menu --}}
            <li>
                <button type="button"
                    class="{{ request()->is('users' . '*') ? 'active-menu' : '' }} group flex w-full items-center rounded-lg p-2 text-gray-600 transition duration-75 hover:bg-green-100 hover:text-green-500"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">


                    <svg class="icon-menu flex-shrink-0 group-hover:text-green-500" aria-hidden="true"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                            d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                            fill-rule="evenodd"></path>
                        <path
                            d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z">
                        </path>
                    </svg>

                    <span class="ml-3 flex-1 whitespace-nowrap text-left" sidebar-toggle-item>Pengguna</span>
                    <svg sidebar-toggle-item class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden space-y-2 py-2">
                    <x-sidebar-menu label="Aktif" extendClass="pl-11" :route="route('users.active')" id="users/active" />
                    <x-sidebar-menu label="Nonaktif" extendClass="pl-11" :route="route('users.nonActive')" id="users/non-active" />
                </ul>
            </li>

            {{-- @profile-menu --}}
            <x-sidebar-menu label="Akun" :route="route('profile', ['user_id' => auth()->id()])" id="profile">
                <svg class="icon-menu group-hover:text-green-500" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                        fill-rule="evenodd"></path>
                </svg>
            </x-sidebar-menu>
        </ul>
        <div id="dropdown-cta" class="mt-[25vh] rounded-lg border p-4 sm:mt-96" role="alert">
            <div class="mb-3 flex items-center">
                <span class="rounded py-0.5 font-bold text-gray-900">
                    {{ session('username') }}
                </span>
            </div>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit"
                    class="mb-2 rounded-md border border-gray-800 px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-800">Logout</button>
            </form>
        </div>
    </div>
</aside>
