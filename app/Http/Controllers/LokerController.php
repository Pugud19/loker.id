<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loker;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $lokers = Loker::where('user_id', Auth::user()->id)->get();
        return view('loker', compact('lokers'));
    }
}
