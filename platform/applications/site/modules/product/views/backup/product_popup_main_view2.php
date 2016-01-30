<?php if(isset($result) && !empty($result)){ 
 if($result['file_name']!=''){
                            $image_path=base_url().'upload/products/'.$result['file_name'];
                            }else{
                            $image_path=base_url().'upload/no_image.jpeg';
                            }

                            $url=base_url().'product/details/'.$result['id'];
 $pin_it_url='https://pinterest.com/pin/create/button/?url='.$url.'&media='.$image_path;
?>
<style type="text/css">
.morecontent div {
    display: none;
}
.morelink {
    display: block;
}
</style>
                    <div class="col-lg-5 col-md-7 col-sm-12 col-lg-offset-1">
                         <div class="product-large">
                          <img id="pop_img" src="<?php echo $result['image_path'];?>" >
                          
                          <div class="hover-icons"> 
                                <span class="pin-it" rel="<?php echo $pin_it_url;?>"  ><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/pin.png" alt="" id="pin_it" rel="<?php echo $pin_it_url;?>" /></span> 
                                <span data-toggle="modal" data-target="#share-product" class="share-section" id="<?php echo $result['id'];?>"><i class="fa fa-share-alt " id="<?php echo $result['id'];?>"></i></span>
                                </div>
                          </div>
                        </div>


                        <div class="quick-view-right">
                            
                            <div class="col-lg-4 col-md-4 col-sm-12 col-lg-offset-1">
                             <div class="quick-view-right-top">
                                 <h2 ><span id="pop_title"><?php echo $result['title_p'];?></span>
                                 <span class="collection-name-css">
                                    <a target="_blank" href="javascript:;" id="pop_collection">
                                      <?php echo $result['collection_title'];?></a>
                                  </span>
                                 
                                 </h2>
                                  
                                 <div id="pop_desc" class="less_more" >
                                  <?php echo char_limiter($result['product_description'],150,'...');?>
                                   <br><span id="seemorebtn">Read more</span>
                                </div>
                                <div id="pop_desc" class="see_more" style="display:none;">
                                  <?php echo $result['product_description'];?>
                                </div>
                                 <div class="quick-star-rating pro-star-rating">
                                 
                                   
                                  <div class="quick-price" >
                                    <?php if($result['sale_price']!=''){?>
                                    <?php echo $result['currency']; ?> <del ><?php echo $result['price']; ?></del><span class="discount" ><?php echo $result['currency']; ?>  <?php echo $result['sale_price']; ?></span>
                                    <?php }else{?>
                                    <span class="discount" ><?php echo $result['currency']; ?>  <?php echo $result['price']; ?></span>
                                    <?php }?>
                                  </div>


                                   
                                 </div>
                               
                               </div>
                              
                                           
                                            
                              <div class="quick-view-cart">    
                                
                                    <div class="col-lg-4 col-md-5 col-sm-3 col-xs-4 pro-left">
                                      <div class="list-vote" id="pop_vote_div">
                                      
                                                    <?php  $onclick_array_view=array('user_id'=>$this->session->userdata('user_logged'),
                                                            'section_title'=>$result['title_p'],
                                                            'section_type'=>'1',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$result['id'],

                                                    );?>

                                         <a href="javascript:;" <?php echo onclick_upvote($onclick_array_view);?> >
                                           
                                            <span class="vote-count"><i class="fa fa-caret-up"></i>
                                              <span id="numberpop_1_<?php echo $result['id']?>"><?php echo vote_count_by_id('1',$result['id'])?></span></span>
                                        </a>
                                        

                                   

                                      </div>
                                          
                                    </div> 
                                    
                                    <div class="col-lg-8 col-md-7 col-sm-9 col-xs-8 pro-left pro-right">  
                                          <a class="checkout-css button" id="pop_url" href="<?php echo $result['product_url'];?>" target="_blank">Get It</a>
                                    
                                    </div>
                                      
                               </div>             
                                            
                            </div>


                         </div>  


<script type="text/javascript">
    $("#seemorebtn").click(function(){
        $('.see_more').show();
        $('.less_more').hide();
        $('#seemorebtn').hide();
    });
</script>

    <?php }?>