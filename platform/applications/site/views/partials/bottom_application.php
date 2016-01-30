<?php $segment_footer=$this->uri->segment(1);
if($segment_footer!='stories'){?>


<div id="back-to-top" class="animate-top" style="opacity: 1; bottom: 10px;">
    <i class="fa fa-angle-up"></i>
  </div>
  <?php }?>
  
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/common/js/jquery-1.11.0.min.js" language="javascript"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/common/js//underscore-1.8.1.min.js" language="javascript"></script>
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/common/js/bootstrap.min.js" language="javascript"></script> 

<?php 

if($segment_footer=='stories'){?>

<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/bootstrap-multiselect.js"></script>

<!--  ======Story js start ====== -->
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/sample.js" language="javascript"></script>  
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/dropzone.js"></script>
<!-- ======Story js end ====== -->
<!--  ======Story js start ====== -->
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/story_section.js"></script>

<!-- ======Story js end ====== -->



<?php }else{?>
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/isotope.js" language="javascript"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/pi.js" language="javascript"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/owl.carousel2.0.js" language="javascript"></script>
<!-- ======product js start ====== -->
<script src="<?php echo $this->config->item('link_base_url');?>assets/common/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/common/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<!-- ======product js end ====== -->

<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/custom.js" language="javascript"></script> 

<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/commen_ajax.js"></script>

<?php }?>


<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/jquery-ui.triggeredAutocomplete.js"></script>
<script type="text/javascript" src='<?php echo $this->config->item('link_base_url');?>assets/common/js/jquery-mentions-input/jquery.mentionsInput.js'></script>


<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/sites_ajax.js"></script>




</body>


</html>





 
