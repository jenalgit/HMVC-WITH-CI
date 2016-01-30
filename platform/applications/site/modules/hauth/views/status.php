<?
	/*if (isset($_GET['json'])) {
		echo json_encode($status);
	} else {
		show_error($status);1656814554533194
	}*/
?>
<div id="fb-root"></div>
   <script src="http://connect.facebook.net/en_US/all.js">
   </script>
   <script>
     FB.init({ 
       appId:'1509873309327380', cookie:true, 
       status:true, xfbml:true 
     });






function FacebookInviteFriends1()
{
FB.ui({ method: 'send', 
   name: 'ashish here',
   link: 'http://google.com',

});


}


function FacebookInviteFriends()
{
/*FB.ui({ method: 'send', 
   name: 'ashish here',
   link: 'http://google.com',

});
*/

FB.ui(
  {
    method: 'share',
    href: 'https://developers.facebook.com/docs/',
  },
  // callback
  function(response) {
    if (response && !response.error_message) {
      alert('Posting completed.');
    } else {
      alert('Error while posting.');
    }
  }
);






}

 function sendRequest() {
   // Get the list of selected friends
   var sendUIDs = '890321627713602';
   
   // Use FB.ui to send the Request(s)
   FB.ui({method: 'apprequests',
     to: sendUIDs,
     title: 'My Great Invite',
     message: 'Check out this Awesome App!',
   }, callback);
 }

 function callback(response) {
   alert(response);
 }


   </script>

<a href='#' onClick="FacebookInviteFriends();"> share Document</a>
<br>
<a href='#' onClick="FacebookInviteFriends1();"> Send Document</a>

<br>
<a href='#' onClick="sendRequest();"> Send fb</a>




