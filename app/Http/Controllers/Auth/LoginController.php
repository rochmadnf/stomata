<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (!is_null(auth()->id())) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function logIn(Request $request)
    {
        $this->isValidRequest($request->all(), [
            "email" => ['required', 'email'],
            "password" => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            return back()->withErrors(['erlogin' => 'Email atau Katasandi keliru.']);
        }

        if (!filter_var($user->is_active, FILTER_VALIDATE_BOOLEAN)) {
            return back()->withErrors(['erlogin' => 'Akun kamu belum aktif.']);
        };

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['erlogin' => 'Email atau Katasandi keliru.']);
        };

        session()->put('username', auth()->user()->full_name);

        return redirect()->route('dashboard');
    }
}
