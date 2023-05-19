<x-main-layout subtitle="daftar pengguna">

    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Pengguna</h1>


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
                    @foreach ($activeUsers as $au)
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
                                <a href="#" data-tooltip-target="tooltip-edit" data-tooltip-placement="top"
                                    role="button"
                                    class="inline-flex items-center rounded-lg bg-yellow-300 p-2 text-center text-sm font-medium text-slate-900 hover:bg-yellow-600 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" class="h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                        </path>
                                    </svg>
                                </a>
                                <div id="tooltip-edit" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm dark:bg-gray-700">
                                    Ubah
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                {{-- @detail --}}
                                <a href="#" data-tooltip-target="tooltip-info" data-tooltip-placement="top"
                                    role="button"
                                    class="inline-flex items-center rounded-lg bg-blue-500 p-2 text-center text-sm font-medium text-white hover:bg-blue-700 hover:text-red-50 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    <svg aria-hidden="true" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path clip-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <div id="tooltip-info" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm dark:bg-gray-700">
                                    Detail
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                {{-- @delete --}}
                                <a href="#" data-tooltip-target="tooltip-delete" data-tooltip-placement="top"
                                    role="button"
                                    class="inline-flex items-center rounded-lg bg-red-500 p-2 text-center text-sm font-medium text-white hover:bg-red-700 hover:text-red-50 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    <svg aria-hidden="true" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path clip-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <div id="tooltip-delete" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm dark:bg-gray-700">
                                    Hapus
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8">{{ $activeUsers->links() }}</div>

    </div>

</x-main-layout>
