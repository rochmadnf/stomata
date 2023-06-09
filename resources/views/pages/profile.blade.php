<x-main-layout subtitle="akun">
    @if (session()->has('success'))
        <div id="alert-2" class="my-4 flex rounded-lg bg-green-400 p-4 text-green-50" role="alert">
            <div class="ml-3 text-sm font-medium">
                {{ session()->get('success') }}
            </div>
            <button type="button"
                class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-green-400 p-1.5 text-green-50 hover:bg-green-50 hover:text-green-400 focus:ring-2 focus:ring-green-400 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif
    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Akun @if (auth()->user()->is_admin && auth()->id() !== $user->id)
                "{{ ucwords($user->full_name) }}"
            @endif
        </h1>

        <div class="mb-4">
            <h4 class="mb-2 w-fit rounded-md bg-green-400 px-4 py-2 font-semibold text-white">Info Pengguna</h4>
            <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Nama Lengkap
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->full_name }}
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=full_name"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif

                        </tr>
                        @if (auth()->user()->is_admin)
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Status
                                </th>
                                <td class="px-6 py-4" colspan="2">
                                    {!! $user?->is_active
                                        ? '<span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Aktif</span>'
                                        : '<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Tidak Aktif</span>' !!}
                                </td>
                            </tr>
                        @endif
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Nomor HP
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->phone_number }}
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=phone_number"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif

                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Jenis Kelamin
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->gender ? 'Laki-Laki' : 'Perempuan' }}
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=gender"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Alamat
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->address }}
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=address"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Provinsi
                            </th>
                            <td class="px-6 py-4" colspan="2">
                                {{ $user?->region?->province?->name }}
                            </td>
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Kota/Kabupaten
                            </th>
                            <td class="px-6 py-4" colspan="2">
                                {{ $user?->region?->city?->name }}
                            </td>
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Kecamatan
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->region?->district?->name }}
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=district"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Kelurahan/Desa
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->region?->name }}
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=sub_district"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <h4 class="mb-2 w-fit rounded-md bg-green-400 px-4 py-2 font-semibold text-white">Info Kredensial</h4>
            <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Email
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->email }}
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=email"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Katasandi
                            </th>
                            <td class="px-6 py-4">
                                ********
                            </td>
                            @if (auth()->id() === $user?->id)
                                <td class="px-6 py-4">
                                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=password"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <div class="flex gap-x-4">
                <h4 class="mb-2 w-fit rounded-md bg-green-400 px-4 py-2 font-semibold text-white">Info Titik Koordinat
                </h4>
                @if (auth()->id() === $user?->id)
                    <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=coords"
                        class="group relative mb-2 mr-2 inline-flex items-center justify-center overflow-hidden rounded-lg bg-gradient-to-br from-cyan-500 to-blue-500 p-0.5 text-sm font-medium text-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-200 group-hover:from-cyan-500 group-hover:to-blue-500 dark:text-white dark:focus:ring-cyan-800">
                        <span
                            class="relative rounded-md bg-white px-5 py-2.5 transition-all duration-75 ease-in group-hover:bg-opacity-0 dark:bg-gray-900">
                            Edit
                        </span>
                    </a>
                @endif
            </div>
            <span id="coordinateXX" class="hidden" data-long="{{ $user->long }}"
                data-lat="{{ $user->lat }}"></span>
            <div id="mapboxWrapper" class="h-[calc(100vh-200px)] rounded-lg shadow-md shadow-gray-400"></div>
        </div>

        <div class="my-10 w-full border-2 border-dashed border-gray-300"></div>

        @if (auth()->user()->is_admin && (int) $user->id !== (int) config('app.super_admin_id'))
            <div class="mb-4 scroll-mt-4" id="deviceInfo">
                <h4 class="mb-2 w-fit rounded-md bg-green-400 px-4 py-2 font-semibold text-white">Tempat Sampah
                </h4>
                <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg">
                    <input class="hidden" id="inDeviceId" type="text" value="{{ $user?->device?->id }}">
                    <span class="hidden" data-user="{{ $user?->id }}"></span>

                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    ID Perangkat
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user?->device?->token }}
                                </td>
                            </tr>
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Nama Perangkat
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user?->device?->name }}
                                </td>
                            </tr>
                            <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Terdaftar
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user?->device?->created_at?->setTimezone('Asia/Makassar')->translatedFormat('l, d F Y') }}
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
                                        {{ $user?->device?->lastDeviceData?->created_at->setTimezone('Asia/Makassar')->translatedFormat('l, d F Y H:i:s') ?? 'Belum Tersedia' }}
                                    </td>
                                </tr>
                                <tr class="bg-white">
                                    <th scope="row"
                                        class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                        Terisi
                                    </th>
                                    <td class="px-4 py-2" id="colFill">
                                        {{ $user?->device?->lastDeviceData?->filled . '%' ?? 'Belum Tersedia' }}
                                    </td>
                                </tr>
                                <tr class="bg-white">
                                    <th scope="row"
                                        class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                        Kosong
                                    </th>
                                    <td class="px-4 py-2" id="colUnfill">
                                        {{ $user?->device?->lastDeviceData?->unfilled . '%' ?? 'Belum Tersedia' }}
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

            </div>
        @endif
    </div>

    <x-slot name='scripts'>
        @if ((int) $user->id !== (int) config('app.super_admin_id'))
            @vite('resources/js/pages/profile.js')
        @endif
    </x-slot>

</x-main-layout>
