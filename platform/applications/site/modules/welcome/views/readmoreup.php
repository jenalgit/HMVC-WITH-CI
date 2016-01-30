                          
<?php
      if(is_array($users_collection) && !empty($users_collection) )
      {
		  foreach($users_collection as $key=>$collection_landing)
             {
				
           ?>
                    <!-- Collection list -->
                  
       <section class="landing-page-css common-new common-section divider-list" >
                        <div class="container">
                            <div class="row">
                                <div class="main-collection-list">
                                    <div class="today-date col-lg-12 col-md-12 col-sm-12"><?php echo get_dates_day($key,date("Y-m-d"));?>
                                    </div>

                                    <div class="collection-item-list">
                                       <?php
      if(is_array($collection_landing) && !empty($collection_landing) )
      {
        
		  foreach($collection_landing as  $users_collection_val)
             {
      ?>
                              <div class="list-common common-new" >
                                      
                                  
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
                    <h2><a href="<?php echo $this->config->item('link_base_url'); ?>collection/<?php echo $users_collection_val['url_slug'];?>"><?php echo $users_collection_val['title'];?></a></h2>
                                               <p><?php echo $users_collection_val['tag_line'];?></p>
                                          
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
                   <span data-toggle="dropdown" aria-expanded="true" class="dropdown-toggle user-info-css"> 
 <?php echo username_photo_by_id($users_collection_val['user_id']);?>

<div role="menu" class="dropdown-menu collection-user-info-css common-card">

<?php echo user_info_id($users_collection_val['user_id']);?>

</div>                                  

</span>
                                                      </li> 
               <li class="last"><i class="fa fa-comment-o"></i> <?php echo comment_count_collection($users_collection_val['id']);?> </li>    
                                                   </ul>   
                                                  </div>
                                                
                                              
                                              </div>
                                           </div>  
                                           <?php echo products_collections($users_collection_val['id']);?>          
                                         </div>
                                   
                              </div>
                              
                             <?php }}?>                              
                             
                             
                                    </div> 

                                </div>
                            </div>
                        </div>
                    </section>
                  
                 <?php      }   } ?> 