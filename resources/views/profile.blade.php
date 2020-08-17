@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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