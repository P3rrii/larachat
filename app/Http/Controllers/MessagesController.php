<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message; 
use App\User;

class MessagesController extends Controller
{

    public function __construct(){
        
    }
    
    //Function that displays all the messages in the chat
    public function DisplayMessages(){
        $messages = Message::all();
        return view('chat')->with('messages',$messages);
    }

    public function StoreMessage(Request $request){
        $user = User::where('id','=',Auth::user()->id)->get()->first();

        $message = New Message;
        $message->text = $request->input('text');
        $message->user_id = Auth()->user()->id;

        $message->save();

        $fame = $user->fame;
        $fame++;

        $user->update([
            'fame'=>$fame,
        ]);
    }

    public function LoadMessagesAjax(){
        //We are also passing with the user so we can get the name of the user not only the ID.
        $messages = Message::with('user')->get();
        $active_users = User::where('is_active','=','1')->get()->all();

        return response()->json(array('data'=>$messages,'active_users'=>$active_users));
    }

    public function isActive(){
        $user = User::where('id','=', Auth::user()->id)->get()->first();
        $user->update([
            'is_active'=>1,
        ]);
    }

    public function notActive(){
        $user = User::where('id','=', Auth::user()->id)->get()->first();
        $user->update([
            'is_active'=>0,
        ]);
    }

}
