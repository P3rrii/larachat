@extends('layouts.app')

<link href="{{asset('css/chat.css')}}" rel="stylesheet"> {{-- Including the Spreadsheet for chat --}}
{{-- <script type="text/javascript" src="{{asset('js/chat.js')}}"></script> Including the JS for chat (AJAX) --}}
<script src="{{asset('js/app.js')}}"></script>


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                @if(Auth::user())
                <div class="panel-heading" id="header"> Chat </div>
                <div class="panel-body" id="chatbox" >
                    <div id="allMessages"> </div>
                </div>

                <div class="input-group mb-3" id="sendform">
                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2" display="inline" id="textinput">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="button1"> Send </button>
                    </div>
                </div>
                @else 
                    <center> <p> You must be logged in to use the chat </p> </center>
                @endif
            </div>
        </div>

        <div class="col-md-4 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading" id="header"> Active Users </div>
                <div class="panel-body" id="activeUsers" >
                    <div id="allActiveUsers"> </div>
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
            url:"store",
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

                $('#allActiveUsers').empty();
                for(i=0;i<response.active_users.length;i++){
                    $('#allActiveUsers').append(
                        "<p> <p id=name>" + response.active_users[i].name + "</p>"
                    );
                }

                
                if(ScrollToBottom===true){
      	            GoToBottom('chatbox');
      	            ScrollToBottom=false;
                }
            }
        })
    }

    function checkIsActive(){
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'POST',
            url:"isactive",
        })
    }
    setInterval(load,500);

    window.onbeforeunload = function (e) {
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'POST',
            url:"notactive",
        })
    }

    $(window).on('unload', function() {
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'POST',
            url:"notactive",
        })
    });

    checkIsActive();
});

   
</script>