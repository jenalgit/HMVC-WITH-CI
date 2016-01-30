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
            <!-- <div class="new-strip-css">
             <ul>
                <li class="active"><a href="javascript:;">Latest</a></li>
                <li><a href="javascript:;">Trending</a></li>
                <li><a href="javascript:;">Must Read</a></li>
             </ul>
            </div> -->
            <span style="display:none" id="top_date"><?php echo get_dates_show($top_date,date("Y-m-d h:i"));?></span>
  <h2 class="list-view-fake-header"><?php echo get_dates_show($top_date,date("Y-m-d h:i"));?></h2>
     
              <div class="stories-left common-new one-page">
                 <ul class="contact-user-list" >
    <?php
if(is_array($res_left) && !empty($res_left) )
{   

  $i=1;
  $l=1;
  $previous_date = -1;
  $number_days=0;
  foreach($res_left as $val_left)
   {
        $date = new DateTime($val_left['updated_at']);
        $current_date = $date->format('Y-m-d');
        if(($previous_date != $current_date)){
$display_none='';
          if($i==1){$display_none='style="display:none"';}
        echo '<h2 class="list-view-header" id="date_'.$i.'" '.$display_none.'>'.get_dates_show($val_left['updated_at'],date("Y-m-d")).'</h2>';
        $number_days++;  
         $i++;
        } 
    
    $previous_date = $current_date;
 ?>  

                     
                   <li  data-target="#story-<?php echo $l;?>"  class="stories-list-css <?php echo ($l==1)?'active':'';?>">
                    <div class="stories-list">
                      <div class="col-lg-2 col-md-2 col-sm-4  pro-left">
                        <div class="list-vote"> 
                          <?php  $onclick_left=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$val_left['title'],
                                                            'section_type'=>'2',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$val_left['id'],

                                                    );?>
                          <a href="javascript:;" <?php echo onclick_upvote($onclick_left);?> >
                             <i class="fa fa-caret-up"></i> <span id="number_2_<?php echo $val_left['id']?>"><?php echo vote_count_by_id('2',$val_left['id'])?></span></a> </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 pro-right  pro-left">
                        <div class="col-lg-10 col-md-10 col-sm-10   pro-left">
                          <div class="story-title-left"><?php echo char_limiter($val_left['title'],70);?></div>
                          <div class="story-left-bottom">
                            <span><i class="fa fa-clock-o"></i> <?php echo getDateFormat($val_left['updated_at'],'14',' ');?></span>
                            <span class="story_comment_<?php echo $val_left['id']?>"><?php echo comment_count_html($val_left['id']);?></span>
                          
                          </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 pro-left">
                          <div class="user-info-image common-dropdown">
                           <span href="javascript:;" aria-expanded="true" data-toggle="dropdown" class="dropdown-toggle user-info-css"> 
                          <?php echo username_photo_by_id($val_left['user_id']);?>
                            
                            <div class="dropdown-menu collection-user-info-css" role="menu">                             
                             <?php echo user_info_id($val_left['user_id']);?>                              
                               </div>

                            </span> </div>
                        </div>
                      </div>
                    </div>
                  </li>
                 
           <?php
       $l++;   
     }
?>
<?php

}else
{ 
  echo 'no record found'; 
}
?>        </ul>
            </div>
            </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 stories-main-box one-page scrolling-divs">
           <div class="stories-right">
                <div class="stories-main-list">
                    
<?php
if(is_array($res) && !empty($res) )
{

   $r=1;
  foreach($res as $val)
   {
   
  $story_user=user_allinfo_id($val['user_id']);
$twitter_url=base_url().'stories/show/'.$val['url_slug'];
 ?>
 <div class="stories-list-content common-new" id="story-<?php echo $r;?>">
                    <div class="stories-content-top common-new">
                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 voting-css pro-right">
                               <?php  $onclick_right=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$val['title'],
                                                            'section_type'=>'2',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$val['id'],

                                                    );?>

                          <a href="javascript:;" <?php echo onclick_upvote($onclick_right);?> class="vote-box" > <i class="fa fa-caret-up"></i> <span id="numbers_2_<?php echo $val['id']?>"><?php echo vote_count_by_id('2',$val['id'])?></span></a>
                        
                        </div>
                      <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 top-short-story-css  pro-left">
                        <h4 class="see-more-story" id="<?php echo $val['id'].'_'.$val['url_slug']?>"> <?php echo $val['title'];?></h4>
                         <ul>
                            <li >

                            <div class="user-info-image common-dropdown">
                           <span href="javascript:;" aria-expanded="true" data-toggle="dropdown" class="dropdown-toggle user-info-css"> 
                          <?php echo username_photo_by_id($val['user_id']);?>
                            
                            <div class="dropdown-menu collection-user-info-css common-card" role="menu">                             
                             <?php echo user_info_id($val['user_id']);?>                              
                               </div>

                            </span> </div>

                            </li>                                                  
                             <li><span class="grey-color">by</span> <a href="<?php echo base_url();?>usersinfo/<?php echo $val['user_id'];?>" target="_blank" class="color-pink"><?php echo $story_user['first_name'].' '.$story_user['last_name'];?></a></li>
                             <li><a href="https://twitter.com/share?url=<?php echo $twitter_url;?>&text=<?php echo $val['title'];?>" target="_blank" data-toggle="tooltip" title="<?php echo $val['title'];?>" class="color-blue"><i class="fa fa-twitter"></i> Tweet</a><span class="grey-color"> <?php echo get_days_count_from_dates($val['updated_at'],date('Y-m-d')); ?></span> </li>                     
                             <li><a href="javascript:;" rel="#share-main-id" class="share-box-slide color-pink" id="<?php echo $val['id']?>"><i class="fa fa-share"></i> Share</a></li>
                             <li><a href="javascript:;" class="common-story-section foo" rel="#comment-target" id="<?php echo $val['id'].'_'.$val['url_slug']?>"><i class="fa fa-comment-o"></i> <span class="story_comment_<?php echo $val['id']?>"><?php echo (comment_count_html($val['id'])!='')? comment_count_html($val['id']):' Comment';?><span></a></li>
                         </ul>                      
                      </div>                      
                    </div>                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="story-main-image see-more-story"  id="<?php echo $val['id'].'_'.$val['url_slug']?>"> <img src="<?php echo base_url();?>upload/story/<?php echo $val['file_name'];?>" /> </div>
                    
                    </div>  
                    
                    <div class="stories-content-mid common-new">
                        
                       <div> <?php 

                        $string = strip_tags($val['description']);

                        $string_dt=str_replace(array("\r\n", "\r", "\n","'","’","&nbsp;"), ' ', $string);

                        if($string_dt!=''){
                          echo substr($string_dt,0,200);
                         if (strlen($string_dt) > 201) { echo '...';}
                        }?>
                        </div>
                      <?php if (strlen($string_dt) > 201) {?>
                       <div class="text-center"> <a class="button see-more-story btn-color" href="javascript:;" id="<?php echo $val['id'].'_'.$val['url_slug']?>">Read More</a> </div>
                        <?php }?>

                    </div>                                       
                    <div class="stories-content-bottom common-new">                     
                      <div class="stories-bottom-comment common-new" id='comment_data_main'> 

                        <!-- COMMENT SECTION START -->

                  <?php echo comments_data($val['id'],1,'');?>       

                  <!-- COMMENT SECTION END -->              
                      </div>

                             <div class="common-new comment-textarea">
                                <span id="comment_msg_<?php echo $val['id']?>"></span>
                                   <textarea class="form-control from-comment mention" placeholder="Add a comment....." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Add a comment.....'" id="commentsubmit_<?php echo $val['id']?>" ></textarea> <a href="javascript:;" class="enter-text"><i class="fa fa-level-down"></i></a>
                              
                            </div>

                              
                      <div class="load-more common-new"> <a href="javascript:;" rel="#comment-target" class="common-story-section foo_<?php echo $val['id'];?>" id="<?php echo $val['id'].'_'.$val['url_slug']?>"> <?php if(comment_count($val['id'])>0){?> <i class="fa  fa-arrow-up"></i>  View all <span class="story_comment_<?php echo $val['id']?>"><?php echo comment_count_html($val['id']);?></span> <?php }?></a> </div>
                   

                    </div>
               
                    
                   


                  </div>
                                     
<?php
     $r++;
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
             <!--  <div class="comment-div common-new">
               <p>
                Commenting is limited to those invited by others in the community. <br> You've been added to the waitlist. <br> Questions? Check out our <a href="javascript:;">FAQ</a>
               </p>
              </div> -->
            </div>
          </div>
       </div>
      </section>
      
      
      
     
      
    </div>
    
    <!--====== Create Story Section Start ======-->
      <section class="create-story-box">
        
           <div class="create-story-header">
              <div class="container">
                   <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                       <i class="fa fa-file-photo-o"></i>
                          <h4> Create a Story</h4>                     
                     </div>  
                      <i class="fa fa-close"></i>                 
                   </div>              
              </div>
           </div>     
           <div class="common-new">      
           <div class="container">
                <div class="row">
                   <div class="create-story-mid common-new">                   
                    <div class="create-story-field common-new"><span id="story_submit_thk" style="font-size: 16px;color: rgb(865, 0, 1);padding-left:344px"></span>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                          <label>Title: </label>
                           <input type="text" id="story_title" placeholder="Story Title" class="form-control">                           
                         </div>
                     </div>
                       <div class="create-story-field common-new">
                           <div class="col-lg-12 col-md-12 col-sm-12">
                         <form action="<?php echo base_url();?>stories/cover_image" id="my-dropzone" class="dropzone">
                          <div class="error-image">You can't select more files</div>   
                                <div class="featured-image">
                                   <i class="fa fa-camera"></i>
                                   <h4>Upload a Picture</h4>
                                                                
                                </div>
                             </form>
                        </div>
                      </div>
                    <div class="create-story-field common-new">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <label>Description: </label>
                            <textarea id="text-editor-box" name="text-editor-box1"></textarea>
                        </div>
                    </div>
                    <div class="create-story-field common-new story-button-css">
                      <div class="col-lg-4 col-sm-6 col-md-4">
                        <button  class="button btn-color" id="story_submit">Publish</button>                      
                        <input type="button" class="button btn-color btn-green" id="story_reset" onclick="resetStory();" value="Reset">                      
                    </div>    
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
<?php $this->load->view('partials/bottom_application');?>


