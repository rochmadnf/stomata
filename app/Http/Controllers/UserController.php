<?php

namespace App\Http\Controllers;

use App\Mail\UserDeleteMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(int $activeUser = 1)
    {
        $users = User::where('is_active', $activeUser)->whereNotIn('id', [auth()->id()])->paginate();
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
        $user = User::where('id', $id)->firstOrFail();
        dd($user->is_active);
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
}
