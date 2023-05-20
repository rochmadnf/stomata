<x-main-layout subtitle="daftar pengguna">

    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Pengguna
            {{ request()->route()->getName() === 'users.active'? 'Aktif': 'Belum/Tidak Aktif' }}</h1>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left text-sm text-gray-900">
                <thead class="bg-green-500 text-xs uppercase text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No. HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) <= 0)
                        <tr class="bg-white">
                            <td colspan="5">
                                <div class="flex items-center justify-center p-5">
                                    <p class="text-lg font-medium">Data Kosong</p>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($users as $au)
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-6 py-4">
                                    {{ $au->full_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $au->phone_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $au->address }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ (int) $au->gender === 1 ? 'Laki-Laki' : 'Perempuan' }}
                                </td>
                                <td class="flex items-center space-x-3 px-6 py-4">
                                    {{-- @detail --}}
                                    <a href="#" data-tooltip-target="tooltip-info" data-tooltip-placement="top"
                                        role="button"
                                        class="inline-flex items-center rounded-lg bg-blue-500 p-2.5 text-center text-sm font-medium text-white hover:bg-blue-700 hover:text-red-50 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <div id="tooltip-info" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm dark:bg-gray-700">
                                        Detail
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    {{-- @delete --}}
                                    <button data-button="delete" data-user="{{ $au->id }}"
                                        data-tooltip-target="tooltip-delete" data-tooltip-placement="top" role="button"
                                        class="inline-flex items-center rounded-lg bg-red-500 p-2.5 text-center text-sm font-medium text-white hover:bg-red-700 hover:text-red-50 focus:outline-none focus:ring-4 focus:ring-red-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <div id="tooltip-delete" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm dark:bg-gray-700">
                                        Hapus
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    {{-- @activation --}}
                                    <a href="{{ route('users.activation', ['user_id' => $au->id]) }}"
                                        data-tooltip-target="tooltip-edit" data-tooltip-placement="top" role="button"
                                        class="{{ request()->route()->getName() === 'users.active'? 'bg-pink-500 hover:bg-pink-600 focus:ring-pink-300': 'bg-teal-400 hover:bg-teal-600 focus:ring-teal-300' }} inline-flex items-center rounded-lg p-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4">

                                        @if (request()->route()->getName() === 'users.active')
                                            <i class="fa-solid fa-user-slash"></i>
                                        @else
                                            <i class="fa-solid fa-user-check"></i>
                                        @endif

                                    </a>
                                    <div id="tooltip-edit" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm dark:bg-gray-700">
                                        {{ request()->route()->getName() === 'users.active'? 'Nonaktifkan': 'Aktifkan' }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-8">{{ $users->links() }}</div>

    </div>

    <x-slot name='scripts'>
        @vite('resources/js/pages/users.js')
    </x-slot>

</x-main-layout>
