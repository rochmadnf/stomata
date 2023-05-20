<x-mail::message>
# Halo, {{ $name }}

@if($isActive && !$reactivate)

Selamat, Pendaftaran **Akun** kamu telah disetujui oleh **Admin**

Silakan login ke aplikasi dengan menekan tombol berikut.

<x-mail::button :url="route('auth.ilogin')">
Login
</x-mail::button>

@elseif($reactivate)
Selamat, **Akun** kamu telah berhasil diaktifkan kembali.

Silakan login ke aplikasi dengan menekan tombol berikut.

<x-mail::button :url="route('auth.ilogin')">
Login
</x-mail::button>

@else 

Oops!, **Akun** kamu terindikasi melakukan pelanggaran pedoman aplikasi. Saat ini **akun** kamu telah di nonaktifkan.

Jika tidak pernah melakukan pelanggaran, silakan hubungi pihak yang berwenang.
@endif


Salam,<br>
Rochmad Nurul Fahmi @ {{ config('app.name') }}
</x-mail::message>
