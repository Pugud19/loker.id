<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'identifier', 'bagian', 'tempat' ,'gaji', 'pengalaman'];

    public function user(){
        return $this->belongTo(User::class);
    }
}
