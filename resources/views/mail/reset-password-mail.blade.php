<x-mail::message>
# Hai.

Kamu telah melakukan permintaan reset katasandi. Silakan klik tombol dibawah ini

<x-mail::button :$url>
Reset Katasandi
</x-mail::button>

Jika tombol diatas tidak berfungsi, silakan klik tautan dibawah ini.
<a href="{{ $url }}">{{ $url }}</a>

<div style="font-size: 0.725rem; margin: 2rem auto; width: fit-content; color: #FFF; background-color: #F87171; padding: 1rem; border-radius: 15px; text-align: center;">
Jika kamu tidak pernah melakukan permintaan reset katasandi, abaikan email ini.
</div>

Salam,<br>
Rochmad Nurul Fahmi @ {{ config('app.name') }}
</x-mail::message>
