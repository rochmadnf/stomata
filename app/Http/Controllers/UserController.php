<?php

namespace App\Http\Controllers;

use App\Mail\UserActivationMail;
use App\Mail\UserDeleteMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(int $activeUser = 1)
    {
        $users = User::where('is_active', $activeUser)->whereNotIn('id', [auth()->id(), config('app.super_admin_id')])->paginate();
        if (!filter_var($activeUser, FILTER_VALIDATE_BOOLEAN)) {
            return $users;
        }

        return view('pages.users', compact('users'));
    }

    public function indexNon()
    {
        $users = $this->index(0);

        return view("pages.users", compact('users'));
    }

    public function activation($id)
    {
        $user = User::with('device')->where('id', $id)->firstOrFail();

        if (is_null($user->device)) {
            $user->device()->create([
                'token' => Str::random(10) . ":" . Str::random(10),
                'name' => "STM-" . Carbon::now()->setTimezone('Asia/Makassar')->format('YmdHis'),
            ]);
        }

        $isActive = !filter_var($user->is_active, FILTER_VALIDATE_BOOLEAN);
        $reactivate = $isActive && !is_null($user->device);

        $user->update(['is_active' => $isActive]);


        Mail::to($user->email)->send(new UserActivationMail($user->full_name, $isActive, $reactivate));

        $message = ($isActive ? "aktifkan" : "nonaktifkan");

        return response()->json(["status" => "success", "message" => "Akun berhasil di" . $message]);
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if (is_null($user)) {
            return response()->json(["status" => "failed", "message" => "Pengguna tidak ditemukan."], 404);
        }

        $user->delete();
        Mail::to($user->email)->send(new UserDeleteMail($user->full_name, $user->email));

        return response()->json(["status" => "success", "message" => "Pengguna berhasil dihapus."]);
    }

    public function getCoords()
    {
        return response()->json(
            User::with(['device', 'device.lastDeviceData'])
                ->where('is_active', 1)
                ->whereNot('id', config('app.super_admin_id'))->get()
        );
    }

    public function show(int $id)
    {
        if (auth()->id() !== $id && !auth()->user()->is_admin) abort(403);
        $user = User::with([
            'region' => [
                'district',
                'city',
                'province'
            ],
            'device'
        ])->where('id', $id)->firstOrFail();

        return view('pages.profile', compact('user'));
    }
}
