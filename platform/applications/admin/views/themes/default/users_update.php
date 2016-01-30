<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
      <style type="text/css">
  .error { 
    text-align: center;
    margin-top: 10px;
    color: red;
    font-size: 18px;
    }
    </style>  
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/basic.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/dropzone.css"/>
      <h3 class="page-title">
      Users<small>Update page</small>
      </h3>
     
            <div class="row">
                        <!-- block -->
                        <div class="col-md-12">
                           
                           <div class="portlet box blue-hoki"> 
                                        <div class="portlet-title">
                                           <div class="page-toolbar">
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
            Actions <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li>
                <a href="<?php echo base_url();?>user/index">Users</a>
              </li>
            </ul>
          </div>
        </div>
                               </div>

                               <div class="portlet-body form">
                                <div class="form-body">
                                   <?php echo validation_errors('<p class="error">'); ?>
                                                <div class="form-horizontal"> 
     <input type="hidden"  data-required="1" class="form-control"  id="user_id"  name="user_id"  value = "<?php echo $single_user_id; ?>"/>
                                           
                             <?php foreach ($single_user as $user): ?>                             
                               <div class="form-group">
                                  <label class="control-label col-md-3">Username<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
       <input type="text"  data-required="1" class="form-control"  id="username"  name="username"  value = "<?php echo $user->username; ?>"/>
                                  </div>
      <input type="hidden"  data-required="1" class="form-control"  id="user_photo"  name="user_photo"  value = "<?php echo $user->photo; ?>"/>                       
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Email<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
          <input type="email"  data-required="1" class="form-control"  id="email_id"  name="email_id"  value = "<?php echo $user->email_id; ?>" />
                                  </div>
                                </div>
                           
                                <div class="form-group">
                                  <label class="control-label col-md-3">First Name<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
       <input type="text"  data-required="1" class="form-control"  id="first_name"  name="first_name"   value= "<?php echo $user->first_name; ?>" />
                                  </div>
                                </div>
                        
                                <div class="form-group">
                                  <label class="control-label col-md-3">Last Name
                                  </label>
                                  <div class="col-md-4">
                  <input type="text"  data-required="1" class="form-control"  id="last_name"  name="last_name"  value = "<?php echo $user->last_name; ?>" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Facebook handler
                                  </label>
                                  <div class="col-md-4">
                                  
         <input type="text"  data-required="1" class="form-control"  id="facebook"  name="facebook"   value = "<?php echo $user->facebook_identifier; ?>" />
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Twitter handler
                                  </label>
                                  <div class="col-md-4">
   <input type="text"  data-required="1" class="form-control"  id="twitter"  name="twitter"  value = "<?php echo $user->twitter_identifier;?>" />
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Password
                                  </label>
                                  <div class="col-md-4">
           <input type="password"  data-required="1" class="form-control" name="password" id="password"  />
                                  </div>
                                </div>
                                <br/>
                               <?php if(!empty($user->photo)) { ?>
                                <div class="form-group">
                                <div class="col-md-4">
                             <img src="../upload/users_data/<?php echo $user->photo; ?>" style="height: 160px; margin-left: 260px;width: 250px;">    
                             </div>
                             </div>
                              <?php } ?>
							    <div class="form-group" style="width: 40%;margin-left: 253px;">
                            <form action="<?php echo base_url();?>user/cover_image" id="my-dropzone" class="dropzone">
                                <div class="featured-image">
                                   <i class="fa fa-camera"></i>
                                   <h4>Upload a Picture<span class="required">
                                  * </span></h4>
                                   <div class="error-image" style="display:none;">You can't select more files</div>                              
                                </div>
                             </form>
                             </div> 
                                <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                 <div class="form-group">
                                        <label class="control-label col-md-3">Status <span class="required"> * </span></label>
                                        <?php if($user->active == 1) { ?>
                                                   <div class="col-md-4">
                                               <select class="form-control" name="status" id="status">
                                                  <option value="1" >Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                     
                              </div>
                              <?php } else { ?>
                              <div class="col-md-4">
                                               <select class="form-control" name="status" id="status">
                                                    <option value="0">InActive</option>
                                                    <option value="1" >Active</option>
                                                </select>
                                     
                              </div>
                              
                              <?php } ?>
                            </div>
                               </div>
                           <?php endforeach;?>       
                               <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn green" id="user_submit">Submit</button>
                      <a href="<?php echo base_url();?>user"> <button type="button" class="btn default">Cancel</button></a>
                    </div>
                  </div>
                </div>
                                </div>
                               </div>
                                  
                              
                              
                          </div>
                        </div>
                      </div>
    <script type="text/javascript"> var base_url = '<?php echo $this->config->item('link_base_url');?>';</script>                  
    <script src="../assets/curatigo-admin/js/user_update.js" type="text/javascript"></script>                  
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/dropzone.js"></script>
<script>
     $(document).ready(function()
 {
	 
	   function validateEmail(val)
	 {
           var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           return re.test(val);
    }     

	  
    $('#email_id').change(function ()
    {
         var val = $('#email_id').val();
					 if (validateEmail(val))
					{
					   email_id = val;
					} 
				  else 
				  { 
				        $("#email_id").attr("value",'');
					   alert("Not a Valid email Id")
				  }
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/email_validation_database/',
      data: {email:email_id},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#email_id").attr("value",'');
               alert("Duplicate Email Id");
		  }
		  else
		  {
			 $("#email_id").attr("value",val);
              return false; 
		  }
     }
        });
		});

		
   
		
		
$('#username').change(function ()
    {
         var val = $('#username').val();
		 var id = <?php echo $single_user_id; ?>;
		 
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/username_validation_database_update/',
      data: {username:val,product_id:id},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#username").attr("value",'');
               alert("Duplicate Username");
		  }
		  else
		  {
			 $("#username").attr("value",val);
              return false; 
		  }
     }
        });
          
        });		
		$('#facebook').change(function ()
    {
         var val = $('#facebook').val();
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/username_validation_database/',
      data: {facebook_identifer:facebook},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#facebook").attr("value",'');
               alert("Duplicate facebook handler");
		  }
		  else
		  {
			 $("#facebook").attr("value",val);
              return false; 
		  }
     }
        });
          
        });		
		$('#twitter').change(function ()
    {
         var val = $('#twitter').val();
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/username_validation_database/',
      data: {twitter_identifier:twitter},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#twitter").attr("value",'');
               alert("Duplicate twitter handler");
		  }
		  else
		  {
			 $("#twitter").attr("value",val);
              return false; 
		  }
     }
        });
          
        });		
		
		
		
	});
</script>
    </body>

</html>

