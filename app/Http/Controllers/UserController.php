<?php

namespace App\Http\Controllers;

use App\Http\Resources\SingleUserResource;
use App\Mail\UserActivationMail;
use App\Mail\UserDeleteMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $user->forceFill(['remember_token' => Str::random(10)])->update();


        Mail::to($user->email)->send(new UserActivationMail($user->full_name, $isActive, $reactivate));

        $message = ($isActive ? "aktifkan" : "nonaktifkan");

        return response()->json(["status" => "success", "message" => "Akun berhasil di" . $message]);
    }

    public function promoteAdmin($id)
    {
        $user = User::with('device')->where('id', $id)->first();

        if (is_null($user)) {
            return response()->json(["status" => "failed", "message" => "Data tidak ditemukan"], 404);
        }

        $isAdmin = !filter_var($user->is_admin, FILTER_VALIDATE_BOOLEAN);
        $user->update(['is_admin' => $isAdmin]);

        $message = ($isAdmin ? "Akun {$user->full_name} berhasil dijadikan Admin" : "Peran Admin berhasil dilepas dari akun {$user->full_name}");


        return response()->json(["status" => "success", "message" => $message]);
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

        if ((int)$id === (int) config('app.super_admin_id')) {
            return view('pages.profile-sa', compact('user'));
        }
        return view('pages.profile', compact('user'));
    }

    public function edit(Request $request, int $id)
    {
        abort_if((int)auth()->id() !== (int) $id, 403, 'Forbidden');

        $user = User::with([
            'region' => [
                'district',
                'city',
                'province'
            ],
        ])->where('id', $id)->firstOrFail();

        if ((int) auth()->id() === (int)config('app.super_admin_id') && in_array($request->type, ['full_name'])) {
            $type = $request->type;
            return view("pages.profile.personal", compact('user', 'type'));
        }

        if ($request->type === 'email') {
            return view("pages.profile.email", compact('id'));
        }

        if ($request->type === 'coords') {
            return view("pages.profile.coords", compact('id'));
        }

        if ($request->type === 'password') {
            return view("pages.profile.password", compact('id'));
        }

        if (in_array($request->type, ['full_name', 'phone_number', 'gender', 'address', 'district', 'sub_district'])) {

            abort_if((int) auth()->id() === (int) config('app.super_admin_id'), 404);

            $districts = DB::table('districts')->where('city_code', 71)->get();
            $sub_districts = DB::table('sub_districts')->where('district_code', $user?->region?->district?->code)->get();

            // override attribute
            $user['gender'] = $user->gender === 1 ? 'Laki - Laki' : "Perempuan";
            $user['district'] = $user?->region?->district?->name;
            $user['sub_district'] = $user?->region?->name;


            return view("pages.profile.personal", ["user" => $user, "type" => $request->type, 'districts' => $districts, 'sub_districts' => $sub_districts]);
        }
    }
}
