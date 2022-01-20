<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    // make post status
    public function store(StatusRequest $request){
        // $request->validate([
        //     'body' => ['required'],
        // ]);

        // Auth::user()->statuses()->create([
        //     'body' => $request->body,
        //     'identifier' => Str::random(32),
            
        // ]);

        // Auth::user()->makeStatus($request->body);


        $request->make();

        return redirect()->back();
    }

}
