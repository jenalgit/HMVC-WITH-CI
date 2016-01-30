


$(function(){
  
 
var winWidth = $(window); 
var numOfItems = 0;
/*====== product comment js start=====*/

  $(".end_date").datepicker({
  dateFormat: 'yyyy-mm-yy',
  yearRange: '-00:+01'
  }); 
  $('.date_target').click(function () {
    $(this).next().datepicker('show');
  });
      
  /*====== Filter Js =====*/
  
  
  $('.store-filteration a').click(function() {
       
    $('.store-filter-panel').addClass('panel-visible');
    $('.panel-grid').addClass('resize-visible');
    $('.store-filteration').addClass('change-color');
    });
  
  
  $('.close-panel').click(function() {
     $('.store-filter-panel').removeClass('panel-visible');
     $('.panel-grid').removeClass('resize-visible');
     $('.store-filteration').removeClass('change-color');
  }); 
  
  
    $('.store-categories li').click(function(e) {
    e.stopPropagation();
    $(this).children('ul').slideToggle();
    
      $(this).toggleClass('active');
    
    });
  
$('.filter-store').css({'height':$(window).height()-( $('.main-header').height()+150)});    
$("#filter_store").mCustomScrollbar({
  scrollButtons:{enable:true},
  theme:"minimal-dark",
  scrollbarPosition:"outside"
}); 

/*====== product comment js end  =====*/


 countProperties = function(obj) {
    var count = 0;

    for (var property in obj) {
        if (Object.prototype.hasOwnProperty.call(obj, property)) {
            count++;
        }
    }

    return count;
}

getIndex = function(obj, element) {
    var count=0;

    for (var property in obj) {
      if(element == property){
        return count;
      }
      
      count++;
        
    }

    //return count;
}

$('.common-pro-popup a').click(function() {
    

  var z = $(this).attr('rel');

   var key = z.split('_');

  var product_date=key[1];  

  var product_data=key[0];
  var product_data1 = product_data.split('-');
  var current_index=product_data1[1];


  $("#prev").attr("rel",product_date);
  $("#next").attr("rel",current_index);
 
        numOfItems = countProperties(sliderData.products[product_date]);
        console.log(sliderData.products[product_date]);
        ///console.log(countProperties(sliderData.products[product_date]));
        //console.log(sliderData.products[product_date]); 
        //$('#img-one').val(sliderData.products['product_date'][0].id);
        $('#pop_title').html(sliderData.products[product_date][current_index].title_p);
        $('#pop_desc').html(sliderData.products[product_date][current_index].product_description);
        $('#pop_collection').html(sliderData.products[product_date][current_index].collection_title);
        $('#pop_img').attr('src',sliderData.products[product_date][current_index].image_path);
        $('#pop_vote').html(sliderData.products[product_date][current_index].vote);
        $('#pop_url').attr('href',sliderData.products[product_date][current_index].product_url);
        $('#pop_price').html(sliderData.products[product_date][current_index].price);
        $('#pop_sellprice').html(sliderData.products[product_date][current_index].sale_price);
        $(z).addClass('active');
        $('.full-page-slider').addClass('show-slider');
      
     
       navigation(product_date, current_index); 
 
       more_product(current_index);
          
  

         $('.loader-css').fadeIn(); 
       setTimeout(function(){
        $('.loader-css').fadeOut();
      
         }, 1000);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 1500);
      
   $('body').css({'overflow-y':'none'});    

    
    $('.full-page-slider button').click(function() {

    $('.full-page-slider').removeClass('show-slider');
    $('.common-slider-content').removeClass('active');
    $('.images').fadeOut();
    $('.main-popup-slider').css({transform: 'none',WebkitTransform: 'none'});
    $('body').css({'overflow-y':'auto'});
    });       
  
});


more_product = function (cindex){ 
   $.ajax({
      type: 'POST',
      url: base_url+'product/more_product_with_collection',
      data: {cindex:cindex},
      success:function(response){
         $('.more-products').html(response);
         
          }
        });

  }


navigation = function (pdate,cindex){  
        $('.prev').hide();
        $('.next').hide();
        if(numOfItems == 1){return false;}
        

        if((numOfItems - cindex) > 1){
            $('.next').show();
        }

       if((numOfItems - cindex) <= (numOfItems - 1)){
            $('.prev').show();
        }
   }




$('.controls-slider a').click(function(e){
  
  var n = $(this).attr('class');
  var active = $(".active").removeClass('active');
  
  product_date = $("#prev").attr("rel");
  current_index = $("#next").attr("rel");


    if(n === ('prev')){
      current_index--;
      }
        
     if(n === ('next')){
      current_index++;
     }

if(current_user_id!=''){
 var html_vote='<a href="javascript:;" onclick="increase(1,'+current_index+','+current_user_id+');" >
    <span class="vote-count"><i class="fa fa-caret-up"></i><span>'+sliderData.products[product_date][current_index].vote+'</span></span></a>';
}else{
  var html_vote='<a href="javascript:;" data-toggle="modal" data-target="#common-form" >
    <span class="vote-count"><i class="fa fa-caret-up"></i><span>'+sliderData.products[product_date][current_index].vote+'</span></span></a>';
}

alert(html_vote);
        $("#next").attr("rel",current_index);
        numOfItems = countProperties(sliderData.products[product_date]);
        $('#pop_title').html(sliderData.products[product_date][current_index].title_p);
        $('#pop_desc').html(sliderData.products[product_date][current_index].product_description);
        $('#pop_collection').html(sliderData.products[product_date][current_index].collection_title);
        $('#pop_img').attr('src',sliderData.products[product_date][current_index].image_path);
        $('#pop_vote_div').html(html_vote);
        $('#pop_url').attr('href',sliderData.products[product_date][current_index].product_url);
        $('#pop_price').html(sliderData.products[product_date][current_index].price);
        $('#pop_sellprice').html(sliderData.products[product_date][current_index].sale_price);
        $(product_date).addClass('active');
        $('.full-page-slider').addClass('show-slider');
      
        navigation(product_date, current_index); 
        more_product(current_index);

         $('.loader-css').fadeIn(); 
       setTimeout(function(){
        $('.loader-css').fadeOut();
      
         }, 1000);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 1500);
      
   $('body').css({'overflow-y':'none'});    
      
      
       });
  });
  
  
  // jasdeep singh collection detail page


$('.common-col-popup a').click(function() {
    
    var z = $(this).attr('rel');
    var key = z.split('_');
    var collection_id = key[1]; 
  
  var product_data=key[0];
  var product_data1 = product_data.split('-');
  var current_index=product_data1[1];
  var file = base_url+'upload/products/'+sliderData.products[current_index].file_name;
  $("#prev").attr("rel",collection_id);
  $("#next").attr("rel",current_index);
 
        numOfItems = sliderData.products.length;
         
		//sliderData.products[product_date]
        ///console.log(countProperties(sliderData.products[collection_id]));
        //console.log(sliderData.products[collection_id]); 
        //$('#img-one').val(sliderData.products['collection_id'][0].id);
        $('#pop_title').html(sliderData.products[current_index].title_p);
        $('#pop_desc').html(sliderData.products[current_index].product_description);
       $('#pop_collection').html(sliderData.products[current_index].title);
        $('#pop_img').attr('src',file);
      /*  $('#pop_vote').html(sliderData.products[current_index].vote);*/
        $('#pop_url').attr('href',sliderData.products[current_index].product_url);
        $('#pop_price').html(sliderData.products[current_index].price);
        $('#pop_sellprice').html(sliderData.products[current_index].sale_price);
        $(z).addClass('active');
        $('.full-page-slider').addClass('show-slider');
      
     
       navigation_collection(collection_id, current_index,numOfItems); 
 
          
  

         $('.loader-css').fadeIn(); 
       setTimeout(function(){
        $('.loader-css').fadeOut();
      
         }, 1000);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 1500);
      
   $('body').css({'overflow-y':'none'});    

    
    
    $('.full-page-slider button').click(function() {

    $('.full-page-slider').removeClass('show-slider');
    $('.common-slider-content').removeClass('active');
    $('.images').fadeOut();
    $('.main-popup-slider').css({transform: 'none',WebkitTransform: 'none'});
    $('body').css({'overflow-y':'auto'});
    });       
	

   
});



  navigation_collection = function (cid,cindex,numOfItems){  
  
        $('.prev').hide();
        $('.next').hide();
        if(numOfItems == 1){return false;}
        

        if((numOfItems - cindex) > 1){
            $('.next').show();
        }

       if((numOfItems - cindex) <= (numOfItems - 1)){
            $('.prev').show();
        }
   }
   
   
   $('.controls-slidercol a').click(function(e){
  
  var n = $(this).attr('class');
  var active = $(".full-page-slider .active").removeClass('active');
  
  collection_id = $("#prev").attr("rel");
  current_index = $("#next").attr("rel");

    var file = base_url+'upload/products/'+sliderData.products[current_index].file_name;
    if(n === ('prev')){
      current_index--;
      }
        
     if(n === ('next')){
      current_index++;
     }

      $("#next").attr("rel",current_index);

    numOfItems = sliderData.products.length;
         
		//sliderData.products[product_date]
        ///console.log(countProperties(sliderData.products[collection_id]));
        //console.log(sliderData.products[collection_id]); 
        //$('#img-one').val(sliderData.products['collection_id'][0].id);
        $('#pop_title').html(sliderData.products[current_index].title_p);
        $('#pop_desc').html(sliderData.products[current_index].product_description);
       /* $('#pop_collection').html(sliderData.products[current_index].collection_title);*/
        $('#pop_img').attr('src',file);
      /*  $('#pop_vote').html(sliderData.products[current_index].vote);*/
        $('#pop_url').attr('href',sliderData.products[current_index].product_url);
        $('#pop_price').html(sliderData.products[current_index].price);
        $('#pop_sellprice').html(sliderData.products[current_index].sale_price);
        $(product_date).addClass('active');
        $('.full-page-slider').addClass('show-slider');
      
          navigation_collection(collection_id, current_index,numOfItems); 
 

 
       

         $('.loader-css').fadeIn(); 
       setTimeout(function(){
        $('.loader-css').fadeOut();
      
         }, 1000);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 1500);
      
   $('body').css({'overflow-y':'none'});    
      
     // indexNew += checkValue;
      
      //  $('.main-popup-slider').css({transform: 'translateX(' + (-100 * (indexNew)) + '%)',WebkitTransform: 'translateX(' + (-100 * (indexNew)) + '%)'});
      
       });









$(function(){
    $(".dropdown-toggle").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).parents('li').toggleClass('open');
               // $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).parents('li').toggleClass('open');
               // $('b', this).toggleClass("caret caret-up");                
            });
      
      
      
/*==== Story Section Js Start ====*/

  $('.see-more-story, .common-story-section').click(function(b) {    
   var story_id=$(this).attr("id");  
    $.ajax({
      type: 'POST',
      url: base_url+'stories/story_details',
      data: {story_id:story_id},
      success:function(response){
         //alert(response);
         $('.content-item').html(response);
          $('body').addClass('view-single noscroll');
          $('.content-item').addClass('content-item-show');
          $('.story-main-content-css').addClass('story-main-content-css-show');
           if($(b.target).hasClass('common-story-section')){
            $('.content-item.content-item-show').animate({scrollTop:$($('.common-story-section').attr('rel')).offset().top}, 1000);
          }
          }
        });
    });


 $('body').on('click', '.back-to-story a',function(e) {
    $('.content-item.content-item-show').animate({scrollTop:0}, 10);
    $('body').removeClass('view-single noscroll');
    $('.content-item').removeClass('content-item-show');
    $('.story-main-content-css').removeClass('story-main-content-css-show');
       
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


$('body').on('click', '.share-section .fa-share-alt',function(e) {    

  alert("sadasd");
   var product_id=$(this).attr("id");
   $.ajax({
      type: 'POST',
      url: base_url+'product/product_share',
      data: {product_id:product_id},
      success:function(response){
        $('.share-form .modal-content').html(response);
        $('#share-product').modal('show');
        $('.full-page-slider').removeClass('show-slider');
       
       

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
  
  $('body').on('click', '.share-box .close',function(e) {
     $('.common-form-share').removeClass('show-share-slide');
     $('.main-body').removeClass('hide-body');
     $('.common-form-share').removeClass('story-main-slide');
    });
  




  
/*==== Followers & Following Js Start ====*/    
  
$('.users-followers-link a').click(function() {
  
  $($(this).attr('href')).removeClass('tab-pane fade').animate({'bottom':0},600);
  $('body').addClass('open-popup');
  return false;
  
});

$('.follower-title').click(function() {
  $('.follower-common').removeClass('tab-pane fade').animate({'bottom':'-100%'},600);
  $('body').removeClass('open-popup');
  
});

  
  
  
/*==== Background Section Js Start ====*/ 
  
      
  $('.profile-page-mid .nav a').click(function(e) {
    
    //console.log($(this).parents('li').attr('class'));
    
    if(($(this).attr('rel')=='#bg-change')){
      
      $($(this).attr('rel')).css({'background':'#eee'});
      
    }else{
      
      $('.user-mid-bar').css({'background':'#fff'});
    }
        
    });   
    

      /*==== Owl carousel JS ====*/ 
 
  $('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:20,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        }
    }
});


      /*==== Owl carousel JS ====*/ 
 
  $('#collection_carousel').owlCarousel({
    stagePadding: 20,
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        }
    }
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
          
    });
  








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
          location.reload();
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
         $(comment).html(response);
         $(comments).html(response);
         $(commentpopup).html(response);
         location.reload();
      }
  });

}



var follow_unfollow = function(user_id,follow_id){
     
       $.ajax({
          type: 'POST',
          url: base_url+'stories/follow_unfollow',
          data: {user_id:user_id,follow_id:follow_id },
          success:function(response){
             $('#follow_' + follow_id).html(response);
             $('#followspan_' + follow_id).html(response);
             location.reload();

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
          $('#common-form').modal('show');
        }else{

           $.ajax({
            type: 'POST',
            url: base_url+'stories/comments_submit',
            data: {textarea:textarea,user_id:user_id,story_id:story_id},
            success:function(response){
             
              $('#'+main_id).val('');
               $('#comment_msg_' + key['1']).html(response);
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
         $('#common-form').modal('show');
         }else{

             $.ajax({
            type: 'POST',
            url: base_url+'stories/reply_submit_collection',
            data: {textarea:textarea,user_id:user_id,reply_id:reply_id,collection_id:collection_id},
            success:function(response){
             
              $('#'+main_id).val('');
               $('#'+main_id).val('');
              $('#reply_msg_' + key['2']).html(response);
              $('#reply_msgpop_' + key['2']).html(response);
              
            }
        });

        }
       

         
  }
 });



  $('body').on('keypress', '#form-comment',function(e) {
  if(e.keyCode==13){

          var textarea=$('#form-comment').val();
          var story_id=$('#story_id').val();
          var user_id=current_user_id;   
         if(user_id==''){
          $('#common-form').modal('show');
        }else{

           $.ajax({
              type: 'POST',
              url: base_url+'stories/comments_submit',
              data: {textarea:textarea,user_id:user_id,story_id:story_id},
              success:function(response){
               
                $('#form-comment').val('');
                 $('#comment_msg_pop').html(response);
              }
          });

        }
       

             
          
          }
  });



   $('body').on('keypress', '.from-reply,.from-replypop',function(e) {
  if(e.keyCode==13){
        var main_id=$(this).attr("id");
        var key = main_id.split('_');
        var textarea=$('#'+main_id).val();
        var story_id=key['1'];
        var reply_id=key['2'];
        var user_id=current_user_id;
        
         if(user_id==''){
         $('#common-form').modal('show');
         }else{

             $.ajax({
            type: 'POST',
            url: base_url+'stories/reply_submit',
            data: {textarea:textarea,user_id:user_id,reply_id:reply_id,story_id:story_id},
            success:function(response){
             
              $('#'+main_id).val('');
               $('#'+main_id).val('');
              $('#reply_msg_' + key['2']).html(response);
              $('#reply_msgpop_' + key['2']).html(response);
              
            }
        });

        }
       

         
  }
 });



$('body').on('click', '#share_send',function (e) {

var data_value=$('#data_value').val();
var subject=$('#subject').val();
var message=$('#message').val();

var user_id=current_user_id;

 if(user_id==''){

         $('#common-form').modal('show');
        
         }else{


          if(data_value==''){
            alert("Please enter Friends Email ID");
            return false;
          }
          if(!isEmailAddr(data_value)){
              alert('Please enter valid Email Id.');
              return false;
            }
          if(subject==''){
            alert("Please enter Subject");
            return false;
          }
          if(message==''){
            alert("Please enter Message");
            return false;
          }

          $.ajax({
                type: 'POST',
                url: base_url+'stories/share_send_mail',
                data: {data_value:data_value,subject:subject,message:message},
                success:function(response){
                     $('#data_value').val('');
                     $('#subject').val('');
                     $('#message').val('');
                     $('#share_thanks_msg').html(response);
                }
            }); 


}
     




});

$('body').on('click', '#share_send_pro',function (e) {

var data_value=$('#data_value').val();
var subject=$('#subject').val();
var message=$('#message').val();

var user_id=current_user_id;

 if(user_id==''){

         $('#common-form').modal('show');
         $("#common-form").css('zIndex',9999);
        
         }else{


          if(data_value==''){
            alert("Please enter Friends Email ID");
            return false;
          }
          if(!isEmailAddr(data_value)){
              alert('Please enter valid Email Id.');
              return false;
            }
          if(subject==''){
            alert("Please enter Subject");
            return false;
          }
          if(message==''){
            alert("Please enter Message");
            return false;
          }

          $.ajax({
                type: 'POST',
                url: base_url+'stories/share_send_mail',
                data: {data_value:data_value,subject:subject,message:message},
                success:function(response){
                     $('#data_value').val('');
                     $('#subject').val('');
                     $('#message').val('');
                     $('#share_thanks_msg').html(response);
                }
            }); 


}
     




});



$('body').on('click', '#share_cancel,#share_cancel_pro',function (e) {

   $('#data_value').val('');
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


function getCustomValue(ele)
  {
    
    var custom_width = document.getElementById('width'); 
    var custom_height = document.getElementById('height'); 
    
    var html = '<iframe src="<?php echo $url;?>" width="'+custom_width.value+'" height="'+custom_height.value+'" allowtransparency="true"  frameborder="0" style="width:'+custom_width.value+'px;height:'+custom_height.value+'px;margin:0 auto;border:0" ></iframe>';
    
    document.getElementById('custom_textarea').innerHTML = html;
  }
