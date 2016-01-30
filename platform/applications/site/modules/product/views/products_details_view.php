<?php $this->load->view('partials/top_application');?>



<div class="main-container inner-pages">

  <?php $this->load->view('partials/site_left');?>
  
  <!--====== Header Section Start ======-->
  
  <div class="main-body">

  <?php $this->load->view('partials/site_header');?>

    <div class="main-frame">


<?php //trace($res); ?>
    
 <!--====== Product Slider Section Start ======-->  
                    
 <div class="container">
        
 <div class="row">
 <?php 
 $url=base_url().'product/details/'.$res['id'];
 $pin_it_url='https://pinterest.com/pin/create/button/?url='.$url.'&media='.$res['image_path'];     
 ?>                   
                    
   <div id="img-one" class="common-slider-content detail--page">
                        <div class="col-lg-5 col-md-7 col-sm-12 col-lg-offset-1">
        <div class="product-large">

                               <div class="hover-icons"> 
        <span class="pin-it" rel="<?php echo $pin_it_url;?>"  ><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/pin.png" alt="" id="pin_it" rel="<?php echo $pin_it_url;?>" /></span> 
        <span data-toggle="modal" data-target="#share-product" class="share-section" id="<?php echo $res['id'];?>"><i class="fa fa-share-alt " id="<?php echo $res['id'];?>"></i></span>
        </div>

                            <img src="<?php echo $res['image_path']; ?>" >
                          </div>
                        </div>
                        
                            <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-1">
                              <div class="quick-view-right">
                             <div class="quick-view-right-top">
                                 <h2 ><span ><?php echo $res['title_p']; ?></span> 
                          <?php if($res['collection_title']!=''){?>
                          <span class="collection-name-css">
                          <a target="_blank" href="javascript:;" id="pop_collection">
                          <?php echo $res['collection_title'];?></a>
                          </span>
                        <?php }?>
                                 </h2>
                                
                                 <p ><?php echo $res['product_description']; ?></p>
                                 <div class="quick-star-rating pro-star-rating">
                                 
                                      <div class="quick-price" ><ul>
                                    <?php if($res['sale_price']!=''){?>
                                   <li><del><span class="price-co">Price:</span><span class="del-price"> <?php echo $res['currency']; ?> <span class="discount" > <?php echo $res['price']; ?></span></del></span></li>
                                   <li><span class="price-co">Discounted Price:</span> <?php echo $res['currency']; ?> <span class="discount" > <?php echo $res['sale_price']; ?></span></li>
                                    <?php }else{?>

                                    <li><span class="price-co">Discounted Price:</span> <?php echo $res['currency']; ?> <span class="discount" > <?php echo $res['price']; ?></span></li>
                                    <?php }?>
                                  </ul>
                                  </div>
                                   
                                 </div>
                               
                               </div>
                              
                                           
                                            
                              <div class="quick-view-cart">    
                                
                                    <div class="col-lg-4 col-md-5 col-sm-3 col-xs-4 pro-left">
                                      <div class="list-vote">
                                      
                                          <?php  $onclick_array_view=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$res['title_p'],
                                                            'section_type'=>'1',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$res['id'],

                                                    );?>

                                        <a href="javascript:;" <?php echo onclick_upvote($onclick_array_view);?> >
                                           
                                            <span class="vote-count"><i class="fa fa-caret-up"></i>
                                              <span id="number_1_<?php echo $res['id']?>"><?php echo vote_count_by_id('1',$res['id'])?></span></span>
                                        </a>
                                   
                                      </div>
                                          
                                    </div> 
                                    
                                    <div class="col-lg-8 col-md-7 col-sm-9 col-xs-8 pro-left pro-right">  
                                      <?php if($res['product_url']!=''){?>
                                          <a class="button btn-color" href="<?php echo $res['product_url']; ?>" target="_blank">Get It</a>
                                      <?php  }?>
                                    </div>
                                      
                               </div>             
                                            
                            </div>
                         </div>   
                                                

                  <!-- start more products with collection title -->

                  <div class="more-products common-new">


                  <?php $this->load->view('products_popup_view'); ?>



                  </div>

                  <!-- end more products with collection title -->

                         
                      </div>
                      



   
                      
            
                
                
                
                
                  
                
              
            </div> 
         </div>   


      
      
     
      
    </div>
    
  

    
      <?php $this->load->view('partials/site_footer');?>   
      
      
            
  </div>



</div>

<?php $this->load->view('partials/bottom_application');?>
