

$(document).ready(function() 
{
	  var cover_image;
Dropzone.options.myDropzone = {
     maxFiles: 1, addRemoveLinks: true, accept: function(file, done) {
    
    console.log("uploaded");
    done();
    
  },

success: function(file, response)
{
               // alert(response);
                cover_image = response;
				$('.dz-preview').addClass('dz-success');

            },
 

    init: function() {
    this.on("maxfilesexceeded", function(file) { this.removeFile(file); $('.error-image').show(); });
  }

  };
  Dropzone.options.myDropzone1 = {
     maxFiles: 1, addRemoveLinks: true, accept: function(file, done) {
    console.log("uploaded");
    done();
  },
    init: function() {
    this.on("maxfilesexceeded", function(file) { this.removeFile(file); $('.error-image').show(); });
  }
  };
  	 
$('body').on('click', '#user_submit',function(e)
{

var username   = $("#username").val();
var user_id   = $("#user_id").val();
var first_name  = $("#first_name").val();
var last_name   = $("#last_name").val();
var email_id   = $("#email_id").val();
var facebook            = $("#facebook").val();
var file_name           = cover_image;
var  twitter            = $("#twitter").val();
var  password           = $("#password").val();
var  status             = $("#status").val();
var  user_photo             = $("#user_photo").val();
var  date               = $("#date").val();

var dataString = 'username='+ username + '&user_id='+ user_id + '&user_photo='+ user_photo + '&first_name='+ first_name + '&email_id =' +email_id + '&last_name=' + last_name + '&facebook=' + facebook +'&twitter=' + twitter + '&password=' + password + '&status=' + status +  '&date=' + date + '&file_name=' + file_name;
 
if(username=='' ||  first_name=='' ||  email_id=='' ||  user_id=='' )
{
	alert("please enter a required fields in users form")
    return false;
}
else
{
$.ajax({
type: "POST",
url: '../admin/user/user_update/',
data: dataString,
success: function(response)
{
	     
           if(response == 0)
		  {
			alert("User is not update Please Enter a valid image");
		  }
		  else
		  {
			  
			     alert("User is Updated successfully ");
			  	 window.location.href = '../admin/user'; 	  
		  }
},
});
}
return false;
});
});
 
