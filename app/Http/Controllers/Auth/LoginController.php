<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function logIn(Request $request)
    {
        $this->isValidRequest($request->all(), [
            "email" => ['required', 'email'],
            "password" => ['required', 'string', 'min:8'],
        ]);
    }
}
