<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateCoordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $user = User::where('id', (int) $id)->first();
        $user->update(['long' => $request->long, 'lat' => $request->lat]);

        return redirect()->route('profile', ['user_id' => $id])->with('success', "Ubah Koordinat Berhasil.");
    }
}
