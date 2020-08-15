<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Message;

class User extends Authenticatable
{
    use Notifiable;

    //Mass Assignment Values.
    protected $fillable = [
        'name', 'email', 'password','fame','is_active'
    ];

    //Hidden From Arrays
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function message(){
        return $this->hasMany('App\Message');
    }
}
