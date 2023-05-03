<x-main-layout subtitle="Daftar" :sidebar="false">
    <div class="flex min-h-screen items-center justify-center">
        <x-card cardTitle="Daftar" size="max-w-2xl">

            <p class="text-sm font-light">Sudah memiliki akun?
                <a class="text-green-500" href="{{ route('auth.ilogin') }}">Login</a>
            </p>
        </x-card>
    </div>
</x-main-layout>
