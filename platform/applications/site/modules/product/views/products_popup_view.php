<?php //trace($collection_list);
                          if(is_array($collection_list) && !empty($collection_list) )
                          {
                            ?>
                                <h5>Related Collections</h5>
                            <?php

                            foreach($collection_list as $collection_list_val)
                             {
                                $col_url=base_url().'collection/'.$collection_list_val->url_slug;
                             
                          ?>

                            <div class="list-common common-new">
                                      
                                  
                                     <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                       <div class="list-vote">

                                        <?php  $onclick_array_view=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$collection_list_val->title,
                                                            'section_type'=>'0',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$collection_list_val->col_id,

                                                    );?>


                                         <a href="javascript:;"  <?php echo onclick_upvote($onclick_array_view);?>><i class="fa fa-caret-up"></i><span id="number_0_<?php echo $collection_list_val->col_id;?>"><?php echo vote_count_by_id('0',$collection_list_val->col_id)?></span></a>
                                       
                                       </div>
                                     
                                     </div>
                                     
                                     <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
                                          <div class="list-top">
                                            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">
                                                <h2><a href="<?php echo $col_url;?>"><?php echo $collection_list_val->title;?></a></h2>
                                                <div><?php echo char_limiter($collection_list_val->description,90);?>&nbsp;</div>
                                          
                                             </div>
                                          
                                          
                                              <div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
                                              
                                                  <div class="list-user-info">
                                                   <ul>
                                                      <li class="collection-list">
                                                      <span data-toggle="dropdown" aria-expanded="true" class="dropdown-toggle"><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/add_collection.png">
                                                         <div class="dropdown-menu add-to-collection-css" role="menu">
                                                                                                                    
                                                          <div class="collection-mid-css">
                                                              <div class="common-collection">
                                                                  <h4>Add to Collection <i class="fa fa-question-circle"></i></h4>
                                                                  <p>  It's time to create<br> your first collection!</p>
                                                                  <p> What about <a href="javascript:;"> Save for later<br> <span>or</span> For fun</a></p>
                                                               </div>
                                                                 
                                                                <div class="success-info">
                                                                  <a class="another-css" href="javascript:;">... or use another name</a>
                                                                  <div style="display:none;" class="collection-add">
                                                                   <input type="text" placeholder="Collection Name" name="">
                                                                   <a class="button button-color" href="javascript:;">Add</a>
                                                                 </div> 
                                                                </div>
                                                  
                                                          </div>
                                                          
                                                          
                                                          </div>                                                     
                                                      </span>
                                                        
                                                      </li>
                                                      
                                                        <li class="collection-user"  >


 <span data-toggle="dropdown" aria-expanded="true" class="dropdown-toggle user-info-css"> 
  <?php echo username_photo_by_id($collection_list_val->user_id);?>

<div role="menu" class="dropdown-menu collection-user-info-css common-card">

<?php echo user_info_id($collection_list_val->user_id);?>

</div>                                   

</span>


<!-- <div class="user-info-image common-dropdown">
<span href="javascript:;" aria-expanded="true" data-toggle="dropdown" class="dropdown-toggle user-info-css"> 
<?php //echo username_photo_by_id($val['user_id']);?>

<div class="dropdown-menu collection-user-info-css common-card" role="menu">                             
<?php //echo user_info_id($val['user_id']);?>                              
</div>

</span> </div> -->


                                                        
                                                    
                                              </li> 

                                                    

                                                      <li class="last">
                                                        <?php if(collection_comment_count($collection_list_val->col_id)>0){?>
                                                        <a href="<?php echo $col_url;?>"><i class="fa fa-comment-o"></i><?php echo collection_comment_count($collection_list_val->col_id); ?></a>
                                                   <?php }else{?>
                                                   <i class="fa "></i>
                                                   <?php }?>
                                                 </li>
                                                   </ul>   
                                                  </div>
                                                
                                              
                                              </div>
                                          
                                          
                                           </div>  
                                           
                                            <?php echo collections_by_products($collection_list_val->col_id,$col_url);?>
                                    
                                         </div>
                                   
                              </div>

<?php }}?>

<script type="text/javascript">
  $(".dropdown-toggle").hover(            
            function() {
              
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).parents('li').toggleClass('open');
                $('.dropdown-menu').css('zIndex', '60');
               // $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).parents('li').toggleClass('open');
               // $('b', this).toggleClass("caret caret-up");                
            });
</script>
                  
                     
                     
