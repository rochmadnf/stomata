<x-main-layout subtitle="Register Success" :sidebar="false">
    <div class="flex min-h-screen items-center justify-center bg-leaf-green-100">
        <x-card size="max-w-xl">
            <div class="flex flex-col items-center gap-4">
                <div
                    class="group mb-4 flex h-28 w-28 cursor-pointer items-center justify-center rounded-full border-[3px] border-green-400 bg-green-50 shadow-md shadow-green-600 hover:border-green-50 hover:bg-green-600">
                    <i class="fa-light fa-face-party text-6xl text-green-400 group-hover:text-green-50"></i>
                </div>
                <h4 class="mb-4 text-3xl font-bold text-slate-600">Pendaftaran Akun Berhasil</h4>

                <div class="mb-4 flex flex-col gap-4 rounded-lg bg-teal-50 px-4 py-6 text-gray-900">
                    <p>
                        Selamat, akun kamu telah terdaftar pada sistem. Saat ini menunggu untuk divalidasi oleh
                        <strong>Admin</strong>
                    </p>

                    <p>Sistem akan memberitahu melalui <strong>email</strong>, apabila akun kamu telah disetujui oleh
                        <strong>Admin</strong>.
                    </p>
                </div>

                <a href="{{ route('auth.ilogin') }}"
                    class="w-1/4 rounded-md bg-green-400 p-2 text-center text-lg font-medium text-white hover:bg-green-300">Login</a>
            </div>
        </x-card>
    </div>
</x-main-layout>
