<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('partials/top_application');?>


        <div class="main-container inner-pages">
            <?php $this->load->view('partials/site_left'); ?>

            <!--====== Header Section Start ======-->

            <div class="main-body">

                <?php $this->load->view('partials/site_header'); ?>

                <div class="main-frame">
                    
                    <!-- Collection list header -->
            <section class="collection-single-header common-new common-section" style=" background-image:url(<?php echo $this->config->item('link_base_url'); ?>assets/curatigo/images/bg-new.jpg);">
                       
                       <div class="container">
                            <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="top-content">
                            <h4 style="text-transform:capitalize"> <?php echo $collection['title'];?> </h4>
                             <p><?php echo  $collection['tag_line'];?></p>
                           <div class="votes-css">
                              <a class="votes-col-count" href="javascript:;" 
                                           <?php if($this->session->userdata('user_logged')!=''){?>
                             onclick="increase('0','<?php echo $collection['id']?>','<?php echo $this->session->userdata('_current_user_id');?>');"
                            <?php }else{?>
                            data-toggle="modal" data-target="#common-form"
                            <?php }?>
                            ><i class="fa fa-caret-up" ></i><span id="number_0_<?php echo $collection['id']?>"><?php echo vote_count_by_id('0',$collection['id'])?></span></a>
                                <?php if(!empty($collection['url_get'])) { ?>
                                  <a href="<?php echo $collection['url_get']; ?>" class="get-button btn-color button"> Get It</a>
                                  <?php }else{ ?>
                                 
                                  <?php } ?>
                         </div>
                  </div>
                </div>
                            </div>
                        </div>
                        
                        <div class="container-fluid">
          <div class="row">
              <div class="col-lg-10 col-md-10 col-sm-8 text-left cat-lists-css">
                       <a href="javascript:;"><?php echo  $collection['name'];?></a>
                 </div>
                    
             <!--<div class="col-lg-2 col-md-2 col-sm-4 pull-right text-right">
                   <a href="javascript:;" data-original-title="Add to collection" data-toggle="tooltip"><i class="fa fa-list"></i></a>
                   <!--<a href="javascript:;" data-original-title="Add to whislist" data-toggle="tooltip"><i class="fa fa-heart-o"></i></a>-->
                <!--</div>-->
          
          </div>
         
         </div>
                    </section>
                    <!-- End to Collection list header -->
                   
                    
                    
                    
                    
                    <section class="collection-single-mid common-new common-section">
          <div class="container-fluid">
             <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 colection-css">
                 <?php if($this->session->userdata('user_logged')!=''){?>
                   <?php }else{?>
                   <div class="join-us">
                    <p><b>Product Hunt surfaces the best new products, every day.</b></p>
                    <p>It's a place for product-loving enthusiasts to share and geek out about the latest mobile apps, websites, hardware projects, and tech creations.</p>
                    
                    <div class="join-bottom">
                       <span>JOIN THE COMMUNITY</span><span><a href="javascript:;" class="button btn-color">Login to Vote</a></span>
                    
                    </div>
                  
                  </div>
                   
                   <?php } ?>
                
                      <div class="main-products-list-css common-new">
                         <h4>Products</h4>
                        <div class="products-list-css products-new-css">
                    <div class="pi-section-w pi-section-white">
                      <div class="pi-section">
                        <div  id="isotope-products" class="pi-row pi-grid-small-margins pi-padding-bottom-40 isotope" data-isotope-mode="masonry">
                          <?php echo products_collection_detail($collection['id']);?>    
                        </div>
                      </div>
                    </div>
                  </div>
                    
                      </div>
                 
                   <div class="common-new comment-textarea" style="margin-bottom: 56px;">
                               <span id="comment_msg_<?php echo $collection['id']?>"></span>
                                  <textarea  class="form-control from-comments mention" placeholder="Add a comment....."  id="commentsubmit_<?php echo $collection['id']?>" style="height:100% !important;" ></textarea> <a href="javascript:;" class="enter-text"><i class="fa fa-level-down"></i></a>
                             
                           </div>
                           <br/>
                    <?php echo comments_data_collection($collection['id']);?>    
                   
                
                </div>  
                
                <div class="col-lg-3 col-md-4 col-sm-4 collection-right pro-right">
                   <div class="collection-sidebar common-new">
                        <div class="collection-widget-css">
                             <div class="widget-title">SHARE</div>
                              <div class="sharing-icons-css">
                                <?php $url=base_url().'collection/'.$collection['url_slug'];?>
                                 <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>&t=<?php echo $collection['title'];?>" target="_blank" class="fb-css"><i class="fa fa-facebook"></i></a>
                                 <a href="https://twitter.com/share?url=<?php echo $url;?>&text=<?php echo $collection['title'];?>" target="_blank" class="tw-css"><i class="fa fa-twitter"></i></a>
                                 <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url;?>&title=<?php echo $collection['title'];?>&source=<?php echo $url;?>" target="_blank" class="li-css"><i class="fa fa-linkedin"></i></a>
                                 <a href="https://pinterest.com/pin/create/button/?url=<?php echo $url;?>" target="_blank" class="pi-css"><i class="fa fa-pinterest"></i></a>
                                 <a href="javascript:;" data-target="#share-product-collection" data-toggle="modal"><i class="fa fa-share-alt"></i></a>
                              </div>
                        </div>
                        
                        <!--<div class="collection-widget-css no-makers">
                        
                             <div class="widget-title">0 makers</div>
                              <div class="no-maker-css">
                                 <p>No maker yet. <br>Be the first to <a href="javascript:;">suggest a maker.</a></p>
                              
                               </div>
                              </div>-->
                        <div class="collection-widget-css">
                             <div class="widget-title">1 makers</div>
                              <div class="list-user-info">
                                           <ul>
                                              <li class="collection-user">
                                                        <span class="common-card-css"> <?php echo username_photo_by_id($collection['user_id']);?> 
                                                        
                                                        <div class="collection-user-info-css common-card">
                                                           <div class="common-card-mid"> 
                                                            <?php echo user_info_id($collection['user_id']);?>
                                                         </div>
                                                        </div>
                                                        
                                                         </span>
                                                    
                                              </li> 
                                              
                                              <!--<li class="collection-user product-made">
                                                <span class="common-card-css"><span class="makers"> M</span>
                                                        
                                                        <div class="collection-user-info-css common-card">
                                                           <div class="common-card-mid"> 
                                                            <a href="javascript:;" class="bg-new-css">
                                                                <div class="new-info-css">
                                                                    <span><img src="../assets/curatigo/images/avatar_small.jpg" alt="" class="photo"></span>
                                                                    <span class="fullname">wafaehoney </span>
                                                                    <span class="comp-info">99 Bazaars</span>
                                                                    <span class="username">@wafaehoney </span>
                                                                </div>
                                                             <button href="javascript:;" class="button btn-color follow-btn">Follow</button> 
                                                            </a>
                                                         </div>
                                                        </div>
                                                        
                                                         </span>
                                                 
                                              </li>--> 
                                                 
                                                 
                                           </ul>   
                                          </div>
                        </div>
                        
                        <div class="collection-widget-css">
                             <div class="widget-title"><?php echo vote_count_by_id('0',$collection['id'])?> UPVOTES</div>
                              <div class="list-user-info">
                              <div class="carosel-css">
                                     <?php  foreach($collection_users as $users_collection_val) :?>
                                            <div class="item">
                                                <li class="collection-user">
                                                    <span class="common-card-css"> <?php echo username_photo_by_id($users_collection_val['user_id']);?> 
                                                    
                                                    <div class="collection-user-info-css common-card">
                                                                   <div class="common-card-mid"> 
                                                                    <?php echo user_info_id($users_collection_val['user_id']);?>
                                                                 </div>
                                                                </div>
                                                                </span>                              
                                                                  </li>
                                             </div> 
                                      <?php endforeach;?>
							 </div>                
                               </div>
                        </div>
                        
                        
                        
                        <div class="collection-widget-css similar-product-css">
                             <div class="widget-title">Similar Collections</div>
                              <div class="list-user-info">
                              
                                 <div id="similar-product" class="carousel slide">
                
               
                                      <div class="carousel-inner">
                                      <?php $i = 1; ?>
                                <?php  foreach($collection_list as $collection) :?>       
                                            <div class="item  <?php echo ($i == 1 )? 'active':'';?>">
                                              <div class="similar-product-list">
                                                  <a href="javascript:;">
                                              <div class="col-lg-3 col-md-3 col-sm-3 pro-left"><span id="number_0_<?php echo $collection['id']?>"><i class="fa fa-caret-up"></i><?php echo vote_count_by_id('0',$collection['id'])?></span></div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 pro-left">
                                                       <h4><?php echo $collection['title'];?> </h4>
                                                       <p><?php echo $collection['tag_line'];?></p>
                                                    </div>
                                                  </a>  
                                              </div>     
                                            </div>
                                            <?php $i++; ?>
                                            <?php endforeach;?>
                                       </div>
                               
                                   <a class="left carousel-control" href="#similar-product" data-slide="prev"><i class="fa fa-angle-left"></i></a>

                                   <a class="right carousel-control" href="#similar-product" data-slide="next"><i class="fa fa-angle-right"></i></a>
                              </div>
                                              
                               </div>
                        </div>
                        
                        <div class="fixed-user-strip">
          
                           <div class="list-user-info">
                               <ul>
                                  <li class="collection-user">
                                            
                                     <span class="common-card-css"> <?php echo username_photo_by_id($collection['user_id']);?>
                                                        
                                                <div class="collection-user-info-css common-card">
                                                   <div class="common-card-mid"> 
                                                    <a class="bg-new-css" href="javascript:;">
                                                         <?php echo user_info_id($collection['user_id']);?>
                                                    
                                                    </a>
                                                 </div>
                                                </div>
                                                        
                                          </span>       
                                        
                                  </li> 
                                      <?php if($collection['is_featured'] == 1){ ?>
             <li class="fixed-user-info"><a href="javascript:;">Featured</a> <a href="javascript:;"><?php echo  $collection['created_at']; ?></a></li>
                                             <?php } else { ?>
              <li class="fixed-user-info"><a href="javascript:;">Uploaded</a> <a href="javascript:;"><?php echo $collection['created_at']; ?></a></li>          
                                             <?php }  ?>
                                  <li class="user-flag"><a href="javascript:;"><i class="fa fa-flag"></i></a></li>
                                   
                               </ul>   
                              
                          
                          </div>
        
        
       					 </div>
                   
                    </div>
                
                
                </div>
             
             </div>
          
          </div>
       
       
       
       </section>
                    
                    
                    


                    
                    
                    <?php $this->load->view('partials/site_footer'); ?> 

                </div>   

<?php  $current_url = $_SERVER['REQUEST_URI']?>
<!-- === Share Popup ===-->

 <div style="display: none;" data-replace="true" tabindex="-1" role="dialog" class="modal fade common-form-user common-popup" id="share-product-collection">
          <div class="modal-dialog registration-form">
        
            
            <div class="modal-content">
             <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Share This Thing</h4>
            </div>
              
                  <div class="modal-body"> 
                      <div class="share-things pop-body">
                         <div class="pop-body-top common-new">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 pro-left pro-right">
                             <h4><?php echo $collection['title'];?> <a href="javascript:;"><span><?php echo $collection['tag_line'];?></span></a></h4>
                                   <p class="link"><?php echo $current_url; ?></p>
                                </div>
                               
                          </div>
                          
                          <div class="pop-body-mid common-new">
                             <div class="social-sharing-pop common-new">
                                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pro-left">
                                    <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>&t=<?php echo $collection['title'];?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/share?url=<?php echo $url;?>&text=<?php echo $collection['title'];?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url;?>&title=<?php echo $collection['title'];?>&source=<?php echo $url;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://pinterest.com/pin/create/button/?url=<?php echo $url;?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url=<?php echo $url;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $url;?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a href="http://www.stumbleupon.com/submit?url=<?php echo $url;?>&title=<?php echo $collection['title'];?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                   <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="javascript:;"><i class="fa fa-yelp"></i></a></li>
                                    <a class="last" href="javascript:;"><i class="fa fa-caret-right"></i></a>
                                  </ul>
                                 </div>
                             
                             </div>
                             
                             
                             
                              <div class="share-common common-new reviews_css ">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pro-left">
                    <span id="share_thanks_msg"></span>
                    <div class="tabbing-panel">

                      <ul class="nav">
                        <li class="active"><a href="#sendto" data-toggle="tab">Send To</a> <span class="indicator indicator-reviews"></span></li>
                        <li><a href="#product_embed" data-toggle="tab">Embed</a> <span class="indicator indicator-faq"></span></li>
                        <!-- <li><a href="#product_anywhere" data-toggle="tab">99bazaars Anywhere</a> <span class="indicator indicator-faq"></span></li> -->
                      </ul>
                    </div>
                  </div>
                  <div class="tab-content">
                    <div class="common-new tab-pane fade active in" id="sendto">
                      <ul>
                        <li>
                          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pro-left">To</div>
                         <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 pro-right input-box">
                                  <div class="btn-group"> <a href="javascript:;" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">On Friend's Email<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu">
                                     <!--  <li class="active"><a href="javascript:;" class="own-wall">On your own wall</a> </li> -->
                                      <li class="active"><a href="javascript:;" data-text="Friend's Name">On Friend's Email</a> </li>
                                      <!-- <li><a href="javascript:;" data-text="Followers">To Followers</a> </li> -->
                                      <!-- <li><a href="javascript:;" data-text="Community Name">In a community</a> </li> -->
                                    </ul>
                                  </div>
                                  <input type="text" placeholder="Friend's Email" name="data_value" id="data_value">
                                </div>
                        </li>
                       <li>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pro-left">Subject</div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 pro-right tag-box">
                                  <input type="text" placeholder="subject" name="subject" id="subject">
                                </div>
                              </li>
                          <li>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pro-left">Message</div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 pro-right">
                                  <textarea name="message" placeholder="Write a Message" id="message"></textarea>
                                </div>
                              </li>
                      </ul>
                        <div class="common-new">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <a class="button btn-color" id="share_send_pro">Send</a>
                                <a class="button btn-green" id="share_cancel_pro" >Reset</a>
                              </div>
                            </div>
                    </div>
                    <div class="common-new widget-contents tab-pane fade" id="product_embed">
                            <ul>
                              <li>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                  <label>Widget size</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                  <input type="text" placeholder="width" name="width" id="width"  onkeyup="getCustomValue(this);" >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                  <input type="text" placeholder="height" name="height" id="height"  onkeyup="getCustomValue(this);" >
                                </div>
                              </li>
                              <!-- <li>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                  <label>Contents</label>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  Title </div>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  Price </div>
                              </li> 
                              <li>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  Username </div>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  99bazaars it </div>
                              </li>-->
                              <li>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                  <p>Add this to your website by copying the code below.</p>
                                  <textarea id="custom_textarea"> <iframe src="<?php echo $url;?>" width="200" height="259" allowtransparency="true"  frameborder="0" style="width:200px;height:259px;margin:0 auto;border:0" ></iframe>
</textarea>
                                </div>
                              </li>
                            </ul>
                          </div>
                          
                    <div class="common-new tab-pane fade" id="product_anywhere">
                      <ul>
                        <li>
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <p> Fancy Anywhere enables your visitors to buy things on Fancy directly from your own blogs and websites. You will earn Fancy credits when they complete a purchase. For more information. </p>
                            <textarea><a href="http://fancy.to/0g7lok?ref=priyarai6483"&gt;&lt;img src="" width="" height="" class="" alt=""></a></textarea>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                          
                          </div>
                      
                      </div>   
                     
                       
                  </div>
                  
              
              
            </div>
        
          </div>
        </div>
     
</div>  
 
 
 </div>

                
<!-- === Share Popup END ===-->

                <!--====== Login/Register Section Start ======-->   



                <div id="common-form" class="modal fade common-form-user social-user-form" role="dialog" tabindex="-1" data-replace="true" style="display: none;">
                    <div class="modal-dialog login-form">


                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <div class="modal-body">
                                <div class="modal-header">
                                    <h4>Login</h4>
                                </div>

                                <div class="user-register-bottom">

                                    <ul>
                                        <li><a href="javascript:;" class="fb-register"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                        <li><a href="javascript:;" class="tw-register login-button"  data-target="#twitter-form" data-toggle="modal"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>


                                    </ul>

                                    <div class="bootom-message"> Don't have an account? <a href="javascript:;" data-toggle="modal" data-target="#common-form" class="common-button">Register</a> </div>
                                </div> 


                            </div>

                        </div>

                    </div>
                </div>
                
                
                
                
                

<div class="full-page-slider product-view"  id="img-repo">
     <button type="button" class="fa fa-close"></button>
            <div class="container">
            
                <div class="row">
                 <div class="loader-css"><img src="../assets/curatigo/images/loader.gif" alt="" /></div>
                    <div class="images">
                    
                       <div class="main-popup-slider">
                       
                          <div id="img-one" class="common-slider-content">
                            <div class="col-lg-5 col-md-7 col-sm-12 col-lg-offset-1"> <div class="product-large">
                            <img src="../assets/curatigo/images/port/port-1.jpg"  id="pop_img">
                            </div></div>
                            <div class="quick-view-right">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-1">
                            <div class="quick-view-right-top">
                                <h2 ><span id="pop_title">Control Blazer</span> <span class="quick-auth-name"><a target="_blank" href="javascript:;" id="pop_collection">Delta Handgoods</a></span></h2>
                                <p id="pop_desc">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                <div class="quick-star-rating pro-star-rating">
                                
                                  <div class="quick-price" ><del id="pop_price">$300</del><span class="discount" id="pop_sellprice">$150-$200</span></div>
                                  
                                </div>
                              
                              </div>
                                             
                             <div class="quick-view-cart">    
                               
                                   <div class="col-lg-4 col-md-5 col-sm-3 col-xs-4 pro-left">
                                     <div class="list-vote"  id="pop_vote_div">
                                     
                                       <a href="javascript:;">
                                          
                                           <span class="vote-count"><i class="fa fa-caret-up"></i><span id="pop_vote">0</span></span>
                                       </a>
                                  
                                     </div>
                                         
                                   </div> 
                                   
                                   <div class="col-lg-8 col-md-7 col-sm-9 col-xs-8 pro-left pro-right">  
                                         <a class="checkout-css button" id="pop_url" href="javascript:;" target="_blank">Get It</a>
                                   
                                   </div>
                                     
                              </div>             
                                           
                           </div>
                           
                             </div>   
                          </div>
                          
                          
                          
                          
                          
                    </div>
                 </div>
                </div> 
             </div>   
    <div class="controls-slidercol">
        <a href="javascript:;" class="prev" id="prev" rel="prev" ><i class="fa fa-angle-left"></i></a>
        <a href="javascript:;" class="next" id="next" rel="next" ><i class="fa fa-angle-right"></i></a>
    </div>		
    </div>


<?php $this->load->view('partials/bottom_application');?>
<script type="text/javascript">

 $('.show-slider .fa-close').click(function(e) {  
  $('.show-slider .fa-close').hide(); 
  $(this).hide();
    
});      

</script>
