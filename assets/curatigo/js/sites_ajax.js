  $('[data-toggle="tooltip"]').tooltip();

    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
          $('#login_msg1').html('Login to Join The Community');
          $('#login_msg2').html('Curatigo is a community to share and geek out about the latest Collections, Products and Stories. Join us :)'); 
        e.preventDefault();
    });
 
    //----- CLOSE
    $('.pageClose_class').on('click', function(e)  {      
        $('.full-pageClose').fadeOut(350);      
        e.preventDefault();
    });




var login_popup = function(section,title){
  $('.full-page-slider').removeClass('show-slider');
  $('[data-popup="popup-1"]').fadeIn(350);
  var title_msg='';
  if(title!=''){
    title_msg = '<span style="color:red">'+title+'</span>';
  }
  $('#login_msg1').html('Sign in to '+section);
  $('#login_msg2').html('Please Sign in to '+ section + title_msg);

}


 $('body').on('click', '.comments-show',function(e) {  

var finatltargetOffset;
var targetLink = $(this).attr('rel');
var targetOffset = $(targetLink).offset().top;
var first_scroll = $('.content-item.content-item-show>div:first').offset().top;
var actual_scroll = Math.abs(first_scroll-targetOffset);
$('.content-item.content-item-show').animate({scrollTop: actual_scroll}, 2000);

});



/****** Mentions start ******************/
// ttt = function(){
 $('textarea.mention').mentionsInput({
  minChars:-1,
    onDataRequest:function (mode, query, callback) {
      $.getJSON(base_url+'ajaxurls/mentions/'+query, function(responseData) {
        responseData = _.filter(responseData, function(item) { return item.username.toLowerCase().indexOf(query.toLowerCase()) > -1 });
        callback.call(this, responseData);
      });
    }

  });

//}
/****** Mentions end ******************/



mention_display=function(){

   $('textarea.mention').mentionsInput({
    minChars:-1,
    onDataRequest:function (mode, query, callback) {
      $.getJSON(base_url+'ajaxurls/mentions/'+query, function(responseData) {
        responseData = _.filter(responseData, function(item) { return item.username.toLowerCase().indexOf(query.toLowerCase()) > -1 });
        callback.call(this, responseData);
      });
    }

  });

}



/****** header start ******************/

function mobileMenu(){
  if($(this).width() <= 991){
    $('.logo-css > a').click(function(e) { 
      e.preventDefault();
      $('.mobile-menu').show();
	
	  
    });
	
	
	$('body').click(function(e) { 
        var txtIsClose = 1;	
		if ( $(e.target).closest(".logo-css").length > 0 ) { txtIsClose = 0; }
			if( txtIsClose == 1 )
				{ 
					$('.mobile-menu').hide();
				}
    });
  }
} 
  mobileMenu();

  

  
$('.header-search-form i').click(function(e) {
  
  $('.header-search-form input').show(); 
  $('.header-search-form .fa-close').show(); 
  
});

$('.header-search-form .fa-close').click(function(e) {
  
  $('.header-search-form input').hide(); 
  $(this).hide();
    
});


/****** header end ******************/




/*==== Story Section Js Start ====*/

  $('.see-more-story, .common-story-section').click(function(b) {    
   var story_data=$(this).attr("id");
   var key=story_data.split('_');
   var story_id=key[0];  
   var url_slug=key[1]; 

 //  console.log(story_data);
   var url=base_url+'stories/show/'+url_slug;
   window. history.pushState({}, '', url);
    var item = $(this).attr('rel');

    $.ajax({
      type: 'POST',
      url: base_url+'stories/story_details',
      data: {story_id:story_id},
      success:function(response){
        
         $('.content-item').html(response);
          $('body').addClass('view-single noscroll');
          $('.content-item').addClass('content-item-show');
          $('.story-main-content-css').addClass('story-main-content-css-show');

          if(item=='#comment-target'){
              var finatltargetOffset;
              var targetLink = item;
              var targetOffset = $(targetLink).offset().top;
              //alert(targetOffset);
              var first_scroll = $('.content-item.content-item-show>div:first').offset().top;
              var actual_scroll = Math.abs(first_scroll-targetOffset);
              $('.content-item.content-item-show').animate({scrollTop: actual_scroll}, 2000);

          }

           mention_display();


          }


        });

   

    });




$('body').on('click', '.back-to-story a,.back-to-story1',function(e) {

   var url=$(location).attr('href'); 
   var url_array=url.split('/');
   url_array.pop();
   url_array.pop();
   url=url_array.join('/');
   window. history.pushState({}, '', url);

    $('.content-item.content-item-show').animate({scrollTop:0}, 10);
    $('body').removeClass('view-single noscroll');
    $('.content-item').removeClass('content-item-show');
    $('.story-main-content-css').removeClass('story-main-content-css-show');
    //location.reload();
       
  });
  

/*==== Story share Section Js Start ====*/


$('body').on('click', '.share-box-slide',function(e) {    
    var story_id=$(this).attr("id");
   $.ajax({
      type: 'POST',
      url: base_url+'stories/story_share',
      data: {story_id:story_id},
      success:function(response){
         $('#share_box_section').html(response);
         $('.main-body').addClass('hide-body');
         $('#share-main-id').addClass('show-share-slide');
        
          }
        });
    });



  $('body').on('click', '.share-box-click',function(e) {
  var story_id=$(this).attr("id");
  var rel_id=$(this).attr("rel");
  $.ajax({
      type: 'POST',
      url: base_url+'stories/story_share',
      data: {story_id:story_id},
      success:function(response){
         $('#share_box_section').html(response);
         $('.main-body').addClass('hide-body');
          $('#share-main-id').addClass('show-share-slide');
         $('#share-main-id').addClass('story-main-slide');


        }
        });
  }); 



$('body').on('click', '.share-section',function(e) {    

e.preventDefault();
e.stopPropagation();

  var product_id=$(this).attr("id");

 // console.log(product_id);

   $.ajax({
      type: 'POST',
      url: base_url+'product/product_share',
      data: {product_id:product_id},
      success:function(response){
        $('.share-form .modal-content').html(response);
        $('#share-product').modal('show');
        //$('.full-page-slider').removeClass('show-slider');
       

          }
        });
    });



$('body').on('click', '.pin-it',function(e) {    
e.preventDefault();
e.stopPropagation();
var pin_url=$(this).attr("rel");
window.open(pin_url, '_blank');
});


  
  
  $('body').on('click', '.share-box .close',function(e) {
     $('.common-form-share').removeClass('show-share-slide');
     $('.main-body').removeClass('hide-body');
     $('.common-form-share').removeClass('story-main-slide');
    });





   /*==== grid view and list view section ====*/ 
      
        $("#gridlink").click(function() {
            $("#divlist").hide();
            $("#divgrid").show();
            $('#listli').removeClass('active');
            $('#gridli').addClass('active');
        });

        $("#listlink").click(function() {
            $("#divlist").show();
            $("#divgrid").hide();
            $('#gridli').removeClass('active');
            $('#listli').addClass('active');
            
        });

  /*==== grid view and list view section ====*/    




var increase = function(type,id,user_id){
  var span='#number_' + type + '_'+ id;
  var spans='#numbers_' + type + '_'+ id;
  var spanpop='#numberpop_' + type + '_'+ id;
  var spanupvote='#numberupvote_' + type + '_'+ id;
 
  $.ajax({
      type: 'POST',
      url: base_url+'stories/increase',
      data: {type:type,id:id,user_id:user_id },
      success:function(response){
          $(span).html(response);
          $(spans).html(response);
          $(spanpop).html(response);
          $(spanupvote).html(response);
          
      }
  });

}




var increase_comment = function(type,id,user_id){
  var comment='#comment_' + type + '_'+ id;
  var comments='#comments_' + type + '_'+ id;
  var commentpopup='#commentpopup_' + type + '_'+ id;

  $.ajax({
      type: 'POST',
      url: base_url+'stories/increase',
      data: {type:type,id:id,user_id:user_id },
      success:function(response){
        var upvote=(response>0)?response:'Upvote';
       // alert(upvote);
         $(comment).html(upvote);
         $(comments).html(upvote);
         $(commentpopup).html(upvote);
         
      }
  });

}

$(".follow-btn").on('click', function(e) {
  e.preventDefault();
  e.stopPropagation();
});


var follow_unfollow = function(user_id,follow_id){
       //evt.stopPropagation();
       $.ajax({
          type: 'POST',
          url: base_url+'stories/follow_unfollow',
          data: {user_id:user_id,follow_id:follow_id },
          success:function(response){
             $('.follow_' + follow_id).html(response);
             $('.followspan_' + follow_id).html(response);


            
             
             //location.reload();

          }
      });
}




/*show hide code in reply textarea */

  $('body').on('click', '.replyshowhide,.replyshowhidepop',function(e) {
    var comment_id=$(this).attr("id");
    reply_showhide(comment_id);
  });



var reply_showhide = function(comment_id){

  var showhide_id=comment_id;
  $('#showhide_' + showhide_id).toggle();
  $('#showhidepop_' + showhide_id).toggle();

}




/*show hide code in reply textarea */


$('.from-comment').on('keypress',function (e) {

if(e.keyCode==13){

        var main_id=$(this).attr("id");
        var key = main_id.split('_');
        var textarea=$('#'+main_id).val();
        var story_id=key['1'];
        var user_id=current_user_id;   

       
        if(user_id==''){
         
         login_popup('Comment','');
         $('[data-popup="popup-1"]').css('zIndex',9999);

        }else{

           if(textarea==''){
          alert("Please Enter Your Comment");
          return false;
        }

           $.ajax({
            type: 'POST',
            url: base_url+'stories/comments_submit_main',
            data: {textarea:textarea,user_id:user_id,story_id:story_id},
            success:function(response){
             
              $('#'+main_id).val('');
                $('.comment_data_dev_' + key['1']).html(response);    

                // $('#comment_msg_' + key['1']).html('Thanks for successfully submitting your Comment ');
                // $('#comment_msg_' + key['1']).fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");

             
            }
        });

           comment_count_html(key['1']);
           

        }
           
  }
});




comment_count_html = function(id){

      $.ajax({
            type: 'POST',
            url: base_url+'stories/comments_count_view',
            data: {id:id},
            success:function(response1){
              var viewall='<i class="fa  fa-arrow-up"></i>  View all <span class="story_comment_'+id+'">'+response1+'</span>';
             $('.story_comment_' + id).html(response1); 
             $('.foo_'+id).html(viewall);
            }
        });
  
}





//  collection commment submit section


$('.from-comments').on('keypress',function (e) {
if(e.keyCode==13){

        var main_id=$(this).attr("id");
        var key = main_id.split('_');
        var textarea=$('#'+main_id).val();
        var story_id=key['1'];
        var user_id=current_user_id;   
        if(user_id==''){
         
         login_popup('Comment','');
         $('[data-popup="popup-1"]').css('zIndex',9999);

        }else{

           if(textarea==''){
          alert("Please Enter Your Comment");
          return false;
        }

           $.ajax({
            type: 'POST',
            url: base_url+'stories/comments_collection_submit',
            data: {textarea:textarea,user_id:user_id,story_id:story_id},
            success:function(response)
			{
				console.log(response);
              $('#'+main_id).val('');
			    $('.comment-list-css').html(response);    
               // $('#comment_msg_' + key['1']).fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");
            }
        });

        }
           
  }
});


//  collection commment reply section



 
 $('body').on('keypress', '.from_collection-reply',function(e) {
   
  if(e.keyCode==13){
        var main_id=$(this).attr("id");
        var key = main_id.split('_');
        var textarea=$('#'+main_id).val();
        var collection_id=key['1'];
        var reply_id=key['2'];
        var user_id=current_user_id;
        

         if(user_id==''){
         
         login_popup('Reply','');
         $('[data-popup="popup-1"]').css('zIndex',9999);

         }else{

 if(textarea==''){
          alert("Please Enter Your reply");
          return false;
        }

            $.ajax({
            type: 'POST',
            url: base_url+'stories/reply_submit_collection',
            data: {textarea:textarea,user_id:user_id,reply_id:reply_id,collection_id:collection_id},
             success:function(response)
			{
              
              $('#'+main_id).val('');
               $('#'+main_id).val('');
              $('#reply_msg_' + key['2']).html(response);
              $('#reply_msgpop_' + key['2']).html(response);
              
            }
        });

        }
       

         
  }
 });


comment_main_html = function(id){

      $.ajax({
            type: 'POST',
            url: base_url+'stories/comments_main_view',
            data: {id:id},
            success:function(response2){
             $('.comment_data_dev_' + id).html(response2); 
            }
        });
  
}





$('body').on('keypress', '#form-comment',function(e) {
  if(e.keyCode==13){

          var textarea=$('#form-comment').val();
          var story_id=$('#story_id').val();
          var user_id=current_user_id;   
         if(user_id==''){
         
         login_popup('Comment','');
         $('[data-popup="popup-1"]').css('zIndex',9999);

        }else{

           if(textarea==''){
          alert("Please Enter Your Comment");
          return false;
        }

           $.ajax({
              type: 'POST',
              url: base_url+'stories/comments_submit',
              data: {textarea:textarea,user_id:user_id,story_id:story_id},
              success:function(response_pop){
               
              // alert(response_pop);
                $('#form-comment').val('');
                $('.comment_data_pop_' + story_id).html(response_pop);   
                //$('#comment_data_show').html(response_pop);
                // $('#comment_msg_pop').html('Thanks for successfully submitting your comment.');
                 // $('#comment_msg_pop').fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");
                
              }
          });

           comment_main_html(story_id);
           comment_count_html(story_id);

        }
       

             
          
          }
  });




$('body').on('click', '.mcomment',function(e) {
  
          var textarea=$('#form-comment').val();
          var story_id=$('#story_id').val();
          var user_id=current_user_id;   
         if(user_id==''){
         
         login_popup('Comment','');
         $('[data-popup="popup-1"]').css('zIndex',9999);

        }else{

           if(textarea==''){
          alert("Please Enter Your Comment");
          return false;
        }

           $.ajax({
              type: 'POST',
              url: base_url+'stories/comments_submit',
              data: {textarea:textarea,user_id:user_id,story_id:story_id},
              success:function(response_pop){
               
              // alert(response_pop);
                $('#form-comment').val('');
                $('.comment_data_pop_' + story_id).html(response_pop);   
                //$('#comment_data_show').html(response_pop);
                // $('#comment_msg_pop').html('Thanks for successfully submitting your comment.');
                 // $('#comment_msg_pop').fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");
                
              }
          });

           comment_main_html(story_id);
           comment_count_html(story_id);

        }
       

             
          
        
  });


$('body').on('click', '.mformreply',function(e) {

        var pop=0;
        var textarea='';
        var main_id=$(this).attr("id");
        var key = main_id.split('_');
        var story_id=key['1'];
        var reply_id=key['2'];
        var user_id=current_user_id;
        
         if(user_id==''){
         
         login_popup('Reply','');
         $('[data-popup="popup-1"]').css('zIndex',9999);

         }else{

       
        var formreply=$('#formreply_'+story_id+'_'+reply_id).val(); 
       
       

        if(formreply=='undefined'){
           pop=1;
          textarea=$('#formreply_'+story_id+'_'+reply_id).val();
        }else{
          pop=0;
          textarea=$('#popformreply_'+story_id+'_'+reply_id).val();
        }

//alert(textarea);

        if(textarea==''){
                alert("Please Enter Your Reply ");
                return false;
              }
        
             $.ajax({
            type: 'POST',
            url: base_url+'stories/reply_submit',
            data: {textarea:textarea,user_id:user_id,reply_id:reply_id,story_id:story_id,pop:pop},
            success:function(response){
             
              $('#'+main_id).val('');
              $('#'+main_id).val('');
              $('#showhide_'+key['2']).hide();
              $('#showhidepop_'+key['2']).hide();
              $('#comment_show_' + key['2']).html(response);
             // $('#reply_msg_' + key['2']).html('Your reply successfully submitted');
             // $('#reply_msgpop_' + key['2']).html('Your reply successfully submitted');
             
             // $('#reply_msg_' + key['2']).fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");
             // $('#reply_msgpop_' + key['2']).fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");

            }
        });

        }
       

   

  });



$('body').on('keypress', '.from-reply,.from-replypop',function(e) {

  if(e.keyCode==13){
        var pop=0;
        var main_id=$(this).attr("id");
        var key = main_id.split('_');
        var textarea=$('#'+main_id).val();
        var story_id=key['1'];
        var reply_id=key['2'];
        var user_id=current_user_id;
        
         if(user_id==''){
         
         login_popup('Reply','');
         $('[data-popup="popup-1"]').css('zIndex',9999);

         }else{

       if(textarea==''){
                alert("Please Enter Your Reply");
                return false;
              }
        var formreply=$('#formreply_'+story_id+'_'+reply_id).val(); 
       
        if(formreply!=''){
           pop=1;
        }else{
          pop=0;
        }

        
             $.ajax({
            type: 'POST',
            url: base_url+'stories/reply_submit',
            data: {textarea:textarea,user_id:user_id,reply_id:reply_id,story_id:story_id,pop:pop},
            success:function(response){
             
              $('#'+main_id).val('');
              $('#'+main_id).val('');
              $('#showhide_'+key['2']).hide();
              $('#showhidepop_'+key['2']).hide();
              $('#comment_show_' + key['2']).html(response);
             // $('#reply_msg_' + key['2']).html('Your reply successfully submitted');
             // $('#reply_msgpop_' + key['2']).html('Your reply successfully submitted');
             
             // $('#reply_msg_' + key['2']).fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");
             // $('#reply_msgpop_' + key['2']).fadeIn("fast").delay(3000).animate({height: "hide", opacity: "hide"}, "medium");

            }
        });

           comment_main_html(story_id);
           comment_count_html(story_id);

        }
       

         
  }
 });






$('body').on('click', '#share_send',function (e) {

var data_value=$('#data_value').val();
var follower_list=$('.multiselect').attr('title');
var subject=$('#subject').val();
var message=$('#message').val();

var user_id=current_user_id;

 if(user_id==''){

         login_popup('Share','');
         $('[data-popup="popup-1"]').css('zIndex',9999);
        
         }else{

        
          if($('.dropdown-menu .active a').attr('class') == 'own-follower'){

           // alert($('.multiselect').attr('title'));

           if($('.multiselect').attr('title') == 'None selected'){
              alert("Please Select Follower");        
           return false;
          }else if(subject==''){
            alert("Please enter Subject");
            return false;
          }else if(message==''){
            alert("Please enter Message");
            return false;
          }else{
           // return true;
          }

          }else{
              check_email = check_multiple_email(data_value);

            if(check_email != true){
           alert(check_email);
           return false;
          }else if(subject==''){
            alert("Please enter Subject");
            return false;
          }else if(message==''){
            alert("Please enter Message");
            return false;
          }else{
           // return true;
          }

          }

          

          

          $.ajax({
                type: 'POST',
                url: base_url+'stories/share_send_mail',
                data: {data_value:data_value,subject:subject,message:message,follower_list:follower_list},
                success:function(response){
                     $('#data_value').val('');
                     $('#subject').val('');
                     $('#message').val('');
                    
                     $('#share_thanks_msg').html(response);
                }
            }); 
 $("#follower_list").multiselect('clearSelection');

}
    
});







$('body').on('click', '#share_send_pro',function (e) {


var data_value=$('#data_value').val();
var subject=$('#subject').val();
var message=$('#message').val();
var follower_list=$('.multiselect').attr('title');

var user_id=current_user_id;

 if(user_id==''){

         login_popup('Share Product','');
         $('[data-popup="popup-1"]').css('zIndex',9999);
        
         }else{

         
          if($('.dropdown-menu .active a').attr('class') == 'own-follower'){

            if($('.multiselect').attr('title') == 'None selected'){
              alert("Please Select Follower");        
           return false;
          }else if(subject==''){
            alert("Please enter Subject");
            return false;
          }else if(message==''){
            alert("Please enter Message");
            return false;
          }else{
           // return true;
          }

          }else{
              check_email = check_multiple_email(data_value);

            if(check_email != true){
           alert(check_email);
           return false;
          }else if(subject==''){
            alert("Please enter Subject");
            return false;
          }else if(message==''){
            alert("Please enter Message");
            return false;
          }else{
           // return true;
          }

          }

          $.ajax({
                type: 'POST',
                url: base_url+'stories/share_send_mail',
                data: {data_value:data_value,subject:subject,message:message,follower_list:follower_list},
                success:function(response){
                     $('#data_value').val('');
                     $('#subject').val('');
                     $('#message').val('');
                     
                     $('#share_thanks_msg').html(response);
                }
            }); 
           $("#follower_list").multiselect('clearSelection');


}
     
});





$('body').on('click', '#share_cancel,#share_cancel_pro',function (e) {

   $('#data_value').val('');
    $("#follower_list").multiselect('clearSelection');
   $('#subject').val('');
   $('#message').val('');
    return false;

});

  $('body').on('click', '.fullname,.username,.profileimg',function(e) {    
    var url=$('.bg-new-css').attr("rel");
    window.open(url,'_blank');
  });


function isEmailAddr(email){
  var regExp  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
  return regExp.test(email);
}

//function to validate multiple emails
function check_multiple_email(email){
   
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    email = email.split(",");
    check = true;
   
    $.each(email, function( k, v ){
        v = v.trim();
        if( v == '' ){
            check = "Please Enter Email Address.";
            return false;
        }
        if( !emailReg.test(v) ){
            check = "Please Enter Valid Email Address.";
            return false;           
        }       
    });
   
    return check;
}




function getCustomValue(ele)
  {
    
    var custom_width = document.getElementById('width'); 
    var custom_height = document.getElementById('height'); 
    
    var html = '<iframe src="<?php echo $url;?>" width="'+custom_width.value+'" height="'+custom_height.value+'" allowtransparency="true"  frameborder="0" style="width:'+custom_width.value+'px;height:'+custom_height.value+'px;margin:0 auto;border:0" ></iframe>';
    
    document.getElementById('custom_textarea').innerHTML = html;
  }


  onfocus_onblur=function(){
    $('.from-reply').focusin(function () {
        $(this).attr('placeholder', '');
    });
    $('.from-reply').focusout(function () {
        $(this).attr('placeholder', 'Add a reply.....');
    });

  }

  

   