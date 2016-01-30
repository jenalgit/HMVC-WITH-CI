
$(function(){

 if (window.history && window.history.pushState) {

   // window.history.pushState('forward', null, './#forward');
//alert(window.history.pushState);

    $(window).on('popstate', function() {

     var url=$(location).attr('href'); 

    window. history.pushState({}, '', url);

    $('.content-item.content-item-show').animate({scrollTop:0}, 10);
    $('body').removeClass('view-single noscroll');
    $('.content-item').removeClass('content-item-show');
    $('.story-main-content-css').removeClass('story-main-content-css-show');

    });

  }





  var cover_image = "";


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
      


/*========= social-sharing-pop ========*/


$('body').on('click','.share-common .dropdown-menu li a',function(e) {


  $('.share-common .dropdown-toggle').text($(this).text());
  $('.share-common .dropdown-menu li').removeClass('active');
  $(this).parents('li').addClass('active');
  $('.share-common .input-box input').attr("placeholder",$(this).attr('data-text'));
    //$('.share-common .input-box input').show();

    if($(this).attr('class') == 'own-email'){ 
      $('#emaildiv').show();
     $('#followerdiv').hide();
      $("#follower_list").multiselect('clearSelection');
      }else if($(this).attr('class') == 'own-follower'){ 
       $('#followerdiv').show();
         $('#follower_list').multiselect();         
       $('#emaildiv').hide();
       
      }
    else { 
      $('#emaildiv').show();
      $('#followerdiv').hide();
       $("#follower_list").multiselect('clearSelection');
      
      }
});



      


$('body').on('click','.social-sharing-pop a.last',function() {
 $('.social-sharing-pop').toggleClass('showLi'); 
 $(this).find('i').toggleClass('fa-caret-left');
  
});



$('.stories-left').scroll(function(e) {
    
   var count = 1;
   
  $.each($('.list-view-header'), function() { 
    
    if(0 >= $(this).position().top){ 

      if($(this).attr('id') == 'date_'+count){
        
        $('.list-view-fake-header').text($('#date_'+count).text());     
        
      }         
        count++;          
    }

     
    
    
  });

});

  
  
$('.stories-main-box').scroll(function(e) {
    
  var winTop = (parseInt($(window).height())*50)/100;
    
  $.each($('.stories-list-content'), function(k) { 
  
    if($(this).offset().top <= winTop)
      {       
        $('.stories-left .stories-list-css').removeClass('active');
        $('.stories-left .stories-list-css[data-target="#'+$(this).attr('id')+'"]').addClass('active');
        
        var left_section_li = $('.stories-left .stories-list-css').outerHeight();
        
        var win_height = $(window).height();
        var max_li = Math.floor(win_height/ left_section_li);
        var index = $('.stories-left .stories-list-css.active').index();
      
        if( index+1 > max_li ){         
          $('.stories-left').prop('scrollTop', left_section_li*(index+1 - max_li) );
        }else{
          $('.stories-left').prop('scrollTop', 0 );
        }
      }
    });
});
  

  $('.stories-list-css').click(function(e) {



    var finatltargetOffset;
var targetLink = $(this).attr('data-target');
var targetOffset = $(targetLink).offset().top;

var first_scroll = $('.stories-main-box>div:first').offset().top;
var actual_scroll = Math.abs(first_scroll-targetOffset);

$('.stories-main-box').animate({scrollTop: actual_scroll}, 2000);

/*    var targetLink = $(this).attr('data-target');
      var targetOffset = $(targetLink).offset().top;
    // alert(scrollTop());
  
      $('.stories-right').animate({scrollTop: targetOffset}, 1000);*/
      //return false;
    
  }); 
  
   
    
    CKEDITOR.replace( 'text-editor-box', {
    filebrowserBrowseUrl: base_url+'browse.php?type=Files',
    filebrowserUploadUrl: base_url+'upload_editor.php?type=Files'
});
    
  
  $('.create-story-box i.fa-close').click(function() {

         $('.create-story-box').css({'right':'-100%'});
         location.reload();

    });
  


  $('.add-story-icon').on({
    mouseenter: function() {
        $(this).html('<i class="fa fa-pencil"></i>');
    },
    mouseleave: function() {
       $(this).html('<i class="fa fa-plus"></i>');
    },
    click: function() {
        $('.create-story-box').css({'right':'0'});
    }
  });
  
  
   Dropzone.options.myDropzone = {
     maxFiles: 1, addRemoveLinks: true, 
accept: function(file, done) {
      done();
   
    
  },
success: function(file, response){

               // alert(response);
                cover_image = response; 
                $('.featured-image').hide();               
                $('.dz-preview').addClass('dz-success');

            },
 

    init: function() {
       var objDropZone = this;
        $("#story_reset").click(function () {objDropZone.removeAllFiles();});

    this.on("maxfilesexceeded", function(file) {
      this.removeFile(file); $('.error-image').show();$('.featured-image').hide(); $( ".dz-preview" ).show(); 
    });
   
  },
   removedfile: function(file) { 

      var _ref;
      //console.log(file.previewElement);
      $('.featured-image').show();  
      $('.error-image').hide();
      return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },

    

  };

  /*
  Dropzone.options.myDropzone1 = {
     maxFiles: 1, addRemoveLinks: true, accept: function(file, done) {
    console.log("uploaded");
    done();
  },
    init: function() {
    this.on("maxfilesexceeded", function(file) { this.removeFile(file); $('.error-image').show(); });
  }


  };
  */

 

 resetStory = function (){

   $('#story_title').val('');
   CKEDITOR.instances['text-editor-box'].setData('');
  };


$('body').on('click', '#story_submit',function(e) {    
    
   var user_id=current_user_id; 
  
   var story_title=$('#story_title').val();
  
   var value = CKEDITOR.instances['text-editor-box'].getData();
   
   

if(user_id==''){
    
    $('.create-story-box').css({'right':'-100%'});
    login_popup('Create Story','');

    return false;    
        }else{

           if(story_title==''){
            alert("Please enter Story Title");
            return false;
          }
          if(cover_image==''){
            alert("Please Upload Image");
            return false;
          }
          if(value==''){
            alert("Please enter Description");
            return false;
          }

          $(this).text('Loading...').prop('disabled', true);

       $.ajax({
            type: 'POST',
            url: base_url+'stories/story_submit_section',
            data: {user_id:user_id,value:value,story_title:story_title,image:cover_image},
            success:function(response){
                $('#story_title').val('');
                CKEDITOR.instances['text-editor-box'].setData('');
                cover_image ='';
                window.location.href = base_url+"stories";
                }
              });


        }
  
    });




      
});














