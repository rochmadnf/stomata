<x-main-layout subtitle="akun">

    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Akun</h1>

        <div class="mt-4">
            <div class="flex flex-col gap-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <input class="hidden" id="inDeviceId" type="text" value="{{ $user->device->id }}">
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
                                    {{ $user->device->created_at->translatedFormat('l, d F Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="w-fit rounded-md bg-green-400 px-4 py-2 font-semibold text-white">Histori Data</h4>
                <div id="gridjsWrapper"></div>
            </div>

        </div>
    </div>

    <x-slot name='scripts'>
        @vite('resources/js/pages/profile.js')
    </x-slot>

</x-main-layout>
