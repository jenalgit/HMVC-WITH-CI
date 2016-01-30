<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <style type="text/css">
  .error { 
    text-align: center;
    margin-top: 10px;
    color: red;
    font-size: 18px;
    }
    </style>  
<?php echo '<link href="../www/admin/assets/global/css/add_product.css" rel="stylesheet" type="text/css"/>'; ?>


                <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i> Add Products - 
                <span class="step-title">Variant Information </span>
              </div>              
            </div>
            <div class="portlet-body form">
                <div class="form-wizard">
                  <div class="form-body">
                    <ul class="nav nav-pills nav-justified steps">
                                             <li>
                                          <a class="step" data-toggle="tab" href="#file-upload_tab">
                                              
                                            </a>
                                        </li>       
                    </ul>
                   
                    <div class="tab-content">
                                                <?php echo validation_errors('<p class="error">'); ?>    
                            
                                  <!-- BEGIN MIDDLE PAGE FORM-CONTAINER TAB-7 CONTENT-->                                                                     
                                     <div class="tab-pane" id="file-upload_tab">    
                                       <button class="btn btn-lg blue btn_class" id="main_variant"> Add New Variants <i class="fa fa-plus"></i></button>
                                                                <div class="table-scrollable tablediv_class">
                                <form id="fileupload" method="POST" enctype="multipart/form-data">    
                                    <input type="hidden" name="product_id_variant" value="<?php echo $id; ?>" /> 
                                    <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />  
                                    <table class="table table-bordered table-striped table-advance">
                                   <thead>
                                         <tr>
                                                                                <th><i class="fa fa-user"></i> Name</th>
                                                                                <th><i class="fa fa-th"></i> Size</th>
                                                                                <th><i class="fa fa-barcode"></i> Price</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr class="secondtr_class">
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                     <input type="text" class="form-control" id="variant_name" name="variant_name" placeholder="Variant Name" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                           <select class="form-control" name="variant_size">
                                                                                                   <option value="">---Select---</option>
                                                                                                    <option value="XL">&nbsp;XL</option>
                                                                                                    <option value="LG">&nbsp;LG</option>
                                                                                                    <option value="MD">&nbsp;MD</option>
                                                                                              </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                       <input type="text" class="form-control" id="price" name="variant_price" pattern="\d+(\.\d{2})?" placeholder="Variant price" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>      
                                                     <div class="row fileupload-buttonbar">
                                                      <div class="col-lg-7">
                                                        <span class="btn green fileinput-button">
                                                            <i class="fa fa-plus"></i>
                                                            <span>Add Image... </span>
                                                            <input type="file" name="files[]" multiple>
                                                        </span>

                                                        <button type="submit"  class="btn blue start">
                                                            <i class="fa fa-upload"></i>
                                                            <span>Start upload </span>
                                                        </button>
                                                        <button type="reset" class="btn warning cancel">
                                                            <i class="fa fa-ban-circle"></i>
                                                            <span>Cancel upload </span>
                                                        </button>
                                              <button class="btn blue start" id="variant"> Add More Variants <i class="fa fa-plus"></i></button>         
                                                        <input type="checkbox" class="toggle">
                                                        <!-- The global file processing state -->
                                                        <span class="fileupload-process"></span>
                                                    </div>                                          
                                                    <div class="col-lg-5 fileupload-progress fade">
                                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                            <div class="progress-bar progress-bar-success" style="width:0%;">
                                                            </div>
                                                        </div>
                                                        <div class="progress-extended">
                                                             &nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                    <table role="presentation" class="table table-striped clearfix">
                                                        <tbody class="files">
                                                        </tbody>
                                                    </table>
                                                </form>    
                                                </div> 


                                                   <div class="table-scrollable tablediv_class2" style="display:none;">
                                       <form id="fileupload2" method="POST" enctype="multipart/form-data">    
                                                  <input type="hidden" name="product_id_variant" value="<?php echo $id; ?>" /> 
                                                  <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />  
                                                  <table class="table table-bordered table-striped table-advance">
                                             <thead>
                                         <tr>
                                                                                <th><i class="fa fa-user"></i> Name</th>
                                                                                <th><i class="fa fa-th"></i> Size</th>
                                                                                <th><i class="fa fa-barcode"></i> Price</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr class="secondtr_class">
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                     <input type="text" class="form-control" id="variant_name" name="variant_name" placeholder="Variant Name">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                           <select class="form-control" name="variant_size">
                                                                                                   <option value="">---Select---</option>
                                                                                                    <option value="XL">&nbsp;XL</option>
                                                                                                    <option value="LG">&nbsp;LG</option>
                                                                                                    <option value="MD">&nbsp;MD</option>
                                                                                              </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                       <input type="text" class="form-control" id="price" name="variant_price" placeholder="Variant price">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>      
                                                     <div class="row fileupload-buttonbar">
                                                      <div class="col-lg-7">
                                                        <span class="btn green fileinput-button">
                                                            <i class="fa fa-plus"></i>
                                                            <span>Add Image... </span>
                                                            <input type="file" name="files[]" multiple>
                                                        </span>

                                                        <button type="submit"  class="btn blue start">
                                                            <i class="fa fa-upload"></i>
                                                            <span>Start upload </span>
                                                        </button>
                                                        <button type="reset" class="btn warning cancel">
                                                            <i class="fa fa-ban-circle"></i>
                                                            <span>Cancel upload </span>
                                                        </button>
                                              <button class="btn blue start" id="variant2"> Add More Variants <i class="fa fa-plus"></i></button>         
                                                        <input type="checkbox" class="toggle">
                                                        <!-- The global file processing state -->
                                                        <span class="fileupload-process"></span>
                                                    </div>                                          
                                                    <div class="col-lg-5 fileupload-progress fade">
                                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                            <div class="progress-bar progress-bar-success" style="width:0%;">
                                                            </div>
                                                        </div>
                                                        <div class="progress-extended">
                                                             &nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                    <table role="presentation" class="table table-striped clearfix">
                                                        <tbody class="files">
                                                        </tbody>
                                                    </table>
                                                </form>    
                                                </div> 
                                     <div class="table-scrollable tablediv_class3" style="display:none;">
                                       <form id="fileupload3" method="POST" enctype="multipart/form-data">    
                                                  <input type="hidden" name="product_id_variant"  value="<?php echo $id; ?>"  /> 
                                                  <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />  
                                                  <table class="table table-bordered table-striped table-advance">
                                             <thead>
                                         <tr>
                                                                                <th><i class="fa fa-user"></i> Name</th>
                                                                                <th><i class="fa fa-th"></i> Size</th>
                                                                                <th><i class="fa fa-barcode"></i> Price</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr class="secondtr_class">
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                     <input type="text" class="form-control" id="variant_name" name="variant_name" placeholder="Variant Name">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                           <select class="form-control" name="variant_size">
                                                                                                   <option value="">---Select---</option>
                                                                                                    <option value="XL">&nbsp;XL</option>
                                                                                                    <option value="LG">&nbsp;LG</option>
                                                                                                    <option value="MD">&nbsp;MD</option>
                                                                                              </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                      <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                       <input type="text" class="form-control" id="price" name="variant_price" placeholder="Variant price">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>      
                                                     <div class="row fileupload-buttonbar">
                                                      <div class="col-lg-7">
                                                        <span class="btn green fileinput-button">
                                                            <i class="fa fa-plus"></i>
                                                            <span>Add Image... </span>
                                                            <input type="file" name="files[]" multiple>
                                                        </span>

                                                        <button type="submit"  class="btn blue start">
                                                            <i class="fa fa-upload"></i>
                                                            <span>Start upload </span>
                                                        </button>
                                                        <button type="reset" class="btn warning cancel">
                                                            <i class="fa fa-ban-circle"></i>
                                                            <span>Cancel upload </span>
                                                        </button>       
                                                        <input type="checkbox" class="toggle">
                                                        <!-- The global file processing state -->
                                                        <span class="fileupload-process"></span>
                                                    </div>                                          
                                                    <div class="col-lg-5 fileupload-progress fade">
                                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                            <div class="progress-bar progress-bar-success" style="width:0%;">
                                                            </div>
                                                        </div>
                                                        <div class="progress-extended">
                                                             &nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                                    <table role="presentation" class="table table-striped clearfix">
                                                        <tbody class="files">
                                                        </tbody>
                                                    </table>
                                                </form>    
                                                </div>              


                                         </div>   
                                         <br/>
                           <button class="btn blue start" id="variant_save">Save & Finish </button>                                                                                                                         
                             <!-- END MIDDLE PAGE FORM-CONTAINER TAB-7 CONTENT-->                                                        
                    </div>                                                        
                  </div>
                  
                                </div>
              </form>
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
    

                     $('.tablediv_class').hide();
                     $('#variant_save').hide();
                      $('.btn_class').click(function()
                  {
                        $('.tablediv_class').show();
                        $('#main_variant').hide();
                        $('#variant_save').show();

                  
                   });

                       $('#variant').click(function()
                  {
                         $('.tablediv_class2').show();
                         $('#variant').hide();
                  
                   });
                     $('#variant2').click(function()
                  {
                        $('.tablediv_class3').show();
                        $('#variant2').hide();
                  
                   });   

                     $('#variant_save').click(function()
                   {  
                     window.location.href = 'products/index';
                   });   
    });
</script>
<script>   
 $(function(){


  $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'products/do_upload_variant',
       
    });

    $('#fileupload2').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'products/do_upload_variant',
    });

     $('#fileupload3').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'products/do_upload_variant',
        
    });
     });

     </script>
    
    </body>

</html>