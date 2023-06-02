<x-main-layout subtitle="akun">
    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Akun</h1>

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
                            <td class="px-6 py-4">
                                <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=full_name"
                                    class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Email
                            </th>
                            <td class="px-6 py-4">
                                {{ $user?->email }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=email"
                                    class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Katasandi
                            </th>
                            <td class="px-6 py-4">
                                ********
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('profile.edit', ['user_id' => $user?->id]) }}?type=password"
                                    class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-main-layout>
