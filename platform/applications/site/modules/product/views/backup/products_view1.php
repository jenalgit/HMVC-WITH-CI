<?php $this->load->view('partials/top_application');?>


<div class="main-container inner-pages">

    <?php $this->load->view('partials/site_left');?>

     




<!--====== Header Section Start ======-->
  
 
  <div class="main-body">
    
    <?php $this->load->view('partials/site_header');?>

    <div class="main-frame">
    
 <section style=" background-image:url(<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/header_banner_collection-hero-hipster-kitty.jpg);" class="product-single-header common-new common-section common-header-css">
         <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="top-content">
                            <h4>Products</h4>
                           <!--  <p> Curated list of the best programming tutorials on the web.</p> -->
                      </div>
                  
                
                </div>
                
            </div>
         
         </div>
         
         <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
               <div class="search-bars-css common-new">
                      <div class="filter-result">
                       <!-- <ul><li><a href="javascript:;" class="cat-filter">All</a> <a href="javascript:;" class="icons-cross"><i class="fa fa-close"></i></a></li>
                      <li><a href="javascript:;" class="cat-filter">Demo</a> <a href="javascript:;" class="icons-cross"><i class="fa fa-close"></i></a></li>
                      <li><a href="javascript:;" class="cat-filter">Demo New</a> <a href="javascript:;" class="icons-cross"><i class="fa fa-close"></i></a></li>
                      </ul> -->
                      </div>
                          
                </div>
             </div>   
          
          </div>
         
         </div>
        
       </section>   
    
      <section class="stories-products-section common-new common-section">
        <div class="container-fluid">
          <div class="row">
            <div class="main-products-list-css common-new">

        <?php
        if(is_array($res_product) && !empty($res_product) )
        {  

          //trace($res_product);

           echo "<script>".
                "var sliderData={products:''}; ".
                'sliderData.products='.json_encode($res_product).';'.
           '</script>'; 

 //trace($res_product);
          foreach($res_product as $key=>$product_val)
            {

    ?>
    <!-- divider-list -->
                <div class="products-view-list  common-new">
                
                  <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="searcbar-section">
                        
                        
                        <div class="date-css col-lg-12 col-md-12 col-sm-12">
                         
                         <span class="trigger today-date"> <?php echo get_dates_day($key,date("Y-m-d"));?>
                    <input type="text" class="end_date" /> </span>
                         
                         </div>
                        
                      </div>  
                  </div>
                  
                  <div class="products-new-css">
                    <div class="pi-section-w pi-section-white">
                      <div class="pi-section">
                        <div  id="isotope-products" class="pi-row pi-grid-small-margins pi-padding-bottom-40 isotope" data-isotope-mode="masonry">
                        
                         <?php 
                          $a=1;

                         

                         foreach($product_val as $index => $product_list){ 

                            $url=base_url().'product/details/'.$product_list['id'];
                            $pin_it_url='https://pinterest.com/pin/create/button/?url='.$url.'&media='.$product_list['image_path'].'&description='.$product_list['product_description'];
                          ?>

                          <div  class="pi-col-sm-3 pi-col-xs-6 isotope-item common-pro-popup">
                            <div class="pi-img-w images-box"> <a href="javascript:;" rel="#img-<?php echo $index;?>_<?php echo $key;?>" id="<?php echo $product_list['id'];?>"> <img src="<?php echo $product_list['image_path'];?>" alt="">
                              <div class="hover-icons"> 
                                <span class="pin-it"  ><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/pin.png" alt="" id="pin_it" rel="<?php echo $pin_it_url;?>" /></span> 
                                <span data-toggle="modal" data-target="#share-product" class="share-section"><i class="fa fa-share-alt " id="<?php echo $product_list['id'];?>"></i></span> </div>
                              </a>
                              <div class="products-view-info">

         <?php  $onclick_array_view=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$product_list['title_p'],
                                                            'section_type'=>'1',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$product_list['id'],

                                                    );?>
                        

                                <button type="button" <?php echo onclick_upvote($onclick_array_view);?> class="votes-col-count active" >
                                  <i class="fa fa-caret-up"></i> <span id="number_1_<?php echo $product_list['id']?>">
                                  <?php echo vote_count_by_id('1',$product_list['id'])?></span> </button>
                                <h4><?php echo $product_list['title_p'];?></h4>
                              </div>
                               </div>
                          </div>

                          <?php $a++;}?>
                        
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  
                 <!--  <div class="common-new"><a class="button see-more-css btn-color" href="javascript:;">See More</a></div> -->
                 
                 </div> 
              
              <?php }}?>





            
            </div>
          </div>
        </div>
      </section>
      
    </div>
    


<?php $this->load->view('product/products_filter_view');?> 
    


 <!--====== Product Slider Section Start ======-->  
                    
 <div class="full-page-slider product-view product-list-views"  id="img-repo"> 

 <button type="button" class="fa fa-close"></button>
    <div class="container">
        
            <div class="row">
             <span class="loader-css"><!-- <img src="<?php //echo $this->config->item('link_base_url');?>assets/curatigo/images/loader.gif" alt="" /> --></div>
                <div class="images">
                
                   <div class="main-popup-slider">
                  
                      
                    
   <div id="img-one" class="common-slider-content">
                        <div class="col-lg-5 col-md-7 col-sm-12 col-lg-offset-1"> <div class="product-large"><img id="pop_img" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/products-images/banner-home2.png" ></div></div>
                        <div class="quick-view-right">
                            
                            <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-1">
                             <div class="quick-view-right-top">
                                 <h2 ><span id="pop_title">Control Blazer</span> <span class="quick-auth-name"><a target="_blank" href="javascript:;" id="pop_collection">Delta Handgoods</a></span></h2>
                                 <div id="pop_desc">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                 <div class="quick-star-rating pro-star-rating">
                                 
                                   <div class="quick-price" ><del id="pop_price">$300</del><span class="discount" id="pop_sellprice">$150-$200</span></div>
                                   
                                 </div>
                               
                               </div>
                              
                                           
                                            
                              <div class="quick-view-cart">    
                                
                                    <div class="col-lg-4 col-md-5 col-sm-3 col-xs-4 pro-left">
                                      <div class="list-vote" id="pop_vote_div">
                                      
                                        <a href="javascript:;">
                                           
                                            <span class="vote-count"><i class="fa fa-caret-up"></i><span>0</span></span>
                                        </a>
                                   
                                      </div>
                                          
                                    </div> 
                                    
                                    <div class="col-lg-8 col-md-7 col-sm-9 col-xs-8 pro-left pro-right">  
                                          <a class="checkout-css button" id="pop_url" href="javascript:;" target="_blank">Get It</a>
                                    
                                    </div>
                                      
                               </div>             
                                            
                            </div>


                         </div>   
                                                

                         <!-- start more products with collection title -->

                    <div class="more-products common-new">

                      </div>
                       <!-- end more products with collection title -->

                         
                      </div>
                      



   
                      
                </div>
                
                
                
                
                  
                
               </div>
            </div> 
         </div>   
<div class="controls-slider">
    <a href="javascript:;" class="prev" id="prev" rel="prev"><i class="fa fa-angle-left"></i></a>
    <a href="javascript:;" class="next" id="next" rel="next"><i class="fa fa-angle-right"></i></a>
</div>    


 </div>
   
                    
                    
    <div data-pages="search" class="overlay hide">
 
<div class="overlay-content has-results m-t-20">
 
<div class="container-fluid">
 
<!-- <img width="78" height="22" src="<?php //echo $this->config->item('link_base_url');?>assets/img/logo.png" class="overlay-brand"> -->
 
 
<a class="close-icon-light overlay-close text-black fs-16" href="#">
<i class="pg-close"></i>
</a>
 
</div>
 
<div class="container-fluid">
 
<input spellcheck="false" autocomplete="off" placeholder="Search..." class="no-border overlay-search bg-transparent" id="overlay-search">
<br>
<div class="inline-block">
    <div class="checkbox right">
    <input type="checkbox" checked="checked" value="1" id="checkboxn">
    <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
    </div>
</div>
<div class="inline-block m-l-10">
    <p class="fs-13">Press enter to search</p>
</div>
 
</div>
 
<div class="container-fluid">
<span>
<strong>suggestions :</strong>
</span>
<span id="overlay-suggestions"></span>
<br>
<div class="search-results m-t-40">
<p class="bold">Pages Search Results</p>

</div>
</div>
 
</div>
 
</div>                
                    
    
  </div>
</div>

<?php $this->load->view('partials/bottom_application');?>