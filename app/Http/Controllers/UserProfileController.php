<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;


class UserProfileController extends Controller
{
    public function showProfile(Request $request){
        $user = User::findOrFail($request->user);
        return view('profile', compact(['user']));
    }

    public function updateProfile(){

    }

}
