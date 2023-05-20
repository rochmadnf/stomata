<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        $districts = DB::table('districts')->where('city_code', 71)->get();
        return view('auth.register', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->request->set('phone_number', Str::remove('-', $request->phone_number));

        $this->isValidRequest(
            $request->except('_token'),
            [
                'full_name'    => ['bail', 'required', 'string', 'min:3'],
                'phone_number' => ['bail', 'required', 'numeric', 'unique:users'],
                'address'      => ['bail', 'required', 'string', 'min:5'],
                'gender'       => ['bail', 'required', 'in:1,0'],
                'district'     => ['bail', 'required', 'integer'],
                'sub_district' => ['bail', 'required', 'integer'],

                'email'    => ['bail', 'required', 'email', 'unique:users'],
                'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
            ],
            'api'
        );

        // format attribute
        $request->request->set('password', bcrypt($request->password));
        $request->merge(['region_id' => $request->sub_district]);

        // create user record
        User::create($request->except(['district', 'sub_district', '_token', 'password_confirmation']));

        return response()->json(["status" => "success", "message" => "Pendaftaran akun telah berhasil."]);
    }

    public function congrats()
    {
        return view('pages.register-success');
    }
}
