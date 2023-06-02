<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdatePersonalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        if ($request->has('edit_section') && $request->edit_section === 'phone_number') {
            $request->request->set('data_edit', Str::remove('-', $request->data_edit));
        };

        if ($request->has('edit_section') && in_array($request->edit_section, ['sub_district', 'district'])) {
            $request->request->set('edit_section', 'region_id');
            $request->request->set('data_edit', (int) $request->data_edit);
        };

        // dd($request->all());

        $rule = match ($request->edit_section) {
            'full_name' => ['required', 'string', 'min:3', 'max:100'],
            'gender' => ['required', 'integer', 'in:1,0'],
            'address' => ['required', 'string', 'min:5', 'max:1000'],
            'phone_number' => ['bail', 'required', 'numeric', 'unique:users,phone_number', 'digits_between:10,13'],
            'region_id' => ['bail', 'required', 'integer'],
            default => abort(404),
        };

        $this->isValidRequest($request->only('edit_section', 'data_edit'), [
            'edit_section' => ['required', 'string', 'in:full_name,phone_number,gender,address,region_id'],
            'data_edit' => $rule,
        ]);

        $user = User::where('id', (int) $id)->firstOrFail();

        $user->update(["{$request->edit_section}" => $request->data_edit]);

        return redirect()->route('profile', ['user_id' => $id])->with('success', "Ubah " . trans('words.' . $request->edit_section) . " Berhasil.");
    }
}
