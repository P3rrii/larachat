<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    
    //Relation to User. Message belongs to one user.
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable=['text'];
}
