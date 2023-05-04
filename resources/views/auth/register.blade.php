<x-main-layout subtitle="Daftar" :sidebar="false">
    <div class="flex min-h-screen items-center justify-center py-24 bg-leaf-green-200">
        <x-card cardTitle="Daftar" size="max-w-3xl">
            <div class="mt-8">
                <form action="{{ route('auth.register') }}" method="POST" id="regisForm">
                    @csrf
                    <div class="grid gap-6 md:grid-cols-2">
                        <x-forms.select name="province" label="Provinsi" initOptVal="72" initOptLabel="Sulawesi Tengah" />
                        <x-forms.select name="city" label="Kota/Kabupaten" initOptVal="71"
                            initOptLabel="Kota Palu" />
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <x-forms.select name="district" label="Kecamatan" :disabled="true">
                            <x-slot name="options">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->code }}">{{ $district->name }}</option>
                                @endforeach
                            </x-slot>
                        </x-forms.select>
                        <x-forms.select name="sub_district" label="Kelurahan/Desa" :disabled="true" />
                    </div>

                    <div class="mb-5">
                        <label class="mb-2 block text-sm font-medium">Lokasi</label>
                        <div id="mapbox" class="h-72 rounded-md border border-green-200"></div>
                    </div>

                    <div class="hidden">
                        <x-forms.input name="long" placeholder="0.0" label="longitude" :readonly="true" />
                        <x-forms.input name="lat" placeholder="0.0" label="latitude" :readonly="true" />
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
