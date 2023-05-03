<x-main-layout subtitle="Login" :sidebar="false">
    <div class="flex min-h-screen items-center justify-center">
        <x-card cardTitle="Login">
            <div>
                <form action="{{ route('auth.login') }}" method="POST" class="space-y-6">
                    @csrf
                    <x-forms.input label="email" name="email" type="email" placeholder="rochmadnf@jti.id" />
                    <x-forms.input label="katasandi" name="password" type="password" placeholder="password" />

                    <x-forms.button label="Login" color="primary" />
                    <p class="text-sm font-light">Belum memiliki akun?
                        <a class="text-green-500" href="#">Daftar</a>
                    </p>
                </form>
            </div>
        </x-card>
    </div>
</x-main-layout>
