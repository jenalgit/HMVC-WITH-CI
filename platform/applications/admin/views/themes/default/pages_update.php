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
      Pages <small>Update page</small>
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
                <a href="<?php echo base_url();?>pages/index">Pages</a>
                 <a href="<?php echo base_url();?>pages/add">New Pages</a>
              </li>
            </ul>
          </div>
        </div>
                               </div>

                               <div class="portlet-body form">
                                 <form action="<?php echo base_url();?>pages/update" id="form_sample_3" method="post" class="form-horizontal">
                                   <?php foreach ($single_pages as $pages): ?>
                                <div class="form-body">
                                   <?php echo validation_errors('<p class="error">'); ?>
                               <div class="form-group">
                                  <label class="control-label col-md-3">Page Heading<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" name="heading"  value = "<?php echo $pages->heading; ?>"/>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Page Url After (http://www.curatigo.com/)<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" name="url" value = "<?php echo $pages->url; ?>" />
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Meta Title<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" name="title"  value = "<?php echo $pages->meta_title; ?>"/>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Meta Description<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" name="description"  value = "<?php echo $pages->meta_description; ?>"/>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Meta Keyword<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" name="keywords"  value = "<?php echo $pages->meta_keywords; ?>" />
                                  </div>
                                </div>
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                              <div class="form-group">
                           <label class="control-label col-md-3">Description</label>
                             <div class="col-md-9">
                              <textarea class="ckeditor form-control" name="content" rows="6" data-error-container="#editor2_error"><?php echo $pages->content; ?></textarea>
                              <div id="editor2_error">
                         </div>
                       </div>
                     </div>

                      <?php endforeach;?>
                             <div class="form-group">
                            <label class="control-label col-md-3">Status <span class="required">
                            * </span>
                            </label>
                            <div class="col-md-4">
                                           <select class="form-control" name="status">
                                              <option value="1">Active</option>
                                                <option value="0">InActive</option>
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