<?php defined('BASEPATH') OR exit('No direct script access allowed');

echo html_tag('lang="'.$this->lang->code().'" dir="'.$this->lang->direction().'"');
echo head_tag();

echo meta_charset();
echo base_href();
echo ie_edge();

template_title();
template_metadata();

echo viewport();
echo favicon();
echo apple_touch_icon_precomposed();
echo cleartype_ie();
echo '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>';
echo '<link href="../admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../admin/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>';
echo ' <link href="../admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>';
// END GLOBAL MANDATORY STYLES -->
// BEGIN PAGE LEVEL STYLES -->
echo '<link rel="stylesheet" type="text/css" href="../admin/assets/global/plugins/select2/select2.css"/>';

echo '<link href="../admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>';
echo '<link href="../admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>';
echo '<link href="../admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>';
// END PAGE LEVEL SCRIPTS -->
// BEGIN THEME STYLES -->
echo '<link href="../admin/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>';
echo '<link href="../admin/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../admin/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>';
echo '<link id="style_color" href="../admin/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../admin/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>';
// END THEME STYLES -->
file_partial('css');
template_partial('css');

echo js_platform();
echo js_selectivizr();
echo js_jquery();

template_partial('head');

echo head_close_tag();
echo '<body class="page-header-fixed page-quick-sidebar-push-content page-quick-sidebar-full-height">';

?>

    
<?php

file_partial('admin_navbar');

?>
        
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
             <?php file_partial('admin_sidebar'); ?>
        </div>
        <?php
            echo noscript('<div class="alert alert-warning text-center">'.$this->lang->line('ui_noscript').'</div>');
            echo unsupported_browser('<div class="alert alert-warning text-center">'.$this->lang->line('ui_unsupported_browser').'</div>');
        ?>
       <div class="page-content-wrapper">
        <div class="page-content"> 
        <div class="page-bar">
        <?php echo  $this->breadcrumbs->show(); ?>  
        </div> 
            <?php    
                template_body();
            ?>
        </div> 
             </div>
</div> <!-- <div class="container-fluid">-->


<?php
    file_partial('admin_footer');

    echo js_jquery_extra_selectors();
    echo js_bp_plugins();
    echo js_mbp_helper();
    echo js_scale_fix_ios();
    echo js_imgsizer();
// BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
// BEGIN CORE PLUGINS -->
//[if lt IE 9]>
echo '<script src="../admin/assets/global/plugins/respond.min.js"></script>';
echo '<script src="../admin/assets/global/plugins/excanvas.min.js"></script>'; 
//[endif]-->
// IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
echo '<script src="../admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>';

echo '<script src="../admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>';
//END CORE PLUGINS -->
// BEGIN PAGE LEVEL PLUGINS -->
echo '<script type="text/javascript" src="../admin/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>';
// END PAGE LEVEL PLUGINS -->
// BEGIN PAGE LEVEL PLUGINS -->
echo '<script type="text/javascript" src="../admin/assets/global/plugins/select2/select2.min.js"></script>';
echo '<script src="../admin/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>';
// END PAGE LEVEL PLUGINS-->
// BEGIN:File Upload Plugin JS files-->
// The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>';
//The Templates plugin is included to render the upload/download listings -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>';
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>';
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>';
//blueimp Gallery script -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>';
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>';
echo'<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>';
// The File Upload processing plugin -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>';
// The File Upload image preview & resize plugin -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>';
// The File Upload audio preview plugin -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>';
// The File Upload video preview plugin -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>';
// The File Upload validation plugin -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>';
// The File Upload user interface plugin -->
echo '<script src="../admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"  type="text/javascript"></script>';

echo '<script src="../admin/assets/admin/pages/scripts/form-wizard.js"  type="text/javascript"></script>';

// END:File Upload Plugin JS files-->
// END PAGE LEVEL PLUGINS -->
echo '<script src="../admin/assets/global/scripts/metronic.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>';
echo ' <script src="../admin/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>';
echo '<script src="../admin/assets/admin/pages/scripts/form-fileupload.js"></script>'; 

echo '<script>
      jQuery(document).ready(function() {    
          Metronic.init(); // init metronic core components
          Layout.init(); // init current layout
          QuickSidebar.init(); // init quick sidebar
          Demo.init(); // init demo features
           FormWizard.init();
           TableAdvanced.init();

      });
   </script>';

echo '<script type="text/javascript" src="../admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="../admin/assets/global/plugins/bootstrap-markdown/lib/markdown.js"></script>'; 
echo '<script src="../admin/assets/admin/pages/scripts/form-validation.js"></script>';?>

<?php 
 echo  '<script type="text/javascript" src="../admin/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>';
 echo  '<script type="text/javascript" src="../admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>';
 echo  '<script  type="text/javascript" src="../admin/assets/admin/pages/scripts/table-advanced.js"></script>';
 echo  '<script type="text/javascript" src="../admin/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>';
 echo  '<script type="text/javascript" src="../admin/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>';
 echo  '<script type="text/javascript" src="../admin/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>';




?>
 
<?php 

    echo div_debug();
    echo body_close_tag();
    echo html_close_tag();

?>

<?php

if(($this->router->fetch_class() == "user_controller") && ($this->router->fetch_method() == "stores_roles")){
    echo js('customize/stores.js');
}else{
    echo js('customize/home.js');
}

?>
