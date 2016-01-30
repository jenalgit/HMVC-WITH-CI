<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

   <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->         
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">                
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>               
                <li class="sidebar-search-wrapper">
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->                 
                    <form class="sidebar-search " action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                        </a>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                            </span>
                        </div>
                    </form>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
                <li class="start ">
                    <a href="javascript:;">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="arrow "></span>
                    </a>
                    
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Collection</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url();?>collections/add">
                            <i class="icon-home"></i>
                            Add Collection</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>collections">
                            <i class="icon-pencil"></i>
                             View Collection</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Products</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url();?>products/add">
                            <i class="icon-home"></i>
                            Add Product</a>
                        </li>
                      
                        <li>
                            <a href="<?php echo base_url();?>products">
                            <i class="icon-pencil"></i>
                             View Product</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Story</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url();?>stories/add">
                            <i class="icon-home"></i>
                            Add Story</a>
                        </li>
                      
                        <li>
                            <a href="<?php echo base_url();?>stories">
                            <i class="icon-pencil"></i>
                             View Story</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Users</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url();?>user/create">
                            <i class="icon-home"></i>
                            Add User</a>
                        </li>
                      
                        <li>
                            <a href="<?php echo base_url();?>user">
                            <i class="icon-pencil"></i>
                             View  User</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Category</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url();?>category/add">
                            <i class="icon-home"></i>
                            Add Category</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>category">
                            <i class="icon-pencil"></i>
                             View Category</a>
                        </li>
                    </ul>
                </li>
                
                <li class="heading">
                    <h3 class="uppercase">Features</h3>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title">Form Stuff</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="form_controls_md.html">
                            <span class="badge badge-roundless badge-danger">new</span>Material Design<br>
                            Form Controls</a>
                        </li>
                        <li>
                            <a href="form_controls.html">
                            Bootstrap<br>
                            Form Controls</a>
                        </li>
                        <li>
                            <a href="form_icheck.html">
                            iCheck Controls</a>
                        </li>
                        <li>
                            <a href="form_layouts.html">
                            Form Layouts</a>
                        </li>
                        <li>
                            <a href="form_editable.html">
                            <span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
                        </li>
                        <li>
                            <a href="form_wizard.html">
                            Form Wizard</a>
                        </li>
                        <li>
                            <a href="form_validation.html">
                            Form Validation</a>
                        </li>
                        <li>
                            <a href="form_image_crop.html">
                            <span class="badge badge-roundless badge-danger">new</span>Image Cropping</a>
                        </li>
                        <li>
                            <a href="form_fileupload.html">
                            Multiple File Upload</a>
                        </li>
                        <li>
                            <a href="form_dropzone.html">
                            Dropzone File Upload</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-briefcase"></i>
                    <span class="title">Data Tables</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="table_basic.html">
                            Basic Datatables</a>
                        </li>
                        <li>
                            <a href="table_tree.html">
                            Tree Datatables</a>
                        </li>
                        <li>
                            <a href="table_responsive.html">
                            Responsive Datatables</a>
                        </li>
                        <li>
                            <a href="table_managed.html">
                            Managed Datatables</a>
                        </li>
                        <li>
                            <a href="table_editable.html">
                            Editable Datatables</a>
                        </li>
                        <li>
                            <a href="table_advanced.html">
                            Advanced Datatables</a>
                        </li>
                        <li>
                            <a href="table_ajax.html">
                            Ajax Datatables</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-wallet"></i>
                    <span class="title">Portlets</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="portlet_general.html">
                            General Portlets</a>
                        </li>
                        <li>
                            <a href="portlet_general2.html">
                            <span class="badge badge-roundless badge-danger">new</span>New Portlets #1</a>
                        </li>
                        <li>
                            <a href="portlet_general3.html">
                            <span class="badge badge-roundless badge-danger">new</span>New Portlets #2</a>
                        </li>
                        <li>
                            <a href="portlet_ajax.html">
                            Ajax Portlets</a>
                        </li>
                        <li>
                            <a href="portlet_draggable.html">
                            Draggable Portlets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Charts</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="charts_amcharts.html">
                            amChart</a>
                        </li>
                        <li>
                            <a href="charts_flotcharts.html">
                            Flotchart</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-docs"></i>
                    <span class="title">Pages</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="page_timeline.html">
                            <i class="icon-paper-plane"></i>
                            <span class="badge badge-warning">2</span>New Timeline</a>
                        </li>
                        <li>
                            <a href="extra_profile.html">
                            <i class="icon-user-following"></i>
                            <span class="badge badge-success badge-roundless">new</span>New User Profile</a>
                        </li>
                        <li>
                            <a href="page_todo.html">
                            <i class="icon-check"></i>
                            Todo</a>
                        </li>
                        <li>
                            <a href="inbox.html">
                            <i class="icon-envelope"></i>
                            <span class="badge badge-danger">4</span>Inbox</a>
                        </li>
                        <li>
                            <a href="extra_faq.html">
                            <i class="icon-question"></i>
                            FAQ</a>
                        </li>
                        <li>
                            <a href="page_calendar.html">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-danger">14</span>Calendar</a>
                        </li>
                        <li>
                            <a href="page_coming_soon.html">
                            <i class="icon-flag"></i>
                            Coming Soon</a>
                        </li>
                        <li>
                            <a href="page_blog.html">
                            <i class="icon-speech"></i>
                            Blog</a>
                        </li>
                        <li>
                            <a href="page_blog_item.html">
                            <i class="icon-link"></i>
                            Blog Post</a>
                        </li>
                        <li>
                            <a href="page_news.html">
                            <i class="icon-eye"></i>
                            <span class="badge badge-success">9</span>News</a>
                        </li>
                        <li>
                            <a href="page_news_item.html">
                            <i class="icon-bell"></i>
                            News View</a>
                        </li>
                        <li>
                            <a href="page_timeline_old.html">
                            <i class="icon-paper-plane"></i>
                            <span class="badge badge-warning">2</span>Old Timeline</a>
                        </li>
                        <li>
                            <a href="extra_profile_old.html">
                            <i class="icon-user"></i>
                            Old User Profile</a>
                        </li>
                    </ul>
                </li>                               
                <li>
                    <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">Login Options</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="login.html">
                            Login Form 1</a>
                        </li>
                        <li>
                            <a href="login_2.html">
                            Login Form 2</a>
                        </li>
                        <li>
                            <a href="login_3.html">
                            Login Form 3</a>
                        </li>
                        <li>
                            <a href="login_soft.html">
                            Login Form 4</a>
                        </li>
                        <li>
                            <a href="extra_lock.html">
                            Lock Screen 1</a>
                        </li>
                        <li>
                            <a href="extra_lock2.html">
                            Lock Screen 2</a>
                        </li>
                    </ul>
                </li>
                <li class="heading">
                    <h3 class="uppercase">More</h3>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-logout"></i>
                    <span class="title">Quick Sidebar</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="quick_sidebar_push_content.html">
                            Push Content</a>
                        </li>
                        <li>
                            <a href="quick_sidebar_over_content.html">
                            Over Content</a>
                        </li>
                        <li>
                            <a href="quick_sidebar_over_content_transparent.html">
                            Over Content & Transparent</a>
                        </li>
                        <li>
                            <a href="quick_sidebar_on_boxed_layout.html">
                            Boxed Layout</a>
                        </li>
                    </ul>
                </li>

                <li class="last ">
                    <a href="javascript:;">
                    <i class="icon-pointer"></i>
                    <span class="title">Maps</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="maps_google.html">
                            Google Maps</a>
                        </li>
                        <li>
                            <a href="maps_vector.html">
                            Vector Maps</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->