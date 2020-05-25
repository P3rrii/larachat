@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Chat </div>
                <div class="panel-body" id="chatbox">
                    @if(Auth()->check())
                        <a href="/chat"> Go To Chat </a>
                    @else 
                        <p> You Must Be Logged In To Access The Chat </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
