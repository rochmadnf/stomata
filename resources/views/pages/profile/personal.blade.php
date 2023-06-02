<x-main-layout subtitle="{{ ucwords('Ubah ' . trans('words.' . $type)) }}">
    <div class="rounded-lg p-4">
        <h1 class="mb-4 text-2xl font-bold text-slate-800 lg:mb-8">{{ ucwords('Ubah ' . trans('words.' . $type)) }}</h1>

        <div class="rounded-md bg-white px-4 py-2">
            <div class="mb-4">
                <span
                    class="mr-2 select-none rounded border border-yellow-300 bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-gray-700 dark:text-yellow-300">
                    {{ $user[$type] }}
                </span>
            </div>
            <form id="fusUpdate" action="{{ route('profile.update.personal', ['id' => $user->id]) }}" method="POST"
                class="space-y-6">
                @csrf
                <input type="hidden" name="edit_section" value="{{ $type }}">


                {{-- Nama Lengkap dan Alamat --}}
                @if (in_array($type, ['full_name', 'address']))
                    <x-forms.input label="{{ ucwords(trans('words.' . $type)) }}" name="data_edit" type="text"
                        :required="true" />
                @endif

                {{-- Nomor HP --}}
                @if (in_array($type, ['phone_number']))
                    <x-forms.input label="{{ ucwords(trans('words.' . $type)) }}" name="data_edit" type="tel"
                        :required="true" placeholder="XXXX-XXXX-XXXX" />
                @endif

                {{-- Jenis Kelamin --}}
                @if (in_array($type, ['gender']))
                    <x-forms.select name="data_edit" label="Jenis Kelamin">
                        <x-slot name="options">
                            @foreach ([['value' => 1, 'name' => 'Laki - Laki'], ['value' => 0, 'name' => 'Perempuan']] as $gen)
                                <option value="{{ $gen['value'] }}" @selected($gen['name'] == $user->gender)>
                                    {{ $gen['name'] }}</option>
                            @endforeach
                        </x-slot>
                    </x-forms.select>

                @endif


                @if (in_array($type, ['district', 'sub_district']))
                    <x-forms.select name="district" label="Kecamatan" :disabled="true">
                        <x-slot name="options">
                            @foreach ($districts as $district)
                                <option value="{{ $district->code }}" @selected($district->name === $user->district)>
                                    {{ $district->name }}</option>
                            @endforeach
                        </x-slot>
                    </x-forms.select>

                    <hr>

                    <div class="mb-4">
                        <span
                            class="mr-2 select-none rounded border border-yellow-300 bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-gray-700 dark:text-yellow-300">
                            {{ $user->sub_district }}
                        </span>
                    </div>

                    <x-forms.select name="data_edit" label="Kelurahan/Desa" :required="true">
                        <x-slot name="options">
                            @foreach ($sub_districts as $sub_district)
                                <option value="{{ $sub_district->id }}" @selected($sub_district->name === $user->sub_district)>
                                    {{ $sub_district->name }}</option>
                            @endforeach
                        </x-slot>
                    </x-forms.select>
                @endif


                <div class="flex">
                    <a id="btnBack" href="{{ route('profile', ['user_id' => $user->id]) }}" role="button"
                        class="mr-2 mb-2 rounded-lg border border-gray-800 px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-800">Kembali</a>
                    <button id="btnSave" type="submit"
                        class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name='scripts'>
        @if (in_array($type, ['phone_number', 'sub_district', 'district']))
            @vite('resources/js/pages/personal.js')
        @endif

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
