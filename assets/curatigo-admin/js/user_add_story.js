

$(document).ready(function() 
{
	 $('body').on('click', '#user_submit',function(e)
{

var username            = $("#username").val();
var first_name          = $("#first_name").val();
var last_name           = $("#last_name").val();
var email_id            = $("#email_id").val();
var facebook            = $("#facebook").val();
var file_name           = ' ';
var  twitter            = $("#twitter").val();
var  password           = $("#password").val();
var  status             = $("#status").val();
var  date               = $("#date").val();

var dataString = 'username='+ username + '&first_name='+ first_name + '&email_id =' +email_id + '&last_name=' + last_name + '&facebook=' + facebook +'&twitter=' + twitter + '&password=' + password + '&status=' + status +  '&date=' + date + '&file_name=' + file_name;
 
if(username=='' ||  first_name=='' || password=='' || email_id=='' )
{
	
		alert("please fill up the required fields in user form")
    return false;
}
else
{
$.ajax({
type: "POST",
url: '../admin/user/user_add/',
data: dataString,
success: function(response)
{
	     
           if(response == 0)
		  {
			alert("User is not saved Please Enter a valid image");
		  }
		  else
		  {
			  
			                                       alert("User added successfully ");
			  	                           var newOption = '<option value='+response+'>'+first_name+'</option>'; 
												$("#user_id").append(newOption);
											  	$("#user_add .form-control").attr("value",'');
												$("#my-dropzone").attr("value",'');
												$('#user_add').modal('hide');		  
		  }
},
});
}
return false;
});
});
 
