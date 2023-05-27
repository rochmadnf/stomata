<x-main-layout subtitle="ubah email">
    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">Ubah Email</h1>

        <div class="rounded-md bg-white px-4 py-2">
            <form action="{{ route('profile.update.email', ['id' => $id]) }}" method="POST" class="space-y-6">
                @csrf
                <x-forms.input label="email baru" name="email" type="email" placeholder="rochmadnf@jti.id"
                    :required="true" />
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
        <script>
            document.querySelector('#btnSave').addEventListener('click', (e) => {
                e.target.setAttribute('disabled', true);
                e.target.innerHTML = `<i class="fa-duotone fa-spinner-third fa-spin text-white fa-2x"></i>`;
                document.querySelector('#btnBack').setAttribute('href', 'javascript:void(0)');
            });
        </script>
    </x-slot>
</x-main-layout>
