@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 float-left">
            <div class="panel panel-default">
            <div class="panel-heading" id="header"> {{$user->name}} 's Profile  </div>
                <div class="panel-body" id="chatbox" >
                    <div> Name: {{$user->name}} </div>
                    <div> Email: {{$user->email}} </div>
                    <div> Fame: {{$user->fame}} </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection