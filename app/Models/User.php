<?php

namespace App\Models;

use App\Traits\Following;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Following;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = 100){
        $default = "mm";
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }
    // method status
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
    // akhir method status
    
    public function makeStatus($string){
        $this->statuses()->create([
            'body'=>$string,
            'identifier' => Str::slug($this->id . Str::random(32)),
        ]);
    } 

    // relation Lokers
    public function lokers(){
        return $this->hasMany(Loker::class);
    }
   

    // relation status
    public function timeline(){
        $following = $this->follows->pluck('id');
        return Status::whereIn('user_id', $following)
                    ->orWhere('user_id', $this->id)
                    ->latest()
                    ->get();
    }
    // akhir realation status
}
