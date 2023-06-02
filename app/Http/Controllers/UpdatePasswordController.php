<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $this->isValidRequest($request->only('old_password', 'password', 'password_confirmation'), [
            'old_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'string', 'min:8'],
        ]);

        $user = User::where('id', $id)->firstOrFail();
        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->route('profile', ['user_id' => $id])->with('success', "Ubah Katasandi Berhasil.");
    }
}
