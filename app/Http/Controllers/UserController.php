<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(int $activeUser = 1)
    {
        $users = User::where('is_active', $activeUser)->paginate();
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
}
