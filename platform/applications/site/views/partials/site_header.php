<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

     <header>
          <div class="main-header inner-page-header">
            <div class="container-fluid">
              <div class="row-fluid">
                <div class="login-desktop-header">
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xl-4 col-xs-4 for-mobile">
                    <div class="header-search-form">
                      <form method="get" action="" role="search">
                        <i class="fa fa-search"></i>
                        <input type="search" name="s" placeholder="Search here" title="Search for:" value="">
                        <span></span>
                        <i class="fa fa-close"></i>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 top-menu-css">
                    <div class="col-lg-6 col-md-5 col-sm-5 text-right">
                      <a href="<?php echo base_url();?>">Collections</a>
                      <a href="<?php echo base_url().'stories';?>">Stories</a>
                     
                     </div>
                     <div class="col-lg-1 col-md-2 col-sm-12">
                      <div class="logo-css"><a href="<?php echo base_url();?>"><img alt="" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/logo2.svg">
                          <i class="fa fa-caret-down"></i></a>
<ul class="mobile-menu">
<li><a  href="<?php echo base_url();?>" <?php echo ($this->uri->segment(1)=='')?'class="active"':'';?>>Collections</a></li>
<li><a href="<?php echo base_url().'stories';?>" <?php echo ($this->uri->segment(1)=='stories')?'class="active"':'';?>>Stories</a></li>
<li><a href="<?php echo base_url().'product';?>" <?php echo ($this->uri->segment(1)=='product')?'class="active"':'';?>>Products</a></li>
<!-- <li><a href="javascript:;">Demo</a></li> -->
</ul>
                        </div>
                      </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 text-left">
                      <a href="<?php echo base_url().'product';?>">Products</a>
                     <a href="#">demo</a>
                     </div>
                  </div>
                  

<?php 

     if($this->session->userdata('user_logged')!=''){
        $this->load->helper(array('usersinfo/usersinfo')); 


        ?>          <div class="col-lg-3 col-md-3 col-sm-4 col-xl-4 col-xs-4 header-icons-css">
                    <div class="pull-right cart-info-section">
                      <ul>
                        <li class="btn-group"><a href="javascript:;"><span class="cart-name"><i class="fa fa-bolt"></i> </span> </a> </li>                       
                        <li class="btn-group">

                          <span data-toggle="dropdown" aria-expanded="true" class="dropdown-toggle">

                          <span class="user-name"><span class="counting not-count">6</span><i class="fa fa-bell-o"></i>
                         
                              <ul class="dropdown-menu notification-css" role="menu">
                            <span class="main-notification"> <span class="remaining-notification">You have 6 New Notification</span> <span class="view-all-notification"><a href="javascript:;">View all</a></span> </span>
                            <li> <a href="javascript:;"> <span class="notification-left"><img src="../assets/curatigo/images/avatar_small.jpg"></span> <span class="notification-right">
                              <h4>David Nester - Commented on your wall</h4>
                              <p> Meeting postponed to tomorrow </p>
                              <time> A min ago </time>
                              </span> </a> </li>
                            <li> <a href="javascript:;"> <span class="notification-left"><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/avatar_small.jpg"></span> <span class="notification-right">
                              <h4>David Nester - Commented on your wall</h4>
                              <p> Meeting postponed to tomorrow </p>
                              <time> A min ago </time>
                              </span> </a> </li>
                            <li> <a href="javascript:;"> <span class="notification-left"><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/avatar_small.jpg"></span> <span class="notification-right">
                              <h4>David Nester - Commented on your wall</h4>
                              <p> Meeting postponed to tomorrow </p>
                              <time> A min ago </time>
                              </span> </a> </li>
                          </ul>
                           </span>  </span>
                        
                        </li>
                        <li class="btn-group header-user-login">
                          <span class="dropdown-toggle cog-css">
                            <?php echo username_photo_by_id($this->session->userdata('_current_user_id'));?>
                            <ul role="menu" class="dropdown-menu account-info-css">
                            
                            <li><a href="<?php echo base_url();?>usersinfo/<?php echo $this->session->userdata('_current_user_id');?>">My Profile </a> </li>
                            <!-- <li><a href="javascript:;">My Account </a> </li>
                            <li><a href="javascript:;">My Feeds</a></li>
                            <li><a href="javascript:;">My Dashboard</a></li>
                            <li><a href="javascript:;">My Collections</a></li>
                            <li><a href="javascript:;">My Shop</a></li> -->
                            <li class="divider"></li>
                            <li> <a href="<?php echo base_url();?>hauth/logout"><i class="icon icon-power-off"></i>Log out</a> </li>

                          </ul>
                          </span>
                        
                        </li>
                      
                        
                        
                      </ul>
                    </div>
                     </div>

<?php }else{?>

 <div class="col-lg-3 col-md-3 col-sm-4 col-xl-4 col-xs-4 login-new-text">
                    <div class="pull-right cart-info-section login-text">
                      <ul>
                       
                      <li><a data-popup-open="popup-1" href="javascript:;">Login </a></li> 
                        <!--<li><a data-target="#common-form" data-toggle="modal" href="javascript:;">Sign Up</a></li>-->
                      </ul>
                    </div>
                  </div>


<?php }?>


                 
                </div>
              </div>
            </div>
          </div>
          
        </header>



   <!--====== Login/Register Section Start ======-->   



    <div id="common-form" class="modal fade common-form-user social-user-form" role="dialog" tabindex="-1" data-replace="true">
      <div class="modal-dialog login-form">
    
        
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          
              <div class="modal-body">
                <div class="modal-header">
                   <h2>Login to Join The Community</h2>
                 </div>
                 
                    <div class="user-register-bottom">
                    
                         <ul>
                           <li><a href="<?php echo base_url(); ?>hauth/login/Facebook" class="fb-register"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                           <li><a href="<?php echo base_url(); ?>hauth/login/Twitter" class="tw-register login-button" ><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
                           
                         
                         </ul>
                     
                    </div> 
                 
                   
              </div>
          
        </div>
    
      </div>
    </div>




 


<div class="popup full-pageClose" data-popup="popup-1" style="display: none;">
	<button type="button" class="fa fa-close pageClose_class"></button>
    <div class="popup-inner">    
    	<div class="imageClass">
        	<div class="inner_image"></div>
            <div class="inner_text">
            	<h2 id="login_msg1">Login to Join The Community</h2>
                <p id="login_msg2">Curatigo is a community to share and geek out about the latest collection, products and Stories. Join us :)</p>
            </div>
            <div class="user_list">
            <!-- 	<ul class="userUL">
                	<li><span><img src="../assets/curatigo/images/user1.jpg" alt="user"></span></li>
                    <li><span><img src="../assets/curatigo/images/user4.jpg" alt="user"></span></li>
                    <li><span><img src="../assets/curatigo/images/user-8.jpg" alt="user"></span></li>
                    <li><span><img src="../assets/curatigo/images/user6.jpg" alt="user"></span></li>
                    <li><span><img src="../assets/curatigo/images/user1.jpg" alt="user"></span></li>
                    <li><span><img src="../assets/curatigo/images/user7.jpg" alt="user"></span></li>
                </ul> -->
       	   </div>
           <div class="social_site">
           		<a href="<?php echo base_url(); ?>hauth/login/Twitter" class="social_tab twitter">
                	<span class="social_icon">
                    	<i class="fa fa-twitter"></i>
                    </span>
                    <span class="twitter_login">Login with Twitter</span>
                </a>
                <a href="<?php echo base_url(); ?>hauth/login/Facebook" class="social_tab facebook">
                	<span class="social_icon">
                    	<i class="fa fa-facebook"></i>
                    </span>
                    <span class="twitter_login">Login with Facebook</span>
                </a>
           </div>
           <p> We'll never post to Twitter or Facebook without your permission. </p>
        </div>       
    </div>
</div>


