<?php

namespace App\Traits;


use App\Models\User;

 trait Following
 {

    // method follows
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }
    // method show followers
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }
    public function follow(User $user){
        return $this->follows()->save($user);
    }
    // akhir method follow
    public function hasFollow(User $user){
        return $this->follows()->where('following_user_id', $user->id)->first();
    }
    // unfollow
    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }
 }