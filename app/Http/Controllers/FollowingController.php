<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{

        // method to show user following and followers
    public function index(User $user, $following){

        // conditional simple if
        // if($following == "following"){
        //     $follows = $user->follows;
        // } 
        // if($following == "follower"){
        //     $follows = $user->followers;
        // }

        // Ternary operator
        // $follows = $following == "following" ? $user->follows : $user->followers;
        if($following !== "following" && $following !== "follower"){
            return redirect(route('profile', $user->username));
        }
        return view('users.following', [
            'user' => $user,
            'follows' => $following == "following" ? $user->follows : $user->followers,
        ]);
    }
    // follow and unfollow method
    public function store(Request $request, User $user){
        // if(Auth::user()->hasFollow($user)){
        //     Auth::User()->unfollow($user);
        // }else {
        //     Auth::User()->follow($user);
        // }

        Auth::user()->hasFollow($user) ? Auth::User()->unfollow($user) : Auth::User()->follow($user);
        
        return back()->with("success", "your are follow the user");
    }
    // public function following(User $user){

        
    //     return view('users.following', [
    //         'following' => $user->follows,
    //         'user' => $user,
    //     ]);
    // } 
    // public function follower(User $user){
    //     return view('users.following', [
    //         'following' => $user->followers,
    //         'user' => $user,
    //     ]);
    // } 
}
