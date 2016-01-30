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
      Category<small> Update page</small>
      </h3>
     
            <div class="row">
                        <!-- block -->
                        <div class="col-md-12">
                           
                           <div class="portlet box blue-hoki"> 
                                        <div class="portlet-title">
                                           <div class="page-toolbar">
          
        </div>
                               </div>

                               <div class="portlet-body form">
                                 <form action="<?php echo base_url();?>category/update" id="form_sample_3" method="post" class="form-horizontal">
                                   <?php foreach ($single_category as $category): ?>
                                <div class="form-body">
                                   <?php echo validation_errors('<p class="error">'); ?>
                                  <div class="form-group">
                                      <label class="control-label col-md-3">Category Name<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                          <input type="text" name="name" data-required="1" class="form-control" name="name" value ="<?php echo $category->name; ?>" />
                                  </div>
                                </div>
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                <input type="hidden" name="category_id" value="<?php echo $category->id; ?>" />
                              <div class="form-group">
                           <label class="control-label col-md-3">Category Description</label>
                         <div class="col-md-9">
        <textarea class="wysihtml5 form-control" rows="6" name="description" data-error-container="#editor1_error"><?php echo $category->category_description; ?></textarea>
                              <div id="editor1_error">
                         </div>
                       </div>
                     </div>
                    <?php endforeach; ?>   
                            </div>
                               <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn green">Update</button>
                      <a href="<?php echo base_url();?>category"><button type="button" class="btn default">Cancel</button></a>
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
