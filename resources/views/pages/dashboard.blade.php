<x-main-layout subtitle="dashboard">

    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Dashboard</h1>

        @if (auth()->user()->is_admin)
            <div id="mapbox" class="min-h-screen rounded-md"></div>
        @else
            <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg">
                <input class="hidden" id="inDeviceId" type="text" value="{{ $user->device->id }}">
                <span class="hidden" data-user="{{ $user->id }}"></span>

                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                    <caption class="bg-green-400 p-5 text-left text-lg font-semibold text-white">
                        Tempat Sampah
                        <p class="mt-1 text-sm text-gray-50">
                            Informasi mengenai data tempat sampah pengguna yang terdaftar dan aktif.
                        </p>
                    </caption>
                    <tbody>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                ID Perangkat
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->device->token }}
                            </td>
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Nama Perangkat
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->device->name }}
                            </td>
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Terdaftar
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->device->created_at->setTimezone('Asia/Makassar')->translatedFormat('l, d F Y') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-4">
                <h4 class="inline-flex w-fit gap-4 rounded-md bg-green-400 px-4 py-2 font-semibold text-white">
                    Data Terkini
                    <div class="relative">
                        <span class="absolute z-10 h-3 w-3 rounded-full bg-blue-600"></span>
                        <span class="flex h-3 w-3 animate-ping rounded-full bg-blue-800"></span>
                    </div>
                </h4>

                <div
                    class="mt-2 max-w-md rounded-md border border-green-300 bg-white p-4 shadow shadow-green-200 md:max-w-sm">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white">
                                <th scope="row"
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Waktu
                                </th>
                                <td class="px-4 py-2" id="colTime">
                                    {{ $user->device->lastDeviceData->created_at->setTimezone('Asia/Makassar')->translatedFormat('l, d F Y H:i:s') }}
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <th scope="row"
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Terisi
                                </th>
                                <td class="px-4 py-2" id="colFill">
                                    {{ $user->device->lastDeviceData->filled . '%' }}
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <th scope="row"
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Kosong
                                </th>
                                <td class="px-4 py-2" id="colUnfill">
                                    {{ $user->device->lastDeviceData->unfilled . '%' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div>
                <h4 class="w-fit rounded-md bg-green-400 px-4 py-2 font-semibold text-white">Histori Data</h4>
                <div class="mt-2" id="gridjsWrapper"></div>
            </div>
        @endif
    </div>

    <x-slot name='scripts'>
        @if (auth()->user()->is_admin)
            @vite('resources/js/pages/dashboard-admin.js')
        @else
            @vite('resources/js/pages/profile.js')
        @endif
    </x-slot>

</x-main-layout>
