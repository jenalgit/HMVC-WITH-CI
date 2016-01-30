<?php $this->load->view('partials/top_application');?>


<div class="main-container inner-pages">

 
<!--====== Header Section Start ======-->

<div class="main-body">

  <?php $this->load->view('partials/site_header');?>

   

    <div class="main-frame">
    
       <section class="profile-header common-new common-section" style="background-image:url(<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/bg-new.jpg);">
         <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                  <div class="top-content">
                      <div class="col-lg-2 col-md-2 com-sm-2">
                        <?php echo username_photo_by_id($usersinfo->id);?>
                       </div>
                      <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="profile-info">
                        <h3><?php echo $usersinfo->first_name.' '.$usersinfo->last_name;?> <span>#<?php echo $usersinfo->id;?></span></h3>
                          <h4><?php echo $usersinfo->professional_skills;?> </h4>
                          <p><a href="javscript:;"><?php echo username_show($usersinfo->username);?>
                          </a> <a href="javscript:;"><?php echo $usersinfo->website_url;?></a></p>
                        </div>
                      
                      </div>
                  </div>
                
                </div>
                  <div class="col-lg-2 col-sm-2 col-md-2">
                  <?php echo unfollow_follow_btn($usersinfo->id);?>
                </div>
                 
                 
            </div>
         
         </div>
        
       </section>
       
       
       <section class="profile-page-mid common-new common-section" >
        <div class="user-top-bar">
         <div class="container"> 
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <ul class="nav nav-tabs">
                       <li  class="active"><a data-toggle="tab" href="#upvoted"><b><?php echo count($upvoted_story)+count($users_upvote_collection);?></b>Upvoted</a></li>
                        <li><a data-toggle="tab" href="#stories" rel="#bg-change"><b><?php echo count($users_story);?></b>Stories</a></li>
                        <li><a data-toggle="tab" href="#collection"><b><?php echo count($users_collection);?></b>Collection</a></li>
                        <li><a data-toggle="tab" href="#followers"><b><?php echo count($users_follower);?></b>Followers</a></li>
                        <li><a data-toggle="tab" href="#following"><b><?php echo count($users_following);?></b>Following</a></li>
                       
                   </ul>
                  
                  </div>
      
                </div>
            
            </div>   
               
               </div>

               <div class="user-mid-bar" id="bg-change">   
                  <div class="container"> 
                <div class="row">

                    <div class="tab-content">
                
                <div id="upvoted" class="tab-pane fade in active">
                     
                           <ul class="nav tab-menu-css">
                                <li class="active"><a href="#upvoted_collection" data-toggle="tab" aria-expanded="false">Upvoted Collection</a></li>
                                <li><a href="#upvoted_stories" data-toggle="tab" aria-expanded="false" rel="#bg-change">Upvoted Stories</a></li>
                           </ul> 
                      
                  
                      <div class="tab-content">
  
                           <div class="main-collection-list tab-pane fade in active" id="upvoted_collection">
                        
     <?php
      if(is_array($users_upvote_collection) && !empty($users_upvote_collection) )
      {
          foreach($users_upvote_collection as $users_upvote_collection_val)
             {
      ?>

                              <div class="list-common common-new">
                              
                          
                             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                               <div class="list-vote">
                                
                                  <a href="javascript:;"
                            <?php if($this->session->userdata('user_logged')!=''){?>
                            onclick="increase('0','<?php echo $users_upvote_collection_val['id']?>','<?php echo $this->session->userdata('_current_user_id');?>');" 
                            <?php }else{?>
                            data-toggle="modal" data-target="#common-form"
                            <?php }?>
                            ><i class="fa fa-caret-up" ></i><?php echo vote_count_by_id('0',$users_upvote_collection_val['id'])?></a>
                               
                               </div>
                             
                             </div>
                             
                             <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
                                  <div class="list-top">
                                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">
                                        <h2><?php echo $users_upvote_collection_val['title'];?></h2>
                                        <p><?php echo $users_upvote_collection_val['description'];?></p>
                                  
                                     </div>
                                  
                                  
                                      <div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
                                      
                                          <div class="list-user-info">
                                           <ul>
                                              <li class="collection-list">
                                                
                                                <span class="collection-card common-card-css"><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/add_collection.png" />
                                              
                                                  <div  class="add-to-collection-css common-card">
                                                     <div class="common-card-mid">   
                                                        <div class="collection-mid-css">
                                                            <div class="common-collection">
                                                                <h4>Add to Collection <i class="fa fa-question-circle"></i></h4>
                                                                <p>  It's time to create<br> your first collection!</p>
                                                                <p> What about <a href="javascript:;"> Save for later<br> <span>or</span> For fun</a></p>
                                                             </div>
                                                               
                                                              <div class="success-info">
                                                                <a href="javascript:;" class="another-css">... or use another name</a>
                                                                <div class="collection-add" style="display:none;">
                                                                 <input type="text" name="" placeholder="Collection Name">
                                                                 <a href="javascript:;" class="button btn-color">Add</a>
                                                               </div> 
                                                              </div>
                                                
                                                        </div>
                                                        
                                                      </div>  
                                                    </div>
                                              
                                              </span>
                                    
                                                 
                                              
                                              </li>
                                              <li class="collection-user">
                                                        <span class="common-card-css">
                                                         <?php echo username_photo_by_id($users_upvote_collection_val['user_id']);?>
                                                        
                                                        <div class="collection-user-info-css common-card">
                                                           <div class="common-card-mid"> 
                                                           
                                                               <?php echo user_info_id($users_upvote_collection_val['user_id']);?>
                                                           
                                                         </div>
                                                        </div>
                                                        
                                                         </span>
                                                        
                                                    
                                              </li> 
                                              <li class="last"><i class="fa fa-comment-o"></i><?php echo collection_comment_count($users_upvote_collection_val['id']); ?></li>   
                                           </ul>   
                                          </div>
                                        
                                      
                                      </div>
                                  
                                  
                                   </div>  
                                   
                                   <?php echo products_by_collections($users_upvote_collection_val['id'],$users_upvote_collection_val['user_id']);?>
                               
                                 
                                 </div>
                           
                      </div>

                      <?php }}?>
                              
                                                  
                         
                         </div>
                          
                           <div class="main-collection-list tab-pane fade" id="upvoted_stories">
                        
                              
<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
                                <div class="stories-right">
                                <div class="stories-main-list">


  <?php
                    if(is_array($upvoted_story) && !empty($upvoted_story) )
                    {
                        foreach($upvoted_story as $upvoted_story_val)
                              {

                                  $story_user=user_allinfo_id($upvoted_story_val['user_id']);

                    ?>
                              <div class="stories-list-content common-new">
                                <div class="stories-content-top common-new">
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 voting-css pro-left">
                                      <a class="vote-box active" href="javascript:;" <?php if($this->session->userdata('user_logged')!=''){?>
                            onclick="increase('2','<?php echo $upvoted_story_val['section_type_id']?>','<?php echo $this->session->userdata('_current_user_id');?>');"
                            <?php }else{?>
                            data-toggle="modal" data-target="#common-form"
                            <?php }?>> <i class="fa fa-caret-up"></i> <span id="numberupvote_2_<?php echo $upvoted_story_val['section_type_id'];?>"><?php echo vote_count_by_id('2',$upvoted_story_val['section_type_id'])?></span></a>
                                    
                                    </div>
                                  <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 top-short-story-css  pro-left">
                                    <h4> <?php echo $upvoted_story_val['title'];?></h4>
                                     <ul>
                                          <li class="collection-user">
                                                                     <?php echo username_photo_by_id($upvoted_story_val['user_id']);?>
                                                                        
                                                                        <div class="collection-user-info-css common-card">
                                                                           <div class="common-card-mid"> 
                                                                           
                                                                                <?php echo user_info_id($upvoted_story_val['user_id']);?> 
                                                                           
                                                                         </div>
                                                                        </div>
                                                                        
                                                                         </span>
                                                                    
                                                              </li>
                                                              
                                         <li><span class="grey-color">by</span> <a class="color-pink" href="<?php echo base_url();?>usersinfo/<?php echo $story_user['id'];?>" target="_blank"><?php echo $story_user['first_name'].' '.$story_user['last_name'];?></a></li>
                                         <li><a class="color-blue" title="" data-toggle="tooltip" href="javascript:;" data-original-title="Dummy Text!"><i class="fa fa-twitter"></i> Tweet</a><span class="grey-color"> <?php echo get_days_count_from_dates($story_user['updated_at'],date('Y-m-d h:i')); ?></span> </li>                     
                                         <li><a class="share-box-slide color-pink" rel="#share-main-id" href="javascript:;" id="<?php echo $upvoted_story_val['section_type_id']?>"><i class="fa fa-share"></i> Share</a></li>
                                         <li><a rel="#comment-target" class="comments-show common-story-section" href="javascript:;" id="<?php echo $upvoted_story_val['section_type_id']?>"><i class="fa fa-comment-o"></i><?php echo (comment_count($upvoted_story_val['id'])>0)?comment_count($upvoted_story_val['id']).' Comments':' Comments';?></a></li>
                                     </ul>
                                    
                                      
                                   
                                  </div>
                                  
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <div class="story-main-image common-new"><img src="<?php echo base_url();?>upload/story/<?php echo $upvoted_story_val['file_name'];?>" /> </div>

                                
                                </div>  
                                
                                <div class="stories-content-mid common-new"> 
                                  <?php echo substr($upvoted_story_val['description'],0,200);?><br>
                                  <a href="javascript:;" class="button see-more-story btn-color" id="<?php echo $upvoted_story_val['section_type_id']?>">Read More</a> 
                                </div>

                                
                                
                                
                                <div class="stories-content-bottom common-new">
                                 
                                  
                                  <div class="stories-bottom-comment common-new">
                                    
                                     <?php //echo comments_data($upvoted_story_val['id'],1,'');?>
                                        
                                                                 
                                 
                                  </div>
                                  
                                  <div class="common-new comment-textarea">
                                          <span id="comment_msg_<?php echo $upvoted_story_val['id']?>"></span>   
                                               <textarea placeholder="Add a comment....." class="form-control from-comment" id="commentsubmit_<?php echo $upvoted_story_val['id']?>"></textarea> <a class="enter-text" href="javascript:;"><i class="fa fa-level-down"></i></a>
                                            
                                        </div>
                                  
                                  <div class="load-more common-new"> <a class="common-story-section" rel="#comment-target" href="javascript:;" id="<?php echo $upvoted_story_val['section_type_id']?>"><i class="fa  fa-arrow-up"></i> View all <?php echo (comment_count($upvoted_story_val['id'])>0)?comment_count($upvoted_story_val['id']).' Comments':' Comments';?></a> </div>
                                </div>
                              </div>
                              
                              <?php }}?>

                           
                       </div>
                               
                               </div>

          
                         
                         </div>
                         
                    </div>
               </div>
             </div>
                




                 <div id="stories" class="tab-pane fade">




                  <div class="grid-view">
                         <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1">
                            <div class="grid-div-top common-new">
                             <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 pull-right">
                               <div class="store-filter-right">
                                <ul>
                                  <li class="active" id="gridli"><a href="javascript:;" id="gridlink"><i class="fa fa-th"></i></a></li>
                                  <li id="listli"><a href="javascript:;" id="listlink"><i class="fa fa-list"></i></a></li>
                                
                                </ul>
                               
                                 
                               
                               </div>
            
                    </div>
                            </div>

                           <div class="grid-div-mid common-new" id="divgrid">

                    <?php
                    if(is_array($users_story) && !empty($users_story) )
                    {
                        foreach($users_story as $users_story_val)
                              {?>
                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pro-grid">
                                <a class="see-more-story" href="javascript:;" id="<?php echo $users_story_val['id']?>" title="<?php echo $users_story_val['title'];?>">
                                 <img src="<?php echo base_url();?>upload/story/<?php echo $users_story_val['file_name'];?>" />
                                 <h4><?php echo char_limiter($users_story_val['title'],70);?></h4>
                                </a>
                             </div>
                             
                             <?php
                                   }

                                  }
                              ?>
                    
                           
                           </div>
                         
                         </div>
                       
                       </div>




<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1" style="display:none;" id="divlist">
                                <div class="stories-right">
                                <div class="stories-main-list">

                                  <?php
                    if(is_array($users_story) && !empty($users_story) )
                    {
                        foreach($users_story as $users_story_val)
                              {
                                  $story_user=user_allinfo_id($users_story_val['user_id']);

                    ?>
                              <div class="stories-list-content common-new">
                                <div class="stories-content-top common-new">
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 voting-css pro-left">
                                      <a class="vote-box active" href="javascript:;" <?php if($this->session->userdata('user_logged')!=''){?>
                            onclick="increase('2','<?php echo $users_story_val['id']?>','<?php echo $this->session->userdata('_current_user_id');?>');"
                            <?php }else{?>
                            data-toggle="modal" data-target="#common-form"
                            <?php }?>> <i class="fa fa-caret-up"></i> <span id="numbers_2_<?php echo $users_story_val['id']?>"><?php echo vote_count_by_id('2',$users_story_val['id'])?></span></a>
                                    
                                    </div>
                                  <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 top-short-story-css  pro-left">
                                    <h4> <?php echo $users_story_val['title'];?></h4>
                                     <ul>
                                          <li class="collection-user">
                                                                     <?php echo username_photo_by_id($users_story_val['user_id']);?>
                                                                        
                                                                        <div class="collection-user-info-css common-card">
                                                                           <div class="common-card-mid"> 
                                                                          
                                                                                <?php echo user_info_id($users_story_val['user_id']);?> 
                                                                          </div>
                                                                        </div>
                                                                        
                                                                         </span>
                                                                    
                                                              </li>
                                                              
                                         <li><span class="grey-color">by</span> <a class="color-pink" href="<?php echo base_url();?>usersinfo/<?php echo $story_user['id'];?>" target="_blank"><?php echo $story_user['first_name'].' '.$story_user['last_name'];?></a></li>
                                         <li><a class="color-blue" title="" data-toggle="tooltip" href="javascript:;" data-original-title="Dummy Text!"><i class="fa fa-twitter"></i> Tweet</a><span class="grey-color"> <?php echo get_days_count_from_dates($users_story_val['updated_at'],date('Y-m-d 00:00')); ?></span> </li>                     
                                         <li><a class="share-box-slide color-pink" rel="#share-main-id" href="javascript:;"  id="<?php echo $users_story_val['id']?>"><i class="fa fa-share"></i> Share</a></li>
                                         <li><a rel="#comment-target" class="comments-show common-story-section" href="javascript:;" id="<?php echo $users_story_val['id']?>"><i class="fa fa-comment-o"></i><?php echo (comment_count($users_story_val['id'])>0)?comment_count($users_story_val['id']).' Comments':' Comments';?></a></li>
                                     </ul>
                                    
                                      
                                   
                                  </div>
                                  
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <div class="story-main-image common-new"><img src="<?php echo base_url();?>upload/story/<?php echo $users_story_val['file_name'];?>" /> </div>

                                
                                </div>  
                                
                                <div class="stories-content-mid common-new"> 
                                  <?php echo substr($users_story_val['description'],0,200);?><br>
                                  <a href="javascript:;" class="button see-more-story btn-color" id="<?php echo $users_story_val['id']?>">Read More</a> 
                                </div>

                                
                                
                                
                                <div class="stories-content-bottom common-new">
                                 
                                  
                                  <div class="stories-bottom-comment common-new">
                                    
                                     <?php //echo comments_data($users_story_val['id'],1,'');?>
                                        
                                                                 
                                 
                                  </div>
                                  
                                  <div class="common-new comment-textarea">
                                          <span id="comment_msg_<?php echo $users_story_val['id']?>"></span>   
                                               <textarea style="color:#000" placeholder="Add a comment....." class="form-control from-comment" id="commentsubmit_<?php echo $users_story_val['id']?>"></textarea> <a class="enter-text" href="javascript:;"><i class="fa fa-level-down"></i></a>
                                            
                                        </div>
                                  
                                  <div class="load-more common-new"> <a class="common-story-section" rel="#comment-target" href="javascript:;" id="<?php echo $users_story_val['id']?>"><i class="fa  fa-arrow-up"></i> View all <?php echo (comment_count($users_story_val['id'])>0)?comment_count($users_story_val['id']).' Comments':' Comments';?></a> </div>
                                </div>
                              </div>
                              
                              <?php }}?>


                             
                                                           
                            </div>
                       </div>
                               
                               </div>






                  
                 </div>
                
                <div id="collection" class="tab-pane fade">
                     
                         <h4><?php echo $usersinfo->first_name.' '.$usersinfo->last_name;?> Collection</h4>
                      
                  
                      <div class="tab-content">
  
                           <div class="main-collection-list tab-pane fade in active" id="self_collection">
                        
                                        <?php
      if(is_array($users_collection) && !empty($users_collection) )
      {
          foreach($users_collection as $users_collection_val)
             {
      ?>
                              <div class="list-common common-new">
                                      
                                  
                                     <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                       <div class="list-vote">
                                          <a href="javascript:;" 
                                           <?php if($this->session->userdata('user_logged')!=''){?>
                             onclick="increase('0','<?php echo $users_collection_val['id']?>','<?php echo $this->session->userdata('_current_user_id');?>');"
                            <?php }else{?>
                            data-toggle="modal" data-target="#common-form"
                            <?php }?>
                            ><i class="fa fa-caret-up" ></i><span id="number_0_<?php echo $users_collection_val['id']?>"><?php echo vote_count_by_id('0',$users_collection_val['id'])?></span></a>
                                 
                                       </div>
                                     
                                     </div>
                                     
                                     <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
                                          <div class="list-top">
                                            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">
                                                <h2><?php echo $users_collection_val['title'];?></h2>
                                                <p><?php echo $users_collection_val['description'];?></p>
                                          
                                             </div>
                                          
                                          
                                              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
                                              
                                                  <div class="list-user-info">
                                                   <ul>
                                                      <li class="collection-list"><a href="javascript:;" class="dropdown-toggle" aria-expanded="true" data-toggle="dropdown"><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/add_collection.png" /></a>
                                                        <div role="menu" class="dropdown-menu add-to-collection-css">
                                                            
                                                            <div class="collection-mid-css">
                                                                <div class="common-collection">
                                                                    <h4>Add to Collection <i class="fa fa-question-circle"></i></h4>
                                                                    <p>  It's time to create<br> your first collection!</p>
                                                                    <p> What about <a href="javascript:;"> Save for later<br> <span>or</span> For fun</a></p>
                                                                 </div>
                                                                   
                                                                  <div class="success-info">
                                                                    <a href="javascript:;" class="another-css">... or use another name</a>
                                                                    <div class="collection-add" style="display:none;">
                                                                     <input type="text" name="" placeholder="Collection Name">
                                                                     <a href="javascript:;" class="button button-color">Add</a>
                                                                   </div> 
                                                                  </div>
                                                    
                                                            </div>
                                                            
                                                            
                                                            </div>
                                            
                                            
                                                         
                                                      
                                                      </li>
                                                      <li class="collection-user">
                                                                <a href="javascript:;" class="dropdown-toggle" aria-expanded="true" data-toggle="dropdown"> <?php echo username_photo_by_id($users_collection_val['user_id']);?> </a>
                                                                <div class="dropdown-menu collection-user-info-css" role="menu">
                                                                   
                                                                   <?php echo user_info_id($users_collection_val['user_id']);?>
                                                                    
                                                                </div>
                                                            
                                                      </li> 
                                                      <li class="last"><i class="fa fa-comment-o"></i><?php echo collection_comment_count($users_collection_val['id']); ?></li>   
                                                   </ul>   
                                                  </div>
                                                
                                              
                                              </div>
                                          
                                          
                                           </div>  
                                           
                                           <?php echo products_by_collections($users_collection_val['id'],$users_collection_val['user_id']);?>
                                         
                                         
                                         </div>
                                   
                              </div>
                              
                             <?php }}?>                              
                         
                         </div>
                         
                    </div>
                </div>
                
                <div id="followers" class="tab-pane fade watchers-section">
                   
                   <?php
      if(is_array($users_follower) && !empty($users_follower) )
      {
          foreach($users_follower as $users_follower_val)
             {
      ?>
                       <div class="main-watchers">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                          <div class="watchers-left">
                            <?php echo username_photo_by_id($users_follower_val['id']);?>
                          </div>
                          
                        
                        </div> 
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                          <div class="watcher-panel">
                          <div class="watcher-panel-inner">
                              <div class="watchers-left-panel">
                                <h4><?php echo $users_follower_val['first_name'].' '.$users_follower_val['last_name'];?><span><a href="javascript:;"><?php echo username_show($users_follower_val['username']);?></a></span></h4>
                                <div class="place-name"><?php echo $users_follower_val['professional_skills'];?></div>
                                <div class="content-watchers"><?php echo $users_follower_val['website_url'];?></div>
                              </div>
                              
                              <div class="watchers-right-panel">
                               <?php echo products_by_watchers($users_follower_val['id']);?>
                                
                                
                              </div>
                              
                             </div> 
                          
                          <div class="watchers-icons">
                             <ul>
                               
                               <li><a href="javascript:;"><i class="fa fa-plus"></i></a></li>
                               <li><b><?php echo follower_count($users_follower_val['id']);?></b> Followers</li>
                               <li><a href="javascript:;"><i class="fa fa-star-o"></i></a></li>
                               <li><b><?php echo upvote_count($users_follower_val['id']);?></b> Upvoted</li>
                             </ul>
                             </div>
                            
                        </div>
                          
                        </div>  
                       </div>                        
                     <?php }}else{  echo '<p style="text-align:center;"><b>Be the First one follow '.$usersinfo->first_name.' '.$usersinfo->last_name."</b></p>"; }?>                      
                      
                       
                  
                </div>
                
                
                <div id="following" class="tab-pane fade">
                  
                     <?php
      if(is_array($users_following) && !empty($users_following) )
      {
          foreach($users_following as $users_following_val)
             {
      ?>
                       <div class="main-watchers">
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                              <div class="watchers-left">
                                <?php echo username_photo_by_id($users_following_val['id']);?>
                             </div>
                              
                            
                            </div> 
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                              <div class="watcher-panel">
                              <div class="watcher-panel-inner">

                                  <div class="watchers-left-panel">
                                <h4><?php echo $users_following_val['first_name'].' '.$users_following_val['last_name'];?><span><a href="javascript:;"><?php echo username_show($users_following_val['username']);?></a></span></h4>
                                <div class="place-name"><?php echo $users_following_val['professional_skills'];?></div>
                                <div class="content-watchers"><?php echo $users_following_val['website_url'];?></div>
                              </div>

                                  <div class="watchers-right-panel">
                                     <?php echo products_by_watchers($users_following_val['id']);?>
                                    
                                    
                                  </div>
                                  
                                 </div> 
                              
                              <div class="watchers-icons">
                                 <ul>
                                   
                                   <li><a href="javascript:;"><i class="fa fa-plus"></i></a></li>
                                   <li><b><?php echo follower_count($users_following_val['id']);?></b> Followers</li>
                                   <li><a href="javascript:;"><i class="fa fa-star-o"></i></a></li>
                                   <li><b><?php echo upvote_count($users_following_val['id']);?></b> Upvoted</li>
                                 </ul>
                                
                                </div>
                                
                            </div>
                              
                            </div>  
                           </div> 
                       
                     <?php }}else{  echo '<p style="text-align:center;"><b>'.$usersinfo->first_name.' '.$usersinfo->last_name." is not following anyone</b></p>"; }?>
                  
                </div>
              </div>
               
             </div> 
         </div>
       
       </div>
       </section>
        
            
        
        <?php $this->load->view('partials/site_footer');?> 
        
      
    
    </div>   
    

    
     
     
</div>  
 
 
 </div>


<?php $this->load->view('partials/bottom_application');?>
