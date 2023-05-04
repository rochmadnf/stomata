<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        $districts = DB::table('districts')->where('city_code', 71)->get();
        return view('auth.register', compact('districts'));
    }

    public function store(Request $request)
    {
        $this->isValidRequest($request->except('_token'), [
            'district'     => ['required'],
            'sub_district' => ['required'],
        ], 'api');

        return response()->json($request->all());
    }
}
