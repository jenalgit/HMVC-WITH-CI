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
      Categories <small>Add page</small>
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
              </li>
            </ul>
          </div>
        </div>
                               </div>

                               <div class="portlet-body form">
                                 <form action="<?php echo base_url();?>pages/add" id="form_sample_3" method="post" class="form-horizontal">
                                <div class="form-body">
                                   <?php echo validation_errors('<p class="error">'); ?>
                               <div class="form-group">
                                  <label class="control-label col-md-3">Page Heading<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text"  data-required="1" class="form-control"  id="title"  name="heading" />
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Page Url After (http://www.curatigo.com/)<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text"  data-required="1" id="slug_url" class="form-control" name="url"  readonly/>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Meta Title<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text"  data-required="1" class="form-control" name="title" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Meta Description<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text"  data-required="1" class="form-control" name="description" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Meta Keyword<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-4">
                                    <input type="text"  data-required="1" class="form-control" name="keywords" />
                                  </div>
                                </div>
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                              <div class="form-group">
                           <label class="control-label col-md-3">Description</label>
                             <div class="col-md-9">
                              <textarea class="ckeditor form-control" name="content" rows="6" data-error-container="#editor2_error"></textarea>
                              <div id="editor2_error">
                         </div>
                       </div>
                     </div>

                      
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
                      <button type="submit" class="btn green">Submit</button>
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
    <script type="text/javascript">
   
 
 function string_to_slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  
  // remove accents, swap ñ for n, etc
  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  var to   = "aaaaeeeeiiiioooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
}
$(document).ready(function()
 {
    $('#title').change(function ()
    {

        var val = string_to_slug($('#title').val());
         $("#slug_url").attr("value",val);
        return false;
    });
});
      </script>

</html>