  <!--======  Story Main Content Section Start ======-->
    
<?php  $sd_user=user_allinfo_id($res['user_id']);
$twitter_url=base_url().'stories/show/'.$res['url_slug'];?>
       <div class="story-main-right">
         <button data-dismiss="modal" class="close back-to-story1" type="button">×</button>
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
                        <a href="<?php echo base_url();?>usersinfo/<?php echo $res['user_id'];?>" target="_blank">  <?php echo username_photo_by_id($res['user_id']);?></a>
                       </div> 
                      <p>by <a href="<?php echo base_url();?>usersinfo/<?php echo $res['user_id'];?>" target="_blank">
                        <?php echo $sd_user['first_name'].' '.$sd_user['last_name'];?></a></p>
                        <p>
                             <span class="meta-left voting-css">

                               <?php  $onclick_pop=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$res['title'],
                                                            'section_type'=>'2',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$res['id'],

                                                    );?>
                              <a href="javascript:;" class="vote-box active" <?php echo onclick_upvote($onclick_pop);?>>
                               <i class="fa fa-caret-up"></i> <span id="numberpop_2_<?php echo $res['id']?>"><?php echo vote_count_by_id('2',$res['id'])?></span></a></span>
                             <span class="meta-right date-css"><i class="fa fa-calendar"></i><?php echo getDateFormat($res['created_date'],'1',' ');?></span> 
                        </p>
                  </div>
                  
                  <div class="user-meta-info common-new">
                     <ul>
                              
                         <li><a class="color-blue" title="" data-toggle="tooltip" target="_blank" href="https://twitter.com/share?url=<?php echo $twitter_url;?>&text=<?php echo $res['title'];?>" data-original-title="<?php echo $res['title'];?>"><i class="fa fa-twitter"></i> Tweet</a></li>                     
                         <li><a class="share-box-slide color-pink share-box-click" rel="#share-main-id" href="javascript:;" id="<?php echo $res['id'];?>"><i class="fa fa-share"></i> Share</a></li>
                         <li><a class="comments-show" href="javascript:;" rel="#comment-target"><i class="fa fa-comment-o"></i> <span class="story_comment_<?php echo $res['id']?>"><?php echo (comment_count_html($res['id'])!='')? comment_count_html($res['id']):' Comment';?><span></a> </li>
                     </ul>
                  
                  
                  </div>
                  
                  
                </div>
                
                <div class="story-nav-button">
                  <div class="back-to-story">
                    <a href="javascript:;">Back to Story</a>
                   </div>
                   
                 <!--   <div class="narrow-button">
                     <a href="javascript:;" class="prev">Previous</a>
                     <a href="javascript:;" class="next">Next</a>
                   </div> -->
                  </div>
              
              </div>
                              
                            </div>
                    
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <div class="story-main-image common-new" style="cursor: default;"> <img src="<?php echo base_url();?>upload/story/<?php echo $res['file_name'];?>" /> </div>
                            
                            </div>  
                    
                            <div class="stories-content-mid common-new"><?php echo $res['description'];?></div>
                    
                    
                            <div class="stories-content-bottom common-new" id="comment-target">
                             
                            
                            <?php echo comments_data($res['id'],'0','pop');?>
                            
                             
                               <div class="bottom-comment-section common-new">
                            
                                <div class="common-new comment-textarea">
                                   <span id="comment_msg_pop"></span>
                                    <textarea class="form-control mention" placeholder="Add a comment....." id="form-comment"></textarea> <a href="javascript:;" class="enter-text mcomment"><i class="fa fa-level-down"></i></a>
                                
                                 </div>
                              
                                
                              </div>

                            </div>
                            
                           

                              <input type="hidden" name="story_id" id="story_id" value="<?php echo $res['id']?>" >
                            
                     </div>
                  
                  </div>
              </div>
          