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
                <span class="step-title">Document Information </span>
              </div>              
            </div>
            <div class="portlet-body form">
                <div class="form-wizard">
                  <div class="form-body">
                    <ul class="nav nav-pills nav-justified steps">
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
                                  <!-- BEGIN MIDDLE PAGE FORM-CONTAINER TAB-3 CONTENT-->                                                                     
                                     <div class="tab-pane" id="file-upload_tab">    
                                    <table class="table table-striped fileTable table-advance">
                                                      <thead>
                                                          <tr>
                                                                <th><input type="checkbox" class="checkParentFile"></th>
                                                                <th></th>
                                                                <th>Mandatory Files</th>
                                                                <th>Upload File</th>
                                                                <th>Start Upload</th>
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
                                                                                       <input type="file" name="files[]" multiple>
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                                <button type="submit"  class="btn blue start">
                                                                                <i class="fa fa-upload"></i>
                                                                                  <span>Start upload </span>
                                                                              </button>

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
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>       
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
                                                                                       <input type="file" name="files[]" multiple>
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                                <button type="submit"  class="btn blue start">
                                                                                <i class="fa fa-upload"></i>
                                                                                  <span>Start upload </span>
                                                                              </button>

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
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>       
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
                                                                                       <input type="file" name="files[]" multiple>
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                                <button type="submit"  class="btn blue start">
                                                                                <i class="fa fa-upload"></i>
                                                                                  <span>Start upload </span>
                                                                              </button>

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
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>       
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
                                                                                       <input type="file" name="files[]" multiple>
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                                <button type="submit"  class="btn blue start">
                                                                                <i class="fa fa-upload"></i>
                                                                                  <span>Start upload </span>
                                                                              </button>

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
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>       
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
                                                                                       <input type="file" name="files[]" multiple>
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                                <button type="submit"  class="btn blue start">
                                                                                <i class="fa fa-upload"></i>
                                                                                  <span>Start upload </span>
                                                                              </button>

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
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>       
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
                                                                                       <input type="file" name="files[]" multiple>
                                                                  </span>
                                                                             </td>
                                                                 <td>
                                                                   
                                                                                <button type="submit"  class="btn blue start">
                                                                                <i class="fa fa-upload"></i>
                                                                                  <span>Start upload </span>
                                                                              </button>

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
                                                                                  <span class="btn green fileinput-button"> 
                                                                                         <span>Uploaded</span>
                                                                                     </span>       
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