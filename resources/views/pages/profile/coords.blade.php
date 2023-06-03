<x-main-layout subtitle="Ubah Koordinat">
    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Ubah Koordinat</h1>

        <div class="rounded-md bg-white px-4 py-2">
            <form id="fusUpdate" action="{{ route('profile.update.coords', ['id' => $id]) }}" method="POST"
                class="space-y-6">
                @csrf

                <div class="mb-5">
                    <div id="mapbox" class="h-[calc(100vh-250px)] rounded-md border border-green-200"></div>
                </div>
                <div class="hidden">
                    <x-forms.input name="long" placeholder="0.0" label="longitude" :readonly="true" />
                    <x-forms.input name="lat" placeholder="0.0" label="latitude" :readonly="true" />
                </div>

                <div class="flex">
                    <a id="btnBack" href="{{ route('profile', ['user_id' => $id]) }}" role="button"
                        class="mr-2 mb-2 rounded-lg border border-gray-800 px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-800">Kembali</a>
                    <button id="btnSave" type="submit"
                        class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name='scripts'>
        @vite('resources/js/edit-coords.js')
        <script>
            document.querySelector('#fusUpdate').addEventListener('submit', (e) => {
                document.querySelector('#btnSave').setAttribute('disabled', true);
                document.querySelector('#btnSave').innerHTML =
                    `<i class="fa-duotone fa-spinner-third fa-spin text-white fa-2x"></i>`;
                document.querySelector('#btnBack').setAttribute('href', 'javascript:void(0)');
            });
        </script>
    </x-slot>
</x-main-layout>
