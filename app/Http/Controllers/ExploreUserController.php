<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('users.index', [
            'users' => User::simplePaginate(30),
        ]);
    }
}
