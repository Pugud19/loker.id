<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\JobRequest;


class JobController extends Controller
{
    public function store(JobRequest $request){
       

        Auth::user()->lokers()->create([
            'identifier' => Str::random(31),
            'name' => $request->name,
            'bagian' => $request->bagian,
            'tempat' => $request->tempat,
            'gaji' => $request->gaji,
            'pengalaman' => $request->pengalaman,
        ]);

        return redirect()->back();
    }
}
