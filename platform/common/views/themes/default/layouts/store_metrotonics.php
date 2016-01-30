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
echo '<link href="../www/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>';
echo ' <link href="../www/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>';
echo ' <link href="../www/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>';
echo '<link href="../www/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>';
echo '<link href="../www/admin/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>';

echo '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/clockface/css/clockface.css"/>';
echo '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>';
echo '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>';
echo '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>';
echo '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>';
echo '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>';


// BEGIN THEME STYLES -->
echo '<link href="../www/admin/assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="../www/admin/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>';
echo '<link id="style_color" href="../www/admin/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>';
echo '<link href="../www/admin/assets/custome_css/store_view_account_detail.css" rel="stylesheet" type="text/css"/>
<link href="../www/admin/assets/custome_css/store_view_analytics.css" rel="stylesheet" type="text/css"/>';
// END THEME STYLES -->

file_partial('css');
template_partial('css');

echo js_platform();
echo js_selectivizr();
echo js_jquery();

template_partial('head');

echo head_close_tag();
echo '<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed page-sidebar-closed page-container-bg-solid" data-spy="scroll" data-target="#myScrollspy">';

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
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Store</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
           <a href="store_view_account_details.html">Seller Account</a>
          </li>
        </ul>
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
// IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
echo '<script src="../www/admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>';

echo '<script src="../www/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="../www/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../www/admin/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>';



echo '<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amcharts/amcharts.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amcharts/serial.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amcharts/pie.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amcharts/radar.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amcharts/themes/light.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amcharts/themes/patterns.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amcharts/themes/chalk.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/ammap/ammap.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/amcharts/amstockcharts/amstock.js"></script>';


echo '<script type="text/javascript" src="../www/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script><script type="text/javascript" src="../www/admin/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>';

echo '<script src="../www/admin/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>';
echo '<script src="../www/admin/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>';
echo'<script src="../www/admin/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>';

echo '<script type="text/javascript" src="../www/admin/assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>';


echo '<script type="text/javascript" src="../www/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../www/admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>';

// END PAGE LEVEL PLUGINS -->
echo '<script src="../www/admin/assets/global/scripts/metronic.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>';
echo ' <script src="../www/admin/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/admin/pages/scripts/charts-amcharts.js"></script>';
echo ' <script src="../www/admin/assets/admin/pages/scripts/profile.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/admin/pages/scripts/components-pickers.js"></script>';
echo '<script src="../www/admin/assets/custom_js/store_view_analytics.js" type="text/javascript"></script>';
echo '<script src="../www/admin/assets/admin/pages/scripts/form-fileupload.js"></script>';

echo '<script>
jQuery(document).ready(function() {  
  Metronic.init(); 
  Layout.init(); 
  QuickSidebar.init(); 
  Demo.init(); 
  Profile.init();
  ChartsAmcharts.init();
  ComponentsPickers.init();     
        });   
    </script>';



    echo div_debug();
    echo body_close_tag();
    echo html_close_tag();

?>
