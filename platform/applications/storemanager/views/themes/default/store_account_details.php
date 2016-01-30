  <script>   
 $(function(){

  var store_id = 0;
  $("#btn_save_step_1").click(function(e)
  {  
    if (!$("#store_description").validate().form()) 
    {
    die();
    }
    else
    { 
      $.ajax({
       url:'<?=base_url()?>store/update_description',
       type: 'POST',
       data: $("#store_description").serialize(),
         success: function(response)
       {
           alert('profile basic detail is succesfully updated');
       },
       error: function(){
           alert("Fail")
       }
   });
   }
 });

  $("#btn_save_step_2").click(function(e)
  {  
    if (!$("#store_description_business").validate().form()) 
    {
    die();
    }
    else
    { 
      $.ajax({
       url:'<?=base_url()?>store/update_business',
       type: 'POST',
       data: $("#store_description_business").serialize(),
               success: function(response)
             {
                 alert('Profile Business Infromation is succesfully updated');
                   if(response > 0)
                   {
                         store_id = response;
                   }
             },
           error: function(){
               alert("Fail")
           }
   });
   }
 });



       $('#upload_pan').on('change', function (e)
   {  
            $('#fileupload').trigger('submit');
   });
        $('#upload_tan').on('change', function (e)
   {  
            $('#fileupload_tan').trigger('submit');
   });
         $('#upload_tin').on('change', function (e)
   {  
            $('#fileupload_tin').trigger('submit');
   });
          $('#upload_acc').on('change', function (e)
   {  
            $('#fileupload_bank_acc').trigger('submit');
   });
           $('#upload_logo').on('change', function (e)
   {  
            $('#fileupload_logo').trigger('submit');
   });

           $('#upload_cover').on('change', function (e)
     {  
            $('#fileupload_cover_image').trigger('submit');
   });



           $("#country").change(function(e)
           { 
               var id = $("#country option:selected").val();
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_state_list').'/';?>'+id,
                    data: id='cat_id',
                    success: function(data)
                    {
                        //alert(data);
                        $('#state').html(data);
                       },
              });

                });
                      
                     $("#state").change(function(e)
                { 
                     var id = $("#state option:selected").val();
                   $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_city_list').'/';?>'+id,
                    data: id='st_id',
                              success: function(data)
                              {
                                 
                                  $('#city').html(data);
                              },
                    });

                   });


                  $("#country_p").change(function(e)
               { 
               var id = $("#country_p option:selected").val();
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_state_list').'/';?>'+id,
                    data: id='cat_id',
                    success: function(data)
                    {
                        //alert(data);
                        $('#state_p').html(data);
                       },
              });

                });
                      
                     $("#state_p").change(function(e)
                { 
                     var id = $("#state_p option:selected").val();
                   $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_city_list').'/';?>'+id,
                    data: id='st_id',
                              success: function(data)
                              {
                                 
                                  $('#city_p').html(data);
                              },
                    });

                   });


                     $("#country_b").change(function(e)
               { 
               var id = $("#country_b option:selected").val();
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_state_list').'/';?>'+id,
                    data: id='cat_id',
                    success: function(data)
                    {
                        //alert(data);
                        $('#state_b').html(data);
                       },
              });

                });
                      
                     $("#state_b").change(function(e)
                { 
                     var id = $("#state_b option:selected").val();
                   $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_city_list').'/';?>'+id,
                    data: id='st_id',
                              success: function(data)
                              {
                                 
                                  $('#city_b').html(data);
                              },
                    });

                   });
                     
});

</script>



                   <!-- BEGIN PAGE CONTENT-->
			<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
                    	<div class="portlet light profile-sidebar-portlet">
                            <div class="profile-userpic">
                            	<img class="img-responsive" alt="" src="../assets/admin/pages/media/profile/profile_user.jpg">
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">Store View</div>
                            </div>
                            <div class="profile-userbuttons">
                                <button class="btn btn-circle green-haze btn-sm" type="button">Follow</button>
                                <button class="btn btn-circle btn-danger btn-sm" type="button">Message</button>
                            </div>
                            
                            <div class="profile-usermenu">
                            	<ul class="nav">
                                    <li class="active">
                                        <a href="store_view.html">
                                        	<i class="icon-home"></i>
                                       	 Overview
                                        </a>
                                    </li>
                                    <li>
                                        <a href="store_view_account_details.html">
                                        	<i class="icon-settings"></i>
                                        	Store Account Details
                                        </a>
                                    </li>
                                    <li>
										<a href="store_view_products.html">
										<i class="icon-puzzle"></i>
										Products</a>
									</li>
                                      <li>
										<a id="dropdownmenu" data-toggle="collapse" aria-expanded="false" href="javascript:;" data-target="#storeul">
											<i class="fa fa-list-ul"></i>
											Store Analytics
                                            <span class="fa-stack fa-lg" id="change_this">
                                        	<i class="fa fa-plus fa-stack-1x"></i>
                                            </span>
                                        </a>
                                          <ul class="collapse" id="storeul" aria-labelledby="dropdownmenu">
                                         	<li><a href="store_view_analytics.html"><i class="fa fa-caret-right"></i>Visitors</a></li>
                                            <li><a href="store_view_analytics_sales.html"><i class="fa fa-caret-right"></i>Sales</a></li>
                                            <li><a href="store_view_analytics_refund.html"><i class="fa fa-caret-right"></i>Refunds</a></li>
                                            <li><a href="store_view_analytics_order.html"><i class="fa fa-caret-right"></i>Orders</a></li>
                                         </ul>
									</li>
                                    <li>
                                    	<a href="store_report_analytics.html">
                                    		<i class="fa fa-list-alt"></i>
                                    		Reports & Analytics
                                    	</a>
                                    </li>
                                    <li>
                                    	<a href="extra_profile_help.html">
                                   		 	<i class="icon-info"></i>
                                   		 	Help
                                   		</a>
                                    </li>
                           		</ul>
                            </div>
                        </div>
                    	<div class="portlet light">
							<div class="row list-separated profile-stat">
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 37
									</div>
									<div class="uppercase profile-stat-text">
										 Projects
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 51
									</div>
									<div class="uppercase profile-stat-text">
										 Tasks
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 61
									</div>
									<div class="uppercase profile-stat-text">
										 Uploads
									</div>
								</div>
							</div>
							<div>
								<h4 class="profile-desc-title">About Marcus Doe</h4>
								<span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-globe"></i>
									<a href="http://www.keenthemes.com">www.keenthemes.com</a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-twitter"></i>
									<a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-facebook"></i>
									<a href="http://www.facebook.com/keenthemes/">keenthemes</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#store_detail" data-toggle="tab">Store Details</a>
											</li>
											<li>
												<a href="#business_detail" data-toggle="tab">Business & Bank Details</a>
											</li>
                                            <li>
												<a href="#storeAccount_document" data-toggle="tab">Documents</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!--BEGIN store detail TAB-1 -->
											<div class="tab-pane active" id="store_detail">
	                    <form  name="store_description"  id="store_description" enctype="multipart/form-data" method="POST"> 
	                                     <?php foreach ($single_stores as $stores): ?>  
					                        <input type="hidden" name="id" value="<?php echo $stores->id; ?>" />  
													<div class="form-group">
														<label class="control-label">Seller Name</label>
									<input type="text"  class="form-control" name="seller_name" value="<?php echo $stores->seller_name; ?>" id="name" required />
													</div>
													<div class="form-group">
														<label class="control-label">Seller Email Address</label>
									<input type="email" class="form-control" name="email" value="<?php echo $stores->email; ?>" id="email" required />
													</div>
                                                    <div class="form-group">
														<label class="control-label">City Pincode Number</label>
									<input type="number"  class="form-control" name="code" value="<?php echo $stores->pincode; ?>" id="code" required />
													</div>	
													<div class="form-group">
														<label class="control-label">Country</label>
														 <select class="form-control" name="country" id="country" required> 
                                                              <option value="<?php echo $stores->country; ?>">---Select---</option>
                                                                    <option value="IND">India</option>
                                                                </select>
													</div>	
                                                     <div class="form-group">
														<label class="control-label">State</label>
														<select class="form-control" name="state" id="state" required>
                                                                    <option value="<?php echo $stores->state; ?>">---Select---</option>
                                                                    
                                                                </select>
													</div>	
                                                     <div class="form-group">
														<label class="control-label">City</label>
														 <select class="form-control" name="city" id="city" required>
                                                          <option value="<?php echo $stores->city; ?>">---Select---</option>
                                                                </select>
													</div>	
                                                    <div class="form-group">
														<label class="control-label">Contact Number</label>
										<input type="number"  class="form-control" name="number" value="<?php echo $stores->contact_number; ?>" id="number" required />
													</div>	                                                  
                                                    <div class="form-group">
														<label class="control-label">Display Name</label>
								    <input type="text"  class="form-control" name="display" value="<?php echo $stores->display_name; ?>" id="display_name" required />
													</div>
													<div class="form-group">
														<label class="control-label">Store Description</label>
														<textarea class="form-control" name="description" id="description"><?php echo $stores->store_description; ?></textarea>
													</div>	
                                                    <div class="caption caption-md">
                                                        <i class="icon-globe theme-font hide"></i>
                                                        <span class="caption-subject font-black-madison bold uppercase">Pick up Address</span>
                                                	</div>	
                                                    <div class="form-group">
														<label class="control-label">Contact Number</label>
										<input type="number"  class="form-control" name="p_contact" value="<?php echo $stores->pickup_c_number; ?>" id="p_contact" required />
													</div>	
													<div class="form-group">
														<label class="control-label">Pick up Address</label>
						<textarea class="form-control" name="p_address" id="p_address"><?php echo $stores->pickup_address; ?></textarea>
													</div>		
                                                    <div class="form-group">
														<label class="control-label">Pincode Number</label>
					<input type="number"  class="form-control" name="p_code" value="<?php echo $stores->pickup_pin_code; ?>" id="pickup_pin_code"/>
													</div>	
													<div class="form-group">
														<label class="control-label">Country</label>
														 <select class="form-control" name="country_p" id="country_p" required> 
                                                              <option value="<?php echo $stores->country; ?>">---Select---</option>
                                                                    <option value="IND">India</option>
                                                                </select>
													</div>	
                                                     <div class="form-group">
														<label class="control-label">State</label>
									                     <select class="form-control" name="pickup_state" id="state_p" required>
                                                         <option value="<?php echo $stores->pickup_state; ?>">---Select---</option>
                                                            </select>
													</div>	
                                                     <div class="form-group">
														<label class="control-label">City</label>
											               <select class="form-control" name="pickup_city" id="city_p" required>
                                                                    <option value="<?php echo $stores->pickup_city; ?>">---Select---</option>
                                                                    
                                                                </select>
                                                            </div>
													 <?php endforeach;?>  							
													<div class="margiv-top-10">
														<a href="javascript:;" class="btn green-haze" id="btn_save_step_1">
														Save </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END store detail TAB-1 -->
											<!--BEGIN business_detail TAB-2 -->
											<div class="tab-pane" id="business_detail">	
                                            	<div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-black-madison bold uppercase">Business Details</span>
                                                </div>		
                           <form  name="store_description_business"  id="store_description_business" enctype="multipart/form-data" method="POST">
                           	                        <?php foreach ($single_stores_business as $stores): ?>  
                           	                   <input type="hidden" name="store_id" value="<?php echo $stores->store_id; ?>" />      
													<div class="form-group">
														<label class="control-label">Business Name</label>
									<input type="text"  class="form-control" name="name"  id="name"  value="<?php echo $stores->name; ?>"  required />
													</div>
													<div class="form-group">
														<label class="control-label">PAN Number</label>
									<input type="text"  class="form-control" name="pan"  id="pan" value="<?php echo $stores->pan_number; ?>"  required />
													</div>
													<div class="form-group">
														<label class="control-label">TIN Number</label>
									<input type="number"  class="form-control" name="tin"  id="tin" value="<?php echo $stores->tin_number; ?>"  required />
													</div>
													<div class="form-group">
														<label class="control-label">TAN Number</label>
								    <input type="text"  data-required="1" class="form-control" name="tan"  value="<?php echo $stores->tan_number; ?>"  id="tan" required />
													</div>													
                                               	<div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-black-madison bold uppercase">Bank Details</span>
                                                </div>		
                                                <div class="form-group">
														<label class="control-label">Bank Name</label>
									<input type="text"   class="form-control" name="bank_name"  id="bank_name" value="<?php echo $stores->bank_name; ?>"  required />
													</div>
													<div class="form-group">
														<label class="control-label">Account Holder Name</label>
								  <input type="text"  class="form-control" name="account_holder"  id="account_holder" value="<?php echo $stores->account_holder_name; ?>" required />
													</div>
													<div class="form-group">
														<label class="control-label">Account Number</label>
										 <input type="text" class="form-control" name="account"  id="account" value="<?php echo $stores->account_number; ?>"  required />
													</div>
													<div class="form-group">
														<label class="control-label">IFSC Code</label>
												<input type="text" class="form-control" name="code" id="code"  value="<?php echo $stores->IFSC; ?>" > 
													</div>
													<div class="form-group">
														<label class="control-label">Country</label>
														 <select class="form-control" name="country_b" id="country_b" > 
                                                                    <option value="">---Select---</option>
                                                                    <option value="IND">India</option>
                                                                </select>
													</div>	
													<div class="form-group">
														<label class="control-label">State</label>
														 <select class="form-control" name="state_b" id="state_b"  value="<?php echo $stores->state; ?>"  required>
                                                                    <option value="">---Select---</option>
                                                                    
                                                                </select>
													</div>	
                                                    <div class="form-group">
														<label class="control-label">City</label>
														 <select class="form-control" name="city_b" id="city_b" value="<?php echo $stores->city; ?>"  required>
                                                                    <option value="">---Select---</option>
                                                                </select>
													</div>	
                                                    <div class="form-group">
														<label class="control-label">Branch</label>
											       <input type="text" class="form-control" name="branch" id="branch"  value="<?php echo $stores->branch; ?>"  required>
													</div>	

													<?php endforeach;?>  										
													<div class="margiv-top-10">
														<a href="javascript:;" class="btn green-haze" id="btn_save_step_2">
														Save </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>													
												</form>
											</div>
											<!-- END business_detail TAB-2 -->
											<!--BEGIN Document TAB-3 -->
											<div class="tab-pane" id="storeAccount_document">	
                                            	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="col-lg-9 col-md-9 col-sm-9"></div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 docTable">
                                                 	<div class="table-scrollable">
                                                 		<table class="table table-striped fileTable table-advance">
                                                    	<thead>
                                                        	<tr>
                                                                <th><input type="checkbox" class="checkParentFile"></th>
                                                                <th></th>
                                                                <th>Mandatory Files</th>
                                                                <th>Upload File</th>
                                                                <th>Url</th>
                                                                <th>Size</th>
                                                                <th>Status</th>                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                   <form action="<?php echo base_url();?>store/do_upload_document_pan" id="fileupload" method="POST" enctype="multipart/form-data" name="fileupload">   
                                           <?php foreach ($single_stores_business as $stores): ?>  
                                               <input type="hidden" name="store_id" value="<?php echo $stores->store_id; ?>" />  
                                               <?php endforeach;?> 
                                                <input type="hidden" name="document_name" value="PAN" />         	
                                                        	<tr>
                                                                <td><input type="checkbox" class="checkChildFile"></td>
                                                                <td>
                                                                	<img src="../www/admin/assets/custom-images/file.png">
                                                                	<button class="btn btn-sm" type="button"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                                <td class="card">PAN Card <label>*</label> </td>
                                                    <?php if($document_status_pan == 5): ?>
                                                                  
                                                                <td>
                                                                  <span class="btn green fileinput-button">
                                                                  <span>Upload files</span>
                                                                  <input id="upload_pan" type="file" name="files[]" >
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                              

                                                                </td>
                                                                <td>
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                </td>
                                                                <td>
                                                                     <label class="label label-success">Not Uploaded</label>
                                                                </td>

                                                                       <?php else : ?> 
                                                                                 <td> 
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>       
                                                                            </td>
                                                                            <td> 
                                                                                        
                                                                            </td>
                                                                             <?php foreach ($document_status_pan as $status): ?> 
                                                                               <td><?php echo $status->size; ?></td>
                                                                                <?php endforeach;?>
                                                                     <td>
                                                                     <div>
                                                                       <?php foreach ($document_status_pan as $status): ?> 
                                                                         <?php  if ($status->document_status == 1): ?>
                                                                        <label class="label label-success">Approved</label>
                                                                         <?php elseif ($status->document_status == 2): ?> 
                                                                         <label class="label label-success">Uploaded</label>
                                                                           <?php elseif ($status->document_status == 3): ?> 
                                                                          <label class="label label-danger"> Rejected </label>
                                                                         <?php else : ?> 
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                         <?php endif; ?>
                                                                    </div>
                                                                    <?php endforeach;?> 
                                                                </td>
                                                              <?php endif; ?>
                                                                
                                                               
                                                            </tr> 
                                                           </form>  
    <form action="<?php echo base_url();?>store/do_upload_document_pan" id="fileupload_tin" method="POST" enctype="multipart/form-data" name="fileupload_tin">   
                                           <?php foreach ($single_stores_business as $stores): ?>  
                                               <input type="hidden" name="store_id" value="<?php echo $stores->store_id; ?>" />  
                                               <?php endforeach;?> 
                                                <input type="hidden" name="document_name" value="TIN" />          
                                                          <tr>
                                                                <td><input type="checkbox" class="checkChildFile"></td>
                                                                <td>
                                                                  <img src="../www/admin/assets/custom-images/file.png">
                                                                  <button class="btn btn-sm" type="button"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                                <td class="card">TIN Card<label>*</label> </td>  
                                                                 <?php if($document_status_tin == 5): ?>
                                                                  
                                                                <td>
                                                                  <span class="btn green fileinput-button">
                                                                                      <span>Upload files</span>
                                                                         <input id="upload_tin" type="file" name="files[]" >
                                                                  </span>
                                                                             </td>
                                                                 <td> </td>
                                                                <td>
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                </td>
                                                                <td>
                                                                     <label class="label label-success">Not Uploaded</label>
                                                                </td>

                                                                       <?php else : ?> 
                                                                                 <td> 
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>
                                                      
                                                                                      
                                                                                     
                                                                            </td>
                                                                            <td> 
                                                                                       
                                                                            </td>
                                                                             <?php foreach ($document_status_tin as $status): ?> 
                                                                               <td><?php echo $status->size; ?></td>
                                                                                <?php endforeach;?>
                                                                     <td>
                                                                     <div>
                                                                       <?php foreach ($document_status_tin as $status): ?> 
                                                                         <?php  if ($status->document_status == 1): ?>
                                                                        <label class="label label-success">Approved</label>
                                                                         <?php elseif ($status->document_status == 2): ?> 
                                                                         <label class="label label-success">Uploaded</label>
                                                                           <?php elseif ($status->document_status == 3): ?> 
                                                                          <label class="label label-danger"> Rejected </label>
                                                                         <?php else : ?> 
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                         <?php endif; ?>
                                                                    </div>
                                                                    <?php endforeach;?> 
                                                                </td>
                                                              <?php endif; ?>
                                                                
                                                               
                                                            </tr> 
                                                           </form>  
                    <form action="<?php echo base_url();?>store/do_upload_document_pan" id="fileupload_tan" method="POST" enctype="multipart/form-data" name="fileupload_tan">   
                                           <?php foreach ($single_stores_business as $stores): ?>  
                                               <input type="hidden" name="store_id" value="<?php echo $stores->store_id; ?>" />  
                                               <?php endforeach;?> 
                                                <input type="hidden" name="document_name" value="TAN" />          
                                                          <tr>
                                                                <td><input type="checkbox" class="checkChildFile"></td>
                                                                <td>
                                                                  <img src="../www/admin/assets/custom-images/file.png">
                                                                  <button class="btn btn-sm" type="button"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                                <td class="card">TAN Card<label>*</label> </td>
                                                                         <?php if($document_status_tan == 5): ?>
                                                                  
                                                                <td>
                                                                  <span class="btn green fileinput-button">
                                                                                      <span>Upload files</span>
                                                                      <input id="upload_tan" type="file" name="files[]">
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                  

                                                                </td>
                                                                <td>
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                </td>
                                                                <td>
                                                                     <label class="label label-success">Not Uploaded</label>
                                                                </td>

                                                                       <?php else : ?> 
                                                                                 <td> 
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>

                                                                                      
                                                                                     
                                                                            </td>
                                                                            <td> 
                                                                                 
                                                                            </td>
                                                                             <?php foreach ($document_status_tan as $status): ?> 
                                                                               <td><?php echo $status->size; ?></td>
                                                                                <?php endforeach;?>
                                                                     <td>
                                                                     <div>
                                                                       <?php foreach ($document_status_tan as $status): ?> 
                                                                         <?php  if ($status->document_status == 1): ?>
                                                                        <label class="label label-success">Approved</label>
                                                                         <?php elseif ($status->document_status == 2): ?> 
                                                                         <label class="label label-success">Uploaded</label>
                                                                           <?php elseif ($status->document_status == 3): ?> 
                                                                          <label class="label label-danger"> Rejected </label>
                                                                         <?php else : ?> 
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                         <?php endif; ?>
                                                                    </div>
                                                                    <?php endforeach;?> 
                                                                </td>
                                                              <?php endif; ?>
                                                                
                                                               
                                                            </tr> 
                                                           </form>  
                     <form action="<?php echo base_url();?>store/do_upload_document_pan" id="fileupload_bank_acc" method="POST" enctype="multipart/form-data" name="fileupload_bank_acc">   
                                           <?php foreach ($single_stores_business as $stores): ?>  
                                               <input type="hidden" name="store_id" value="<?php echo $stores->store_id; ?>" />  
                                               <?php endforeach;?> 
                                                <input type="hidden" name="document_name" value="BANK_ACC" />          
                                                          <tr>
                                                                <td><input type="checkbox" class="checkChildFile"></td>
                                                                <td>
                                                                  <img src="../www/admin/assets/custom-images/file.png">
                                                                  <button class="btn btn-sm" type="button"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                                <td class="card">Bank Acc Statement<label>*</label> </td>
                                                                    <?php if($document_status_acc == 5): ?>
     
                                                                <td>
                                                                  <span class="btn green fileinput-button">
                                                                                      <span>Upload files</span>
                                                              <input id="upload_acc" type="file" name="files[]">
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                </td>
                                                                <td>
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                </td>
                                                                <td>
                                                                     <label class="label label-success">Not Uploaded</label>
                                                                </td>

                                                                       <?php else : ?> 
                                                                                 <td> 
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>

                                                                                      
                                                                                     
                                                                            </td>
                                                                            <td>    
                                                                            </td>
                                                                             <?php foreach ($document_status_acc as $status): ?> 
                                                                               <td><?php echo $status->size; ?></td>
                                                                                <?php endforeach;?>
                                                                     <td>
                                                                     <div>
                                                                       <?php foreach ($document_status_acc as $status): ?> 
                                                                         <?php  if ($status->document_status == 1): ?>
                                                                        <label class="label label-success">Approved</label>
                                                                         <?php elseif ($status->document_status == 2): ?> 
                                                                         <label class="label label-success">Uploaded</label>
                                                                           <?php elseif ($status->document_status == 3): ?> 
                                                                          <label class="label label-danger"> Rejected </label>
                                                                         <?php else : ?> 
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                         <?php endif; ?>
                                                                    </div>
                                                                    <?php endforeach;?> 
                                                                </td>
                                                              <?php endif; ?>
                                                                
                                                               
                                                            </tr> 
                                                           </form>  
       <form action="<?php echo base_url();?>store/do_upload_document_pan" id="fileupload_logo" method="POST" enctype="multipart/form-data" name="fileupload_logo">   
                                           <?php foreach ($single_stores_business as $stores): ?>  
                                               <input type="hidden" name="store_id" value="<?php echo $stores->store_id; ?>" />  
                                               <?php endforeach;?> 
                                                <input type="hidden" name="document_name" value="Logo" />          
                                                          <tr>
                                                                <td><input type="checkbox" class="checkChildFile"></td>
                                                                <td>
                                                                  <img src="../www/admin/assets/custom-images/file.png">
                                                                  <button class="btn btn-sm" type="button"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                                <td class="card">Store Logo <label>*</label> </td>
                                                                          <?php if($document_status_logo == 5): ?>
                                                                  
                                                                            <td>
                                                                  <span class="btn green fileinput-button">
                                                                                      <span>Upload files</span>
                                                              <input id="upload_logo" type="file" name="files[]" >
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                </td>
                                                                <td>
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                </td>
                                                                <td>
                                                                     <label class="label label-success">Not Uploaded</label>
                                                                </td>

                                                                       <?php else : ?> 
                                                                                 <td> 
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>

                                                                                      
                                                                                     
                                                                            </td>
                                                                            <td> 
                                                                                    
                                                                            </td>
                                                                             <?php foreach ($document_status_logo as $status): ?> 
                                                                               <td><?php echo $status->size; ?></td>
                                                                                <?php endforeach;?>
                                                                     <td>
                                                                     <div>
                                                                       <?php foreach ($document_status_logo as $status): ?> 
                                                                         <?php  if ($status->document_status == 1): ?>
                                                                        <label class="label label-success">Approved</label>
                                                                         <?php elseif ($status->document_status == 2): ?> 
                                                                         <label class="label label-success">Uploaded</label>
                                                                           <?php elseif ($status->document_status == 3): ?> 
                                                                          <label class="label label-danger"> Rejected </label>
                                                                         <?php else : ?> 
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                         <?php endif; ?>
                                                                    </div>
                                                                    <?php endforeach;?> 
                                                                </td>
                                                              <?php endif; ?>
                                                            </tr> 
                                                           </form>  
     <form action="<?php echo base_url();?>store/do_upload_document_pan" id="fileupload_cover_image" method="POST" enctype="multipart/form-data" name="fileupload_cover_image">   
                                           <?php foreach ($single_stores_business as $stores): ?>  
                                               <input type="hidden" name="store_id" value="<?php echo $stores->store_id; ?>" />  
                                               <?php endforeach;?> 
                                                <input type="hidden" name="document_name" value="Cover_image" />          
                                                          <tr>
                                                                <td><input type="checkbox" class="checkChildFile"></td>
                                                                <td>
                                                                  <img src="../www/admin/assets/custom-images/file.png">
                                                                  <button class="btn btn-sm" type="button"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                                <td class="card">Cover Image <label>*</label> </td>
                                                                 <?php if($document_status_cover == 5): ?>    
                                                                <td>
                                                                  <span class="btn green fileinput-button">
                                                                                      <span>Upload files</span>
                                                            <input id="upload_cover" type="file" name="files[]">
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   

                                                                </td>
                                                                <td>
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                </td>
                                                                <td>
                                                                     <label class="label label-success">Not Uploaded</label>
                                                                </td>

                                                                       <?php else : ?> 
                                                                                 <td> 
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>

                                                                                      
                                                                                     
                                                                            </td>

                                                                            <td> 
                                                                                      
                                                                            </td>
                                                                            
                                                                             <?php foreach ($document_status_cover as $status): ?> 
                                                                               <td><?php echo $status->size; ?></td>
                                                                                <?php endforeach;?>
                                                                     <td>
                                                                     <div>
                                                                       <?php foreach ($document_status_cover as $status): ?> 
                                                                         <?php  if ($status->document_status == 1): ?>
                                                                        <label class="label label-success">Approved</label>
                                                                         <?php elseif ($status->document_status == 2): ?> 
                                                                         <label class="label label-success">Uploaded</label>
                                                                           <?php elseif ($status->document_status == 3): ?> 
                                                                          <label class="label label-danger"> Rejected </label>
                                                                         <?php else : ?> 
                                                                        <label class="label label-success">Not Uploaded</label>
                                                                         <?php endif; ?>
                                                                    </div>
                                                                    <?php endforeach;?> 
                                                                </td>
                                                              <?php endif; ?>
                                                                
                                                               
                                                            </tr> 
                                                           </form>  
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                 </div>
                                                                               	
											</div>
											<!-- END Document TAB-3 -->
							    		</div>
									</div>
								</div>
							</div>
						</div>
            		</div>
       			</div>
    		</div>
		</div>
    </div>
 </div>
     

