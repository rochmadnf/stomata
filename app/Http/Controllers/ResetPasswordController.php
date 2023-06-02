<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.reset-password');
    }

    public function reset(Request $request)
    {
        $this->isValidRequest($request->only('email'), [
            'email' => ['required', 'exists:users,email'],
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($request->email));
        return back()->with('success', 'berhasil');
    }

    public function executeReset($email)
    {
        $user = User::where('email', base64_decode($email))->firstOrFail();

        $user->update([
            'password' => bcrypt('Stomata2313'),
        ]);

        return redirect()->route('auth.reset_success');
    }
}
