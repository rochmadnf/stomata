<x-main-layout subtitle="Daftar" :sidebar="false">
    <div class="flex min-h-screen items-center justify-center py-24 bg-leaf-green-200">
        <x-card id="registerCard" cardTitle="Daftar" size="max-w-3xl">
            <div class="mt-8">
                <form action="{{ route('auth.register') }}" method="POST" id="regisForm">
                    @csrf
                    <div id="sUserData">


                        <div class="grid gap-6 md:grid-cols-2">
                            <x-forms.input name="full_name" label="Nama Lengkap" />
                            <x-forms.input name="phone_number" label="No HP/WA" type="tel"
                                placeholder="08xx-xxxx-xxxx" />
                        </div>

                        <x-forms.select name="gender" label="Jenis Kelamin">
                            <x-slot name="options">
                                @foreach ([['value' => 1, 'name' => 'Laki - Laki'], ['value' => 0, 'name' => 'Perempuan']] as $gen)
                                    <option value="{{ $gen['value'] }}">{{ $gen['name'] }}</option>
                                @endforeach
                            </x-slot>
                        </x-forms.select>

                        <x-forms.textarea name="address" label="Alamat" placeholder="tulis alamatmu disini..." />

                        <div class="grid gap-6 md:grid-cols-2">
                            <x-forms.select name="province" label="Provinsi" initOptVal="72"
                                initOptLabel="Sulawesi Tengah" />
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
                    </div>


                    <div id="sAccount" class="hidden">
                        <x-forms.input label="email" name="email" type="email" placeholder="rochmadnf@jti.id" />
                        <x-forms.input label="katasandi" name="password" type="password" placeholder="password" />
                        <x-forms.input label="konfirmasi katasandi" name="password_confirmation" type="password"
                            placeholder="password" />
                    </div>

                    <div class="mb-5 flex gap-6 sm:gap-10 md:gap-16">
                        <x-forms.button class="invisible" id="prev" label="Kembali" color="dark"
                            type="button" />
                        <x-forms.button class="visible" id="next" label="Lanjut" color="dark" type="button" />
                    </div>
                    <x-forms.button class="hidden" label="Daftar" color="primary" />
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
