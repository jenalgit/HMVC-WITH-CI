<?php $this->load->view('partials/top_application');?>



<div class="main-container inner-pages one-page">

  <?php $this->load->view('partials/site_left');?>
  
  <!--====== Header Section Start ======-->
  
  <div class="main-body one-page">

  <?php $this->load->view('partials/site_header');?>

    <div class="main-frame one-page">



    <section class="story-main-content-css story-main-content-css-show story-details">
    
       <div class="scroll-wrap">
         <div class="content-item content-item-show">
    <?php  $sd_user=user_allinfo_id($res['user_id']);
$twitter_url=base_url().'stories/show/'.$res['url_slug'];
    ?>
              
              
              <div class="story-main-right">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="stories-list-content common-new">
                            <div class="stories-content-top common-new">
                                
                              <div class="col-lg-12 col-md-12 col-sm-12  pro-left">
                                
                                <h4 style="cursor: default;"><?php echo $res['title'];?></h4>
                                 
                              </div>
                              
                              <div class="story-main-left">
                <div class="col-lg-12 col-md-12 col-sm-12 main-info-css">
                  <div class="story-con-user common-new">
                 
                      <div class="story-con-img">
                        <a href="<?php echo base_url();?>usersinfo/<?php echo $res['user_id'];?>" target="_blank"><?php echo username_photo_by_id($res['user_id']);?></a>
                       </div>
                      <p>by <a href="<?php echo base_url();?>usersinfo/<?php echo $res['user_id'];?>" target="_blank"><?php echo $sd_user['first_name'].' '.$sd_user['last_name'];?></a></p>
                        <p>
                             <span class="meta-left voting-css">

                               <?php  $onclick_pop=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$res['title'],
                                                            'section_type'=>'2',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$res['id'],

                                                    );?>
                                                    
                              <a class="vote-box active" href="javascript:;" <?php echo onclick_upvote($onclick_pop);?>> 
                            <i class="fa fa-caret-up"></i> <span id="numberpop_2_<?php echo $res['id']?>"><?php echo vote_count_by_id('2',$res['id'])?></a></span>
                             <span class="meta-right date-css"><i class="fa fa-calendar"></i><?php echo getDateFormat($res['created_date'],'1',' ');?></span> 
                        </p>
                  </div>
                  
             <div class="user-meta-info common-new">
                     <ul>
                              
                         <li><a class="color-blue" title="" data-toggle="tooltip" target="_blank" href="https://twitter.com/share?url=<?php echo $twitter_url;?>&text=<?php echo $res['title'];?>" data-original-title="<?php echo $res['title'];?>"><i class="fa fa-twitter"></i> Tweet</a></li>                     
                         <li><a class="share-box-click color-pink" rel="#share-main-id" href="javascript:;" id="<?php echo $res['id'];?>"><i class="fa fa-share"></i> Share</a></li>
                         <li> <a class="comments-show" href="javascript:;" rel="#comment-target"> <i class="fa fa-comment-o"></i> <span class="story_comment_<?php echo $res['id']?>"><?php echo (comment_count_html($res['id'])!='')? comment_count_html($res['id']):' Comment';?></span></a></li>
                     </ul>
                  
                  
                  </div>
                  
                  
                </div>
                
               
              
              </div>
                              
                            </div>
                    
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <div class="story-main-image common-new" style="cursor: default;"> <img src="<?php echo base_url();?>upload/story/<?php echo $res['file_name'];?>" /> </div>
                            
                            </div>  
                    
                              <div class="stories-content-mid common-new">
                                 <?php echo $res['description'];?>
                      
                      
                    </div>
                    
                    
                            <div id="comment-target" class="stories-content-bottom common-new">
                             
                              <div class="stories-bottom-comment common-new">
                                <?php //$this->load->helper(array('usersinfo/usersinfo'));
                                  echo comments_data($res['id'],0,'pop');?>
                                    
                                </div>




                              <div class="stories-bottom-comment common-new">
                                
                                    
                               <div class="bottom-comment-section common-new">
                              <form>
                                <div class="common-new comment-textarea">
                                   <span id="comment_msg_pop"></span>
                                    <textarea class="form-control mention" placeholder="Add a comment....." id="form-comment"></textarea> <a href="javascript:;" class="enter-text"><i class="fa fa-level-down"></i></a>
                                <input type="hidden" name="story_id" id="story_id" value="<?php echo $res['id']?>" >
                                 </div>
                              </form>
                              
                                <!-- <div class="load-more common-new"> <a href="javascript:;"><i class="fa  fa-arrow-up"></i> View all <?php //echo (comment_count($res['id'])>0)?comment_count($res['id']).' Comments':' Comments';?></a> </div>
                               -->
                              </div>
                            </div>
                            
                            
                     </div>
                  
                  </div>
              </div>
          
          
         </div>
      </div>
      </div>
    </section>
      
      
      
     
      
    </div>
    
  
    
    
      
  <?php $this->load->view('partials/site_footer');?>    
            
  </div>



</div>

<?php $this->load->view('partials/bottom_application');?>
