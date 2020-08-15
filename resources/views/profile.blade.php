@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-4 float-left">
            <div class="panel panel-default">
                <div class="panel-heading" id="header"> {{$user->name}} 's Profile  </div>
                    <div class="panel-body" id="chatbox" >
                        <div> This is a profile </div>
                </div>
            </div>
        </div>
    </div>
@endsection