<x-main-layout subtitle="Daftar" :sidebar="false">
    <div class="flex min-h-screen items-center justify-center">
        <x-card cardTitle="Daftar" size="max-w-2xl">
            <div>
                <form action="{{ route('auth.register') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="mb-5 grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="province" class="mb-2 block text-sm font-medium">Provinsi</label>
                            <select id="province" name="province"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option value="72" selected>Sulawesi Tengah</option>
                            </select>
                        </div>
                        <div>
                            <label for="city" class="mb-2 block text-sm font-medium">Kota/Kabupaten</label>
                            <select id="city" name="city"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option value="71" selected>Kota Palu</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5 grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="district" class="mb-2 block text-sm font-medium">Kecamatan</label>
                            <select id="district" name="district"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option disabled selected value="false">--Pilih Kecamatan--</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->code }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="sub_district" class="mb-2 block text-sm font-medium">Kelurahan/Desa</label>
                            <select id="sub_district" name="sub_district"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option disabled selected value="false">--Pilih Kelurahan/Desa--</option>
                            </select>
                        </div>
                    </div>

                    <x-forms.button label="Daftar" color="primary" />
                </form>
            </div>

            <p class="text-sm font-light">Sudah memiliki akun?
                <a class="text-green-500" href="{{ route('auth.ilogin') }}">Login</a>
            </p>
        </x-card>
    </div>

    <x-slot name='scripts'>
        @vite('resources/js/pages/register.js')
    </x-slot>
</x-main-layout>
