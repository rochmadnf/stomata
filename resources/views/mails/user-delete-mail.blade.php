<x-mail::message>
# {{ $name }}

Oh sayang sekali, akun kamu telah dihapus pada sistem, kamu tidak dapat lagi menggunakan aplikasi dengan akun ini.

<x-mail::table>
| Nama Lengkap  | Email |
| ------------- |:-----:|
| {{ $name }}   | {{ $email }} |
</x-mail::table>

Silakan klik tombol dibawah ini untuk mendaftar lagi.
<x-mail::button url="{{ env('APP_URL') }}/register">
Daftar Kembali
</x-mail::button>

Salam,<br>
Rochmad Nurul Fahmi @ {{ config('app.name') }}
</x-mail::message>
