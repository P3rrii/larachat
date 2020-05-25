@extends('layouts.app')

<link href="{{asset('css/chat.css')}}" rel="stylesheet"> {{-- Including the Spreadsheet for chat --}}
{{-- <script type="text/javascript" src="{{asset('js/chat.js')}}"></script> Including the JS for chat (AJAX) --}}
<script src="{{asset('js/app.js')}}"></script>


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" id="header"> Chat </div>
                <div class="panel-body" id="chatbox" >
                    <div id="allMessages">
                        @foreach($messages as $message)
                            
                            <p> <p id="name">{{$message->user->name}}  : </p> &nbsp {{$message->text}} </p>
                            <p> {{$message->created_at->format('d M h i s')}} {{-- We format the date with Day/Month Hour/Minutes/Seconds --}}
                            <hr>
                        @endforeach
                        
                    </div>
                </div>
                <div class="input-group mb-3" id="sendform">
                    <form>
                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2" display="inline" id="textinput">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="button1"> Send </button>
                      <button class="btn btn-outline-secondary" type="button" id="button2"> Refresh </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    //Now we must create an AJAX request to post data into the database.

    $(document).ready(function(){
        $('#button1').on('click',function(e){
            let text = $('#textinput').val();
            addMessage(text);
        
        });

        $('#button2').on('click',function(e){
            load();
        })

    function addMessage(text){
        $.ajax({
            method:'POST',
            url:"http://larachat.dev/store",
            data:{
                text:text
            },
        })
    }

    load = function(){
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'getajax',
            type:'POST',
            success: function(response){
                data = response.data;
                for(i=0;i<response.data.length;i++){
                    $('allMessages').alert(response.data[i].text);
                }
            }
        })
    }
});
</script>