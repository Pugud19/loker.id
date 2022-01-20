<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit(){
        return view('users.edit');
    }
    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => ['string', 'min:3', 'max:192', 'required'],
            'email' => ['email', 'string', 'min:3', 'max:192', 'required'],
            'username' => ['required', 'alpha_num', 'unique:users,username,' . auth()->id()],
        ]);

        auth()->user()->update($attr);
        // return back()->with('message', 'Your profile has been updated');
        return redirect()
                ->route('profile', auth()->user()->username)
                ->with('message', 'Your profile has been updated');

    }
}
