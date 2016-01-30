<!doctype html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php 
 $meta_rec = getMeta();
if( array_key_exists('dynamic_meta',$meta_rec) && @is_array($meta_array) && !empty($meta_array) )
{
  if(  array_key_exists('meta_title',$meta_array) && $meta_array['meta_title']!='')
  {
    echo '<title>'.$meta_array['meta_title'].'</title>';
  }
  if( array_key_exists('meta_description',$meta_array) && $meta_array['meta_description']!='')
  {
    echo '<meta name="description" content="'.$meta_array['meta_description'].'" />';
  }
  if( array_key_exists('meta_keyword',$meta_array) && $meta_array['meta_keyword']!='')
  {
     echo '<meta  name="keywords" content="'.$meta_array['meta_keyword'].'" />';
  }
  
}else
{ 
?>
<title><?php echo $meta_rec['meta_title'];?> </title>
<meta name="description" content="<?php echo $meta_rec['meta_description'];?>" />
<meta  name="keywords" content="<?php echo $meta_rec['meta_keyword'];?>" />
<?php
}
?>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/common/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/common/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/common/css/jquery.mentionsInput.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/common.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/header.css" />

<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/landing.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/common-reviews.css" />

<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/dhLogin.css"/>

<?php $segment=$this->uri->segment(1);
if($segment=='stories'){?>

<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/story.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/dropzone.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/bootstrap-multiselect.css"/>
<?php }elseif($segment=='usersinfo'){?>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/profile-page.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/story.css" />
<?php }elseif($segment=='product'){?>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/global.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/products-page.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/common/css/jquery.mCustomScrollbar.css"/>
<link rel="stylesheet" href="<?php echo $this->config->item('link_base_url');?>assets/common/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/cangas.datepicker.css">
<?php }?>


<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/owl.carosel.2.0.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/comment-section-css.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/basic.css"/>

<link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/collection-landing.css" />

<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,200,500,600,700,900,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
<script src="http://cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>

<script type="text/javascript"> var base_url = '<?php echo base_url();?>';</script>
<script type="text/javascript"> var current_user_id = '<?php echo $this->session->userdata("_current_user_id");?>';</script>

</head>

<body>


       <!--======  Story Share Section Start ======-->


		<div class="common-form-share mCustomScrollbar" id="share-main-id">
                <div class="common-new share-box" id="share_box_section">


                </div>
              </div>

      <!--======  Story Share Section end ======-->

    
    <!--======  Story Main Content Section Start ======-->
    
    <section class="story-main-content-css" >

       
       <div class="scroll-wrap">
         <div class="content-item">              
           
          
         </div>
      </div>
      
    </section>

    <!--======  Story Main Content Section End ======-->

     <!--======  product Share  Main Content Section Start ======-->


   <div id="share-product" class="modal fade common-form-user1 common-popup" role="dialog" tabindex="-1" data-replace="true" style="display: none;" aria-hidden="true">
      <div class="modal-dialog registration-form share-form">

   <div class="modal-content">
   </div>
      </div></div>

  <!--======  product Share  Content Section end ======-->
