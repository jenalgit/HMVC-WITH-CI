<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <style type="text/css">
  .error { 
    text-align: center;
    margin-top: 10px;
    color: red;
    font-size: 18px;
    }
    </style>    
               
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
       url:'<?=base_url()?>store/save',
       type: 'POST',
       data: $("#store_description").serialize(),
               success: function(response)
             {
                 alert('store is succesfully updated');
                   if(response > 0)
                   {
                         store_id = response;
                        document.getElementById('store_id').value = store_id;
                       document.getElementById('store_business_id').value = store_id;
                   }
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
       url:'<?=base_url()?>store/save_business',
       type: 'POST',
       data: $("#store_description_business").serialize(),
               success: function(response)
             {
                 alert('store business infromation is succesfully updated');
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
              $("#p_country").change(function(e)
  { 
               var id = $("#p_country option:selected").val();
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_state_list').'/';?>'+id,
                    data: id='cat_id',
                    success: function(data)
                    {
                        //alert(data);
                        $('#p_state').html(data);
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
                     
                     $("#state_b").change(function(e)
                { 
                     var id = $("#state option:selected").val();
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
                     $("#p_state").change(function(e)
                { 
                     var id = $("#p_state option:selected").val();
                   $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('country/ajax_city_list').'/';?>'+id,
                    data: id='st_id',
                              success: function(data)
                              {
                                 
                                  $('#p_city').html(data);
                              },
                    });

                   });
});

</script>



                <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i> Add Store - 
                <span class="step-title">Basic Information </span>
              </div>              
            </div>
            <div class="portlet-body form">
                <div class="form-wizard">
                  <div class="form-body">
                    <ul class="nav nav-pills nav-justified steps">
                      <li>
                        <a href="#basicinfo_tab" data-toggle="tab" class="step">
                        <span class="number">1 </span><br/>
                        <span class="desc">
                        <i class="fa fa-check"></i>Basic Information </span>
                        </a>
                      </li>
                       <li>
                        <a href="#business_tab" data-toggle="tab" class="step">
                        <span class="number">2 </span><br/>
                        <span class="desc">
                        <i class="fa fa-check"></i>Business Information </span>
                        </a>
                      </li>
                                             <li>
                                          <a class="step" data-toggle="tab" href="#file-upload_tab">
                                              <span class="number">3</span>
                                              <br/>
                                                <span class="desc">
                                                  <i class="fa fa-check"></i>
                                                    File Upload
                                                </span>
                                            </a>
                                        </li>       
                    </ul>
                    <div id="bar" class="progress progress-striped" role="progressbar">
                      <div class="progress-bar progress-bar-success" style="width: 18%;">
                      </div>
                    </div>
                    <div class="tab-content">
                                                 
                             <!-- BEGIN MIDDLE PAGE FORM-CONTAINER TAB-1 CONTENT-->  
                                     <div class="tab-pane active" id="basicinfo_tab">
          <form  name="store_description"  id="store_description"  class="form-horizontal" enctype="multipart/form-data" method="POST">                                           <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                         <div class="form-group">
                                                <label class="control-label col-md-3">Seller Name<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="name"  id="name" required />
                                              </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Email<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="email"  data-required="1" class="form-control" name="email"  id="email" required />
                                              </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Contact Number<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="number"  data-required="1" class="form-control" name="number"  id="number" required />
                                              </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Display Name<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="display"  id="display" required />
                                              </div>
                                            </div>
                                                        <div class="form-group">
                                                               <label class="control-label col-md-3"> Seller Description
                                                                <span class="required" aria-required="true"> * </span>
                                                               </label>
                                                                <div class="col-md-6">
                                                               <textarea class="form-control" id="description" name="description" required></textarea>  
                                                                <span class="help-block">Provide Description.</span>
                                                            </div>
                                                          </div>  
                                                     
                                                        <div class="form-group">
                                                     <label class="control-label col-md-3">Store Admin<span class="required">* </span></label>
                                                           <div class="col-md-6">
                                                                 <select class="form-control" name="users_id" name="users_id" required>
                                                                        <option value="1">Select Store Admin</option>
                                                                        <?php  foreach($users as $user) :?>
                                                                  <option value="<?php echo $user['id']; ?>"><?php  echo $user['username']; ?></option>
                                                                                     <?php endforeach;?>
                                                                                </select>
                                                             </div>
                                                          </div>
                                                          <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                                         <div class="form-group">
                                                              <label class="control-label col-md-3"> Address
                                                                <span class="required" aria-required="true"> * </span>
                                                              </label>
                                                            <div class="col-md-6">
                                                             <textarea class="form-control" id="address" name="address" required></textarea>  
                                                                <span class="help-block">Provide Address.</span>
                                                            </div>
                                                          </div>  
                                                         <div class="form-group">
                                                           <label class="control-label col-md-3">Country
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                           <div class="col-md-6">
                                                               <select class="form-control" name="country" id="country" required> 
                                                                    <option value="">---Select---</option>
                                                                    <option value="IND">India</option>
                                                                </select>
                                                            </div>
                                                        </div>       
                                                      <div class="form-group">
                                                           <label class="control-label col-md-3"> State
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                        <select class="form-control" name="state" id="state" required>
                                                                    <option value="">---Select---</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> City
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                           <div class="col-md-6">
                                                                <select class="form-control" name="city" id="city" required>
                                                                    <option value="">---Select---</option>
                                                                </select>
                                                            </div>
                                                        </div>         
                                                       <div class="form-group">    
                                                                   <label class="control-label col-md-3">Postal code
                                                                        <span class="required" aria-required="true"> * </span>
                                                                    </label>
                                                                   <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="code" id="code" required>                                                    
                                                                        <span class="help-block">Provide Shipping Postal Code</span>                                        
                                                                    </div>
                                                                </div> 
                                                            <h2 style="text-align: center;">PICKUP ADDRESS OF SELLER
                                                              
                                                            </h2>
                                                            <br/>
                                                             <div class="form-group">
                                                              <label class="control-label col-md-3">Pickup Contact N
                                                                <span class="required" aria-required="true"> * </span>
                                                              </label>
                                                            <div class="col-md-6">
                                        <input type="number"  data-required="1" class="form-control" name="p_contact"  id="p_contact" required />
                                                                <span class="help-block">Provide Contact Number.</span>
                                                            </div>
                                                          </div>  
                                                           <div class="form-group">
                                                              <label class="control-label col-md-3">Pickup Address
                                                                <span class="required" aria-required="true"> * </span>
                                                              </label>
                                                            <div class="col-md-6">
                                                             <textarea class="form-control" id="p_address" name="p_address" required></textarea>  
                                                                <span class="help-block">Provide Address.</span>
                                                            </div>
                                                          </div>  
                                                         <div class="form-group">
                                                           <label class="control-label col-md-3">Pickup Country
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                           <div class="col-md-6">
                                                               <select class="form-control" name="p_country" id="p_country" required> 
                                                                    <option value="">---Select---</option>
                                                                    <option value="IND">India</option>
                                                                </select>
                                                            </div>
                                                        </div>       
                                                      <div class="form-group">
                                                           <label class="control-label col-md-3">Pickup State
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                        <select class="form-control" name="p_state" id="p_state" required>
                                                                    <option value="">---Select---</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> Pickup City
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                           <div class="col-md-6">
                                                                <select class="form-control" name="p_city" id="p_city" required>
                                                                    <option value="">---Select---</option>
                                                                </select>
                                                            </div>
                                                        </div>         
                                                       <div class="form-group">    
                                                                   <label class="control-label col-md-3"> Pickup Postal code
                                                                        <span class="required" aria-required="true"> * </span>
                                                                    </label>
                                                                   <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="p_code" id="p_code" required>                                                    
                                                                        <span class="help-block">Provide Shipping Postal Code</span>                                        
                                                                    </div>
                                                                </div>       
                                                         <div class="form-group">
                                                                <label class="control-label col-md-3">Status <span class="required">* </span></label>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                               <select class="form-control" name="status" required>
                                                                                  <option value="1">Active</option>
                                                                                  <option value="0">InActive</option>
                                                                                </select>
                                                             </div>
                                                          </div>       
 
                                                      </div> 
                                                                                                        
                                                </div>    

                                                                                            
                                                <div class="form-actions">
                                                                <div class="row">
                                                                  <div class="col-md-offset-3 col-md-9">
                                                                    <a href="javascript:;" class="btn default button-previous">
                                                                      <i class="m-icon-swapleft"></i> Back </a>
                                                                    <a href="javascript:;" class="btn blue button-next" id="btn_save_step_1">
                                                                      Continue <i class="m-icon-swapright m-icon-white"></i>
                                                                    </a>
                                                                      <a href="javascript:;"   class="btn green button-submit">
                                                                      Submit <i class="m-icon-swapright m-icon-white"></i>
                                                                    </a>
                                                                  </div>
                                                                </div>
                                                      </div>
                                                      <?php echo validation_errors('<p class="error">'); ?>   
                                                 </form>                          
                                          </div>
                                           
                             <!-- END MIDDLE PAGE FORM-CONTAINER TAB-2 CONTENT-->  
                                               <div class="tab-pane active" id="business_tab">
                      <form  name="store_description_business"  id="store_description_business"  class="form-horizontal" enctype="multipart/form-data" method="POST">                                           <div class="row">
                                                 <input type="hidden" name="store_business_id" id="store_business_id" />  
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                         <div class="form-group">
                                                <label class="control-label col-md-3">Business Name<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="name"  id="name" required />
                                              </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">PAN number<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="pan"  id="pan" required />
                                              </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">TIN number<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="number"  data-required="1" class="form-control" name="tin"  id="tin" required />
                                              </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">TAN number<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="tan"  id="tan" required />
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Bank Name<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="bank_name"  id="bank_name" required />
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Account Holder Name<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="account_holder"  id="account_holder" required />
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Account number<span class="required">
                                                * </span>
                                                </label>
                                              <div class="col-md-6">
                                                <input type="text"  data-required="1" class="form-control" name="account"  id="account" required />
                                              </div>
                                            </div>

                                                          <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                                         
                                                         <div class="form-group">
                                                           <label class="control-label col-md-3">Country
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                           <div class="col-md-6">
                                                               <select class="form-control" name="country_b" id="country_b" required> 
                                                                    <option value="">---Select---</option>
                                                                    <option value="IND">India</option>
                                                                </select>
                                                            </div>
                                                        </div>       
                                                      <div class="form-group">
                                                           <label class="control-label col-md-3"> State
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                        <select class="form-control" name="state_b" id="state_b" required>
                                                                    <option value="">---Select---</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> City
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                           <div class="col-md-6">
                                                                <select class="form-control" name="city_b" id="city_b" required>
                                                                    <option value="">---Select---</option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                         <div class="form-group">    
                                                                   <label class="control-label col-md-3">IFSC
                                                                        <span class="required" aria-required="true"> * </span>
                                                                    </label>
                                                                   <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="code" id="code" >                                                    
                                                                        <span class="help-block">Provide IFSC</span>                                        
                                                                    </div>
                                                                </div>       
                                                       <div class="form-group">    
                                                                   <label class="control-label col-md-3">Branch
                                                                        <span class="required" aria-required="true"> * </span>
                                                                    </label>
                                                                   <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="branch" id="branch" required>                                                    
                                                                        <span class="help-block">Provide Branch</span>                                        
                                                                    </div>
                                                                </div> 
                                                         <div class="form-group">
                                                                <label class="control-label col-md-3">Status <span class="required">* </span></label>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                               <select class="form-control" name="status" required>
                                                                                  <option value="1">Active</option>
                                                                                  <option value="0">InActive</option>
                                                                                </select>
                                                             </div>
                                                          </div>       
 
                                                      </div> 
                                                                                                        
                                                </div>    

                                                                                            
                                                <div class="form-actions">
                                                                <div class="row">
                                                                  <div class="col-md-offset-3 col-md-9">
                                                                    <a href="javascript:;" class="btn default button-previous">
                                                                      <i class="m-icon-swapleft"></i> Back </a>
                                                                    <a href="javascript:;" class="btn blue button-next" id="btn_save_step_2">
                                                                      Continue <i class="m-icon-swapright m-icon-white"></i>
                                                                    </a>
                                                                      <a href="javascript:;"   class="btn green button-submit">
                                                                      Submit <i class="m-icon-swapright m-icon-white"></i>
                                                                    </a>
                                                                  </div>
                                                                </div>
                                                      </div>
                                                      <?php echo validation_errors('<p class="error">'); ?>   
                                                 </form>                          
                                          </div>
                                           
                             <!-- END MIDDLE PAGE FORM-CONTAINER TAB-2 CONTENT-->  

                            
                                  <!-- BEGIN MIDDLE PAGE FORM-CONTAINER TAB-3 CONTENT-->                                                                     
                                     <div class="tab-pane" id="file-upload_tab">    
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
  <br/>
                           <button class="btn blue start" id="store_save">Save & Finish </button>
                                         </div>   
                                                                                                                                    
                             <!-- END MIDDLE PAGE FORM-CONTAINER TAB-7 CONTENT-->                                                        
                  
            </div>
          </div>
        </div>
      </div>
    
      <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger label label-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn blue start" disabled>
                    <i class="fa fa-upload" style="display:none;"></i>
                    <span style="display:none;">Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn red cancel">
                    <i class="fa fa-ban"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>   
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td>
                    {% if (file.deleteUrl) { %}
                        <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="fa fa-trash-o"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle">
                    {% } else { %}
                        <button class="btn yellow cancel btn-sm">
                            <i class="fa fa-ban"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
</script>
    

      <script>
  $(document).ready(function() 
  {
         
          FormFileUpload.init();
           UITree.init(); 
     
    
           $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
            $('.date-picker .form-control').change(function() {
               
            })
                     $('#store_save').click(function()
                   {  
                     window.location.href = 'stores/index';
                   });   
    });
</script>

    </body>

</html>