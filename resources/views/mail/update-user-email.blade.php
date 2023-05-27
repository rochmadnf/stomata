<x-mail::message>
# {{ $name }}

@if ($is_old)
Selamat, kamu telah berhasil mengubah email kamu.

Jika kamu tidak pernah melakukan pengubahan email, silakan tekan tombol dibawah ini untuk membatalkan perubahan.
<x-mail::button url="{{route('profile.rollback.email', ['user_id' => $id])}}?email={{ $email }}">
Batalkan
</x-mail::button>
@else
Selamat, kamu telah berhasil mengubah email kamu.
@endif


Salam,<br>
Rochmad Nurul Fahmi @ {{ config('app.name') }}
</x-mail::message>
