// document.getElementById('button').addEventListener('submit', postMessage);

//     var ScrollToBottom = true;

//     function postMessage(e){
//       e.preventDefault();

//       var message = document.getElementById('textinput').value;
//       var params = "message="+message;

//       var xhr = new XMLHttpRequest();
//       xhr.open('POST', ' ', true);
//       xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//       xhr.onload = function(){
//         console.log(this.responseText);
//       }

//       xhr.send(params);

//       document.getElementById('message2').value = " "

//       ScrollToBottom=true;
//     }

//     //////////////////////////////



//     function loadMessages(){
//       var xhr = new XMLHttpRequest();
//       xhr.open('GET', 'messages.php', false);

//       xhr.onload = function(){
//         if(this.status == 200){
//           var messages = JSON.parse(this.responseText);
          
//           var output = '';
          
//           for(var i in messages){
//             output += '<ul>' +
//               '<li>User: '+messages[i].texts+'</li>' +
//               '</ul>';
//           }

//           document.getElementById('chat').innerHTML = output;
//         }
//       }

//       xhr.send();

//       if(ScrollToBottom===true){
//       	GoToBottom('chat');
//       	ScrollToBottom=false;
//       }
//     }

//     setInterval(loadMessages,500);

//     //// Function to go to the bottom of an element(chat)

//     function GoToBottom(id)
//     {
//    	var element = document.getElementById(id);
//    	element.scrollTop = element.scrollHeight - element.clientHeight;
// 	}