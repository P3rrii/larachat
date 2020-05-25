<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message; 

class MessagesController extends Controller
{

    public function __construct(){
        
    }
    
    //Function that displays all the messages in the chat
    public function DisplayMessages(){

        $messages = Message::all();
        return view('chat')->with('messages',$messages);

        return response()->json($messages);

    }

    public function StoreMessage(Request $request){
        $message = New Message;
        $message->text = $request->input('text');
        $message->user_id = Auth()->user()->id;

        $message->save();

    }
}
