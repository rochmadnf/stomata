<x-main-layout subtitle="landing" :sidebar="false">
    <div class="min-h-screen bg-green-50 bg-leaf-green-400/10">
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56">
                <div class="mb-8 flex justify-center">
                    <div class="relative cursor-pointer rounded-full bg-white px-3 py-1 text-sm leading-6 text-gray-900">
                        Rochmad Nurul Fahmi @ F55116037
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">STOMATA</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-900">Aplikasi untuk memudahkan kamu dalam memantau
                        kapasitas sampah milikmu.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('auth.iregister') }}"
                            class="rounded-md bg-green-400 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-700">Daftar
                            Sekarang</a>
                        <a href="{{ route('auth.ilogin') }}" class="text-sm font-semibold leading-6 text-gray-900">Login
                            <spanaria-hidden="true">→</spanaria-hidden=>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
