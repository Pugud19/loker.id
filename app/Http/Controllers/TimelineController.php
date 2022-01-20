<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // make timeline relation and function 
    public function __invoke(Request $request)
    {
        // whereIn('key', [2,3,4,5])
        // $statuses = Auth::user()->statuses;
        // $statuses = Status::where('user_id', Auth::user()->id)->get();
        $following = Auth::user()->follows->pluck('id');
        $statuses = Auth::user()->timeline();
        return view('timeline', compact('statuses'));
    }
}
