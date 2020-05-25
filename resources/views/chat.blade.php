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
                        {{-- @foreach($messages as $message)
                            
                            <p> <p id="name">{{$message->user->name}}  : </p> &nbsp {{$message->text}} </p>
                            <p> {{$message->created_at->format('d M h i s')}} {{-- We format the date with Day/Month Hour/Minutes/Seconds --}}
                           {{-- <hr>
                        @endforeach --}}
                        
                    </div>
                </div>
                <div class="input-group mb-3" id="sendform">
                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2" display="inline" id="textinput">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="button1"> Send </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    //Now we must create an AJAX request to post data into the database.
    var ScrollToBottom = true;

    //When the document is ready we start
    $(document).ready(function(){
        function GoToBottom(id){
   	        var element = document.getElementById(id);
   	        element.scrollTop = element.scrollHeight;
	    }

        //If Button with ID button1 is clicked then we execute this code.
        $('#button1').on('click',function(e){
            let text = $('#textinput').val();
            addMessage(text);
            document.getElementById('textinput').value=""
        
        });

        $(document).on('keypress',function(e) {
            if(e.which == 13) {
                let text = $('#textinput').val();
                addMessage(text);
                document.getElementById('textinput').value=""
    }
});
    
    //Function to add the data to the database
    function addMessage(text){
        $.ajax({
            method:'POST',
            url:"http://larachat.dev/store",
            data:{
                text:text
            },
        })
        ScrollToBottom=true;
    }

    //Function to load data from the database
    function load(){
        $.ajax({
            //We must add the CSRF-Token so we wont have a problem.
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'getajax',
            type:'POST',
            success: function(response){
                $('#allMessages').empty();
                data = response.data;
                for(i=0;i<response.data.length;i++){
                    $('#allMessages').append(
                        "<p> <p id=name>" + response.data[i].user.name + "</p>" + " " + response.data[i].text + "</p>" +
                        "<p>" + response.data[i].created_at + "</p>" + "<hr>"
                    );
                }
                if(ScrollToBottom===true){
      	        GoToBottom('chatbox');
      	        ScrollToBottom=false;
            }
            }
        })
    }
    setInterval(load,200);
});

   
</script>