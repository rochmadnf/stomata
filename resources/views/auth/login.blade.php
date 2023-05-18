<x-main-layout subtitle="Login" :sidebar="false">
    <div class="flex min-h-screen items-center justify-center bg-leaf-green-100">
        <x-card cardTitle="Login" size="max-w-sm">
            <div>
                <form action="{{ route('auth.login') }}" method="POST" class="space-y-6">
                    @if ($errors->has('erlogin'))
                        <div id="alert-2" class="my-4 flex rounded-lg bg-red-500 p-4 text-red-50" role="alert">
                            <div class="ml-3 text-sm font-medium">
                                {{ $errors->first('erlogin') }}
                            </div>
                            <button type="button"
                                class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-red-500 p-1.5 text-red-50 hover:bg-red-50 hover:text-red-500 focus:ring-2 focus:ring-red-400 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-2" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    @csrf
                    <x-forms.input label="email" name="email" type="email" placeholder="rochmadnf@jti.id" />
                    <x-forms.input label="katasandi" name="password" type="password" placeholder="password" />

                    <x-forms.button label="Login" color="primary" />
                </form>
            </div>

            <p class="text-sm font-light">Belum memiliki akun?
                <a class="text-green-500" href="{{ route('auth.iregister') }}">Daftar</a>
            </p>
        </x-card>
    </div>
</x-main-layout>
