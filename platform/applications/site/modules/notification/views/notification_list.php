<?php $this->load->view('partials/top_application');?>



<div class="main-container inner-pages one-page">

  <?php $this->load->view('partials/site_left');?>
  
  <!--====== Header Section Start ======-->
  
  <div class="main-body one-page">

  <?php $this->load->view('partials/site_header');?>

    <div class="main-frame one-page">
      <section class="stories-main-section common-new common-section one-page scrolling-divs">
        <div class="container-fluid one-page">
          <div class="row one-page">
           
            <div class="col-lg-4 col-md-4 col-sm-4 one-page">
            <div class="div-scroll-css one-page">
            <div class="new-strip-css">
             <ul>
                <li class="active"><a href="javascript:;">Latest</a></li>
                <li><a href="javascript:;">Trending</a></li>
                <li><a href="javascript:;">Must Read</a></li>
             </ul>
            </div>
            <?php 
            
$show_date=$this->db->query("select created_date from story group by created_date order by created_date desc")->result_array();
?>
  <h2 class="list-view-fake-header"><?php echo get_dates_show($show_date[0]['created_date'],date("Y-m-d"));?></h2>

             
             
              <div class="stories-left common-new one-page">
                 <ul class="contact-user-list" >
                  
                  <?php
if(is_array($res_left) && !empty($res_left) )
{
   
?>

<?php

  $i=1;
  $previous_date = -1;
  $number_days=0;
  foreach($res_left as $val_left)
   {
        $date = new DateTime($val_left['created_date']);
       $current_date = $date->format('Y-m-d');
    if(($previous_date !=-1) && ($previous_date != $current_date)){
        echo '<h2 class="list-view-header" id="date_'.$i.'">'.get_dates_show($val_left['created_date'],date("Y-m-d")).'</h2>';
        $number_days++;  
         $i++;
    } 
    
    $previous_date = $current_date;
 ?>  

                     
                   <li  data-target="#story-<?php echo $val_left['id'];?>"  class="stories-list-css">
                    <div class="stories-list">
                      <div class="col-lg-2 col-md-2 col-sm-4  pro-left">
                        <div class="list-vote"> 
                          <a href="javascript:;" <?php if($this->session->userdata('user_logged')!=''){?>
                            onclick="increase('2','<?php echo $val_left['id']?>','<?php echo $this->session->userdata('_current_user_id');?>');"
                            <?php }else{?>data-toggle="modal" data-target="#common-form"<?php }?>>
                             <i class="fa fa-caret-up"></i> <span id="number_2_<?php echo $val_left['id']?>"><?php echo vote_count_by_id('2',$val_left['id'])?></span></a> </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 pro-right  pro-left">
                        <div class="col-lg-10 col-md-10 col-sm-10   pro-left">
                          <div class="story-title-left"><?php echo $val_left['title'];?></div>
                          <div class="story-left-bottom">
                            <span><i class="fa fa-clock-o"></i> <?php echo getDateFormat($val_left['created_date'],'14',' ');?></span>
                            <span><?php echo (comment_count($val_left['id'])>0)?comment_count($val_left['id']).'Comments':'';?></span>
                          
                          </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 pro-left">
                          <div class="user-info-image common-dropdown"> <span href="javascript:;" aria-expanded="true" data-toggle="dropdown" class="dropdown-toggle user-info-css"> 
                          <?php echo username_photo_by_id($val_left['user_id']);?>
                            
                            <div class="dropdown-menu collection-user-info-css" role="menu">
                             <a class="bg-new-css" href="javascript:;">
                             <?php echo user_info_id($val_left['user_id']);?>
                              </a>
                               </div>

                            </span> </div>
                        </div>
                      </div>
                    </div>
                  </li>
                 
           <?php
          
     }
?>
<?php
}else
{ 
  echo 'no record found'; 
}
?>        
                 
                                   
              
                </ul>

              </div>
            </div>
            </div>
            
            <div class="col-lg-8 col-md-8 col-sm-12 stories-main-box one-page scrolling-divs">
              <div class="stories-right">





                <div class="stories-main-list">
                    
                    
<?php
if(is_array($res) && !empty($res) )
{
  foreach($res as $val)
   {
  $story_user=user_allinfo_id($val['user_id']);

 ?>
 <div class="stories-list-content common-new" id="story-<?php echo $val['id'];?>">
                    <div class="stories-content-top common-new">
                        <div class="col-lg-1 col-md-1 col-sm-2 voting-css pro-right">
                          <a href="javascript:;" 
                           <?php if($this->session->userdata('user_logged')!=''){?>
                            onclick="increase('2','<?php echo $val['id']?>','<?php echo $this->session->userdata('_current_user_id');?>');"
                            <?php }else{?>
                            data-toggle="modal" data-target="#common-form"
                            <?php }?>
                            class="vote-box active" > <i class="fa fa-caret-up"></i> <span id="numbers_2_<?php echo $val['id']?>"><?php echo vote_count_by_id('2',$val['id'])?></span></a>
                        
                        </div>
                      <div class="col-lg-11 col-md-11 col-sm-10  pro-left">
                        <h4> <?php echo $val['title'];?></h4>
                         <ul>
                              <li class="collection-user">
                                                            <span class="common-card-css"> 
                                                              <?php echo username_photo_by_id($val['user_id']);?>
                                                            
                                                            <div class="collection-user-info-css common-card">
                                                               <div class="common-card-mid"> 
                                                                <a class="bg-new-css" href="javascript:;">
                                                                   <?php echo user_info_id($val['user_id']);?>
                                                              
                                                                </a>
                                                             </div>
                                                            </div>
                                                            
                                                             </span>
                                                        
                                                  </li>
                                                  
                             <li><span class="grey-color">by</span> <a href="javascript:;" class="color-pink"><?php echo $story_user['first_name'].' '.$story_user['last_name'];?></a></li>
                             <li><a href="javascript:;" data-toggle="tooltip" title="Dummy Text!" class="color-blue"><i class="fa fa-twitter"></i> Tweet</a><span class="grey-color"> <?php echo get_days_count_from_dates($val['created_date'],date('Y-m-d')); ?></span> </li>                     
                             <li><a href="javascript:;" rel="#share-main-id" class="share-box-slide color-pink" id="<?php echo $val['id']?>"><i class="fa fa-share"></i> Share</a></li>
                             <li><a href="javascript:;" class="comments-show common-story-section" rel="#comment-target" id="<?php echo $val['id']?>"><i class="fa fa-comment-o"></i> <?php echo (comment_count($val['id'])>0)?comment_count($val['id']).' Comments':' Comments';?></a></li>
                         </ul>
                        
                          
                       
                      </div>
                      
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="story-main-image"> <img src="<?php echo base_url();?>upload/story/<?php echo $val['file_name'];?>" /> </div>
                    
                    </div>  
                    
                    <div class="stories-content-mid common-new">
                        <?php //echo $val['short_desc'];?>
                        <br><br>    
                        <div> <?php echo substr($val['description'],400);?></div>
                      
                        <a class="button see-more-story btn-color" href="javascript:;" id="<?php echo $val['id']?>">Read More</a> 

                    </div>
                    
                    
                    <div class="stories-content-bottom common-new">
                     
                      
                      <div class="stories-bottom-comment common-new">
                        
                  <?php echo comments_data($val['id'],1);?>

                     
                      </div>

                    </div>


                      <div class="common-new comment-textarea">
                                <span id="comment_msg_<?php echo $val['id']?>"></span>
                                   <textarea class="form-control" placeholder="Add a comment....." id="commentsubmit_<?php echo $val['id']?>" ></textarea> <a href="javascript:;" class="enter-text"><i class="fa fa-level-down"></i></a>
                                
                            </div>
                      
                      <div class="load-more common-new"> <a href="javascript:;" rel="#comment-target" class="common-story-section" id="<?php echo $val['id']?>"><i class="fa  fa-arrow-up"></i> View all <?php echo (comment_count($val['id'])>0)?comment_count($val['id']).' Comments':' Comments';?></a> </div>
                   


                  </div>
                                     
<?php
     }
?>
<?php
}else
{ 
  //echo 'No Record Found ';  
}
?> 
                    
              
            
                </div>



              </div>
              
              
              
              
              <div class="comment-div common-new">
               <p>
                 Commenting is limited to those invited by others in the community. <br> You've been added to the waitlist. <br> Questions? Check out our <a href="javascript:;">FAQ</a>
               
               </p>
              </div>
            </div>
            
            
            
          </div>
       </div>
      </section>
      
      
      
     
      
    </div>
    
   
       <!--======  Story Share Section Start ======-->


<div class="common-form-share mCustomScrollbar" id="share-main-id">
                <div class="common-new share-box" id="share_box_section">


                </div>
              </div>



    
    <!--======  Story Main Content Section Start ======-->
    
    <section class="story-main-content-css" >

       
       <div class="scroll-wrap">
         <div class="content-item">              
           
          
         </div>
      </div>
      
    </section>
    
    
    
    
    
      <!--====== Create Story Section Start ======-->
      <section class="create-story-box">
         <i class="fa fa-close"></i>
           <div class="create-story-header">
              <div class="container">
                   <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                       <i class="fa fa-file-photo-o"></i>
                          <h4> Create a Story</h4>
                     
                     </div>
                   
                   </div>
              
              </div>
           </div>
           
           <div class="container">
                <div class="row">
                   <div class="create-story-mid common-new">
                   
                    <div class="create-story-field common-new">
                         <div class="col-lg-12 col-md-12 col-sm-12">
                          <label>Add a title: </label>
                           <input type="text" placeholder="" class="form-control">
                           
                         </div>
                     </div>
                       <div class="create-story-field common-new">
                           <div class="col-lg-12 col-md-12 col-sm-12">
                         <form action="upload.php" id="my-dropzone" class="dropzone">
                                <div class="featured-image">
                                   <i class="fa fa-camera"></i>
                                   <h4>Upload a Picture</h4>
                                   <p>Please Upload atleast one picture to publish this story.</p>
                                   <div class="error-image">No More Files Selected</div>
                                
                                </div>
                             </form>
                        </div>
                      </div>
                    <div class="create-story-field common-new">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <label>Add a description: </label>
                            <textarea id="text-editor-box" name="text-editor-box"></textarea>
                        </div>
                    </div>
                    <div class="create-story-field common-new story-button-css">
                      <div class="col-lg-4 col-sm-4 col-md-4">
                        <button  class="button btn-color">Publish</button>
                      
                        <input type="reset" class="button btn-color btn-green" value="Reset">
                      
                    </div>
    
               </div>
               
              
                </div>
           </div>
           </div>
      </section>
      
      <!--====== Add Story icon Start ======-->
      
      <a href="javascript:;" class="add-story-icon" data-toggle="tooltip" title="Create a story"><i class="fa fa-plus"></i></a>
      
      
  </div>
</div>
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/common/js/jquery-1.11.0.min.js" language="javascript"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/common/js/bootstrap.min.js" language="javascript"></script>

<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/sample.js" language="javascript"></script>  
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/custom.js" language="javascript"></script> 
<script src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/dropzone.js"></script>
<script>

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
      
      
  $('body').on('click', '.share-box-slide',function(e) {    
     
    var story_id=$(this).attr("id");
   
   $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>story/story_share',
      data: {story_id:story_id},
      success:function(response){
       
         $('#share_box_section').html(response);
         $('#share-main-id').addClass('show-share-slide');
         
      }
  });

   
  
    }); 
  

  $('body').on('click', '.story-main-content-css .share-box-slide',function(e) {

         var story_id=$(this).attr("id");
   
   $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>story/story_share',
      data: {story_id:story_id},
      success:function(response){
       
         $('#share_box_section').html(response);
         $('#share-main-id').addClass('story-main-slide');
         
      }
  });

    
    
    }); 
  
  $('body').on('click', '.share-box .close',function(e) {

     $('.common-form-share').removeClass('show-share-slide');
     $('.common-form-share').removeClass('story-main-slide');
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
    var targetLink = $(this).attr('data-target');
      var targetOffset = $(targetLink).offset().top;
  
      $('.stories-main-box').animate({scrollTop: targetOffset - 30}, 1000);
    
  }); 
  
   $('[data-toggle="tooltip"]').tooltip(); 
    
    CKEDITOR.replace( 'text-editor-box' );
    
  
  $('.create-story-box i.fa-close').click(function() {

         $('.create-story-box').css({'right':'-100%'});

    });
  


$('body').on('mouseenter', '.add-story-icon',function(e) {
    $(this).html('<i class="fa fa-pencil"></i>');
});

$('body').on('mouseleave', '.add-story-icon',function(e) {
  $(this).html('<i class="fa fa-plus"></i>');
});

$('body').on('click', '.add-story-icon',function(e) {
  alert("sdfsdfsd");
   $('.create-story-box').css({'right':'0'});
});




 
   Dropzone.options.myDropzone = {
     maxFiles: 1, addRemoveLinks: true, accept: function(file, done) {
    console.log("uploaded");
    done();
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
  


/*==== Story Section Js ====*/


  $('.see-more-story, .common-story-section').click(function(b) {
    
   var story_id=$(this).attr("id");
  
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>story/story_details',
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



      
});


var increase = function(type,id,user_id){
  var span='#number_' + type + '_'+ id;
  var spans='#numbers_' + type + '_'+ id;
  var spanpop='#numberpop_' + type + '_'+ id;
 
  $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>story/increase',
      data: {type:type,id:id,user_id:user_id },
      success:function(response){
         $(span).html(response);
          $(spans).html(response);
           $(spanpop).html(response);
      }
  });

}

var increase_comment = function(type,id,user_id){
  var comment='#comment_' + type + '_'+ id;
  var comments='#comments_' + type + '_'+ id;
  var commentpopup='#commentpopup_' + type + '_'+ id;
 
  $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>story/increase',
      data: {type:type,id:id,user_id:user_id },
      success:function(response){
         $(comment).html(response);
         $(comments).html(response);
          $(commentpopup).html(response);
      }
  });

}



$('.form-control').bind('keypress',function (e) {

if(e.keyCode==13){

  var main_id=$(this).attr("id");

  var key = main_id.split('_');

  var textarea=$('#'+main_id).val();

  var story_id=key['1'];

  var user_id='<?php echo $this->session->userdata("_current_user_id");?>';
   
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>story/comments_submit',
      data: {textarea:textarea,user_id:user_id,story_id:story_id},
      success:function(response){
       
        $('#'+main_id).val('');
         $('#comment_msg_' + key['1']).html(response);
      }
  }); 
  
  }
 



});


  $('body').bind('keypress', '#form-comment',function(e) {

  if(e.keyCode==13){


  var textarea=$('#form-comment').val();

  var story_id=$('#story_id').val();;

  var user_id='<?php echo $this->session->userdata("_current_user_id");?>';
   
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>story/comments_submit',
      data: {textarea:textarea,user_id:user_id,story_id:story_id},
      success:function(response){
       
        $('#form-comment').val('');
         $('#comment_msg_pop').html(response);
      }
  }); 
  
  }
 



});

</script>
 
</body>
</html>
