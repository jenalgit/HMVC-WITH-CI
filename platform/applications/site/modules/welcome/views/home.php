<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


     <?php $this->load->view('partials/top_application');?>

<style>
.btn-success  {
	margin-bottom:1% !important; 
    margin-left: 50% !important;
}
</style>
<link href="http://10.1.1.27/curatigo-design/assets/common/css/jquery-ui.css" type="text/css" rel="stylesheet">
        <div class="main-container inner-pages">
            <?php $this->load->view('partials/site_left'); ?>

            <!--====== Header Section Start ======-->

            <div class="main-body">

                <?php $this->load->view('partials/site_header'); ?>

                <div class="main-frame">
                    
                    <!-- Collection list header -->
                    <section class="product-single-header common-new common-section common-header-css" style=" background-image:url(<?php echo $this->config->item('link_base_url'); ?>assets/curatigo/images/header_banner_collection-hero-hipster-kitty.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="top-content">
                                        <h4>Collection</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End to Collection list header -->
                  
                                        
                <!--collection main  div start-->                          
          <div id="main-collections">     
          <div class="common-new common-section-new">  
           <div class="container">
                 <div class="row">
                 	  <div class="featured-dropdown">
                        <span class="dropdown">
                                                <a class="dropdown-toggle" type="button" data-toggle="dropdown">Featured
                                                    <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" id="featured">Featured</a></li>
                                                    <li><a href="#" id="upcoming">Upcoming</a></li>
                                                </ul>
                                            </span>
                      </div>   
                  </div>
            </div>                              
            </div>                           
<?php
      if(is_array($users_collection) && !empty($users_collection) )
      {
         $i= 1;
		  foreach($users_collection as $key=>$collection_landing)
             {
				
           ?>
                    <!-- Collection list -->
                  
       <section class="landing-page-css common-new common-section <?php echo ($i!=1 )? 'divider-list':'';?>" id="<?php echo ($i!=1 )? 'divider-scroll':'divider';?>" >
                        <div class="container">
                            <div class="row">
                                <div class="main-collection-list">
                                    <div class="date-css col-lg-12 col-md-12 col-sm-12"><?php echo get_dates_day($key,date("Y-m-d"));?>
                                    </div>

                                    <div class="collection-item-list">
                                       <?php
      if(is_array($collection_landing) && !empty($collection_landing) )
      {
        
		  foreach($collection_landing as  $users_collection_val)
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
                  
                 <?php     $i++; }   } ?>
                 </div>
                 
                  <button class="btn btn-success"  id="load_more1" name="load_more"  value="" >load More</button>        
                 <!--collection main  div end-->   
                
                
 									<!--collection featured div start-->
                 <div id="upcoming-collections" style="display:none;">
                 <div class="common-new common-section-new">  
           <div class="container">
                 <div class="row">
                 	  <div class="featured-dropdown">
                        <span class="dropdown">
                                                <a class="dropdown-toggle" type="button" data-toggle="dropdown">Featured
                                                    <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" id="featured-upcoming">Featured</a></li>
                                                    <li><a href="#" id="upcoming-new">Upcoming</a></li>
                                                </ul>
                                            </span>
                      </div>   
                  </div>
            </div>                              
            </div>
                 
                 <?php
      if(is_array($users_collection_upcoming) && !empty($users_collection_upcoming) )
      {
         $i= 1;
		  foreach($users_collection_upcoming as $key=>$collection_landing_upcoming)
             {
           ?>
               
     <section  class="landing-page-css common-new common-section <?php echo ($i!=1 )? 'divider-list':'';?>" id="<?php echo ($i!=1 )? 'divider-scroll':'divider';?>">
                           
                        <div class="container">
                            <div class="row">
                                <div class="main-collection-list">
                                    <div class="today-date col-lg-12 col-md-12 col-sm-12"><?php echo get_dates_day($key,date("Y-m-d"));?>
                                    </div>

                                    <div class="collection-item-list">
                                       <?php
									   
      if(is_array($collection_landing_upcoming) && !empty($collection_landing_upcoming) )
      {
		      foreach($collection_landing_upcoming as  $users_collection_val)
             {
      ?>
                              <div class="list-common common-new" id="div_count">
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
                                                                <a href="javascript:;" class="dropdown-toggle" aria-expanded="true" data-toggle="dropdown"> <?php echo username_photo_by_id($users_collection_val['user_id']);?> </a>
                                                                <div class="dropdown-menu collection-user-info-css" role="menu">
                                                                   
                                                                   <?php echo user_info_id($users_collection_val['user_id']);?>
                                                                    
                                                                </div>
                                                            
                                                      </li> 
                                                      <li class="last"><i class="fa fa-comment-o"></i>41</li>   
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
                  
                 <?php     $i++; }   } ?>
                 
                 </div>
                  <button class="btn btn-success"  id="load_more_upcoming" name="load_more" style="display:none;"  value="">load More</button> 
               <!--collection featured div end-->   
                 
                 
                    <?php $this->load->view('partials/site_footer'); ?> 

                </div>   


                


                <!--====== Login/Register Section Start ======-->   



                <div id="common-form" class="modal fade common-form-user social-user-form" role="dialog" tabindex="-1" data-replace="true" style="display: none;">
                    <div class="modal-dialog login-form">


                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <div class="modal-body">
                                <div class="modal-header">
                                    <h4>Login</h4>
                                </div>

                                <div class="user-register-bottom">

                                    <ul>
                                        <li><a href="javascript:;" class="fb-register"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                        <li><a href="javascript:;" class="tw-register login-button"  data-target="#twitter-form" data-toggle="modal"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>


                                    </ul>

                                    <div class="bootom-message"> Don't have an account? <a href="javascript:;" data-toggle="modal" data-target="#common-form" class="common-button">Register</a> </div>
                                </div> 


                            </div>

                        </div>

                    </div>
                </div>



                <!--====== Twitter Popup Section  ======-->  

                <div id="twitter-form" class="modal fade common-form-user social-user-form" role="dialog" tabindex="-1" data-replace="true" style="display: none;">
                    <div class="modal-dialog registration-form">


                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <div class="modal-body">

                                <div class="modal-header">
                                    <h4>Twitter Form</h4>
                                </div>  

                                <div class="user-register-bottom">
                                    <div class="twitter-fields">
                                        <input type="text" placeholder="Firstname" />
                                        <input type="text" placeholder="Lastname" />
                                        <input type="text" placeholder="Email Address" />
                                        <input type="submit" value="Submit" class="button btn-color follow-btn send-button" />
                                    </div>

                                </div> 
                            </div>

                        </div>

                    </div>
                </div>



            </div>  


        </div>


       <?php $this->load->view('partials/bottom_application');?>
       <script>
       $(function()
     {
			  var numItems = $('#main-collections .list-common.common-new').length;	
			  $("#load_more1").attr("value",numItems);
	});	
	   </script>
        <script>
         $(function()
      {
			  var numItems = $('#upcoming-collections .list-common.common-new').length;	
			  $("#load_more_upcoming").attr("value",numItems);
	  });	
	   </script>

<script type="text/javascript">	
     $(function()
{
		$('input[id^="end_date_"]').datepicker({
			 dateFormat: 'yy-mm-dd',
				onSelect: function()
			   { 
				   var dateObject = $(this).val(); 
				   $.ajax({
      type: 'POST',
       url:'<?=base_url()?>welcome/searchAppend',
      data: {start:dateObject},
									  success:function(response)
									 {  
													 $('#main-collections').prepend(response);
													 
									 }
        });
			        }
   		 }); 
		 
		    
		$('label[for^="end_date_"]').click(function () {
			$(this).next().datepicker('show');
			console.log($(this).next().datepicker().val());
		});	
		
});	
</script>

<script>
$('body').on('click', '#load_more_upcoming',function(e) {   
    var start = this.value;
	var end =  <?php echo $end_limit_new; ?>;
	var increment =  <?php echo $limit_incr; ?>;
	
   $.ajax({
      type: 'POST',
       url:'<?=base_url()?>welcome/readMoreUpcoming',
      data: {start:start},
      success:function(response)
	 {
			         $('#upcoming-collections').append(response);
					 var numItems = $('#upcoming-collections .list-common.common-new').length;
					
					   if(end <= numItems)
					   {
						    $("#load_more_upcoming").hide();
					   }
					   else
					   {
						     
						    $("#load_more_upcoming").attr("value",numItems);
					   }
					 	
			//	}
     }
        });
    });
</script>

<script>
$('body').on('click', '.btn-success',function(e) {   
    var start = this.value;
	var end =  <?php echo $end_limit; ?>;
	var increment =  <?php echo $limit_incr; ?>;
	
   $.ajax({
      type: 'POST',
       url:'<?=base_url()?>welcome/readMore',
      data: {start:start},
      success:function(response)
	 {
			         $('#main-collections').append(response);
					 var numItems = $('#main-collections .list-common.common-new').length;	
					   if(end <= numItems)
					   {
						    $("#load_more1").hide();
					   }
					   else
					   {
						     
						    $("#load_more1").attr("value",numItems);
					   }
					 	
			//	}
     }
        });
    });
</script>


<script>   
     $(function()
 {
		    $("#featured").click(function(e)
		   {  
		  
			                               $("#main-collections").show();
										    $("#load_more1").show();
											$("#load_more_upcoming").hide();
						                   $("#upcoming-collections").hide();
		   });
		    $("#featured-upcoming").click(function(e)
		   {  
		  
			                               $("#main-collections").show();
										    $("#load_more1").show();
											$("#load_more_upcoming").hide();
						                   $("#upcoming-collections").hide();
		   });
		   
		     $("#upcoming").click(function(e)
		   {  
		  
			                              
						                   $("#upcoming-collections").show();
										    $("#load_more1").hide();
											 $("#load_more_upcoming").show();
										    $("#main-collections").hide();
		   });
		     $("#upcoming-new").click(function(e)
		   {  
		  
			                              
						                   $("#upcoming-collections").show();
										    $("#load_more1").hide();
											 $("#load_more_upcoming").show();
										    $("#main-collections").hide();
		   });
                   													 
});
 </script>
 
  <style>
 .featured-dropdown .dropdown {bottom: 0; position: absolute; right: 0;}
 .featured-dropdown {padding: 60px 0 0; position: relative;}
 .end-date-css {border: medium none; height: 0;  width: 0;}
 </style>       
    </body>


</html>
