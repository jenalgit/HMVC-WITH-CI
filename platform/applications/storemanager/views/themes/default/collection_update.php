<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <style type="text/css">
  .error { 
    text-align: center;
    margin-top: 10px;
    color: red;
    font-size: 18px;
    }
    </style>    
                         <h3 class="page-title">
      Collections <small>Update page</small>
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
                <a href="<?php echo base_url();?>products/add">Add new products</a>
              </li>
              <li>
                <a href="<?php echo base_url();?>sections/index">Sections</a>
              </li>
            </ul>
          </div>
        </div>
                               </div>

                               <div class="portlet-body form">
                                 <form action="<?php echo base_url();?>category/update" id="form_sample_3" method="post" class="form-horizontal">
                                   <?php foreach ($single_collections as $single_collection): ?>
                                <div class="form-body">
                                   <?php echo validation_errors('<p class="error">'); ?>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Section Name<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" name="name" value = "<?php echo $single_collection->name; ?>" />
                                  </div>
                                </div>
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                              <div class="form-group">
                           <label class="control-label col-md-3">Section Description</label>
                         <div class="col-md-9">
                              <textarea class="wysihtml5 form-control" rows="6" name="description" data-error-container="#editor1_error"><?php echo $single_collection->description; ?></textarea>
                              <div id="editor1_error">
                         </div>
                       </div>
                     </div>
                    <?php endforeach; ?>
                            <div class="form-group">
                            <label class="control-label col-md-3">Stores<span class="required">
                            * </span>
                            </label>
                            <div class="col-md-4">
                                           <select class="form-control" name="store_id">
                                              <option value="<?php echo $single_collection->store_id; ?>">--Select Store--</option>
                                             <?php  foreach($stores as $cat) :?>
                                                <option value="<?php echo $cat->id; ?>"><?php  echo $cat->seller_name; ?></option>
                                                 <?php endforeach;?>
                                            </select>
                              </div>
                            </div>
                         
                                   <?php foreach ($allUsers as $users): ?>
                                   <input type="hidden" name="created_by" value="<?php echo $users['id']; ?>" />
                                   <?php endforeach;?>

                               </div>
                               <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn green">Update</button>
                      <button type="button" class="btn default">Cancel</button>
                    </div>
                  </div>
                </div>

                                </form>
                               </div>
                                  
                                    
                                        
                              
                          </div>
                        </div>
                      </div>


    </body>

</html>
