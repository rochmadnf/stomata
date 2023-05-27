<?php

namespace App\Http\Controllers;

use App\Mail\UpdateUserEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UpdateEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        abort_if((int)auth()->id() !== (int) $id, 403, 'Forbidden');

        $this->isValidRequest($request->all(), [
            "email" => ["required", "email", "unique:users,email"]
        ]);

        $user = User::where('id', $id)->firstOrFail();

        $oldMail = $user->email;

        $user->update(["email" => $request->email]);

        // kirim email
        Mail::to($oldMail)->send(new UpdateUserEmail(true, $oldMail, $user->full_name, $id));
        Mail::to($user->email)->send(new UpdateUserEmail(false, $user->email, $user->full_name, $id));

        return redirect()->route('profile', ['user_id' => $id])->with('success', "Ubah Email Berhasil.");
    }

    public function rollback(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->update(['email' => $request->email]);

        return redirect()->route('profile', ['user_id' =>  $id])->with('success', 'Email berhasil diubah kembali');
    }
}
