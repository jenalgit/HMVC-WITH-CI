
                <div class="products-view-list common-new" >



                  <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="searcbar-section">
                        
                        
                        <div class="date-css col-lg-12 col-md-12 col-sm-12">
                         
                         <span class="trigger today-date"> <?php echo get_dates_day($key,date("Y-m-d"));?>
                    <input type="text" class="end_date" /> </span>
                         
                         </div>
                        
                      </div>  
                  </div>
<?php
//$this->load->model(array('Products'));
$where = "date_format(p.updated_at,'%Y-%m-%d') ='".$key."'";
$param = array('id'=>'','orderby'=>'updated_at desc','where'=>$where );
$product_val_result  = $this->Products->get_product($param); 
//$key=$key;
//echo $sql = $this->db->last_query();
   // trace($product_val_result);

?>
 
                  <div class="products-new-css" id="show_<?php echo $key;?>">

                    <div class="pi-section-w pi-section-white">
                      <div class="pi-section" >
                        <div  id="isotope-products" class="pi-row pi-grid-small-margins pi-padding-bottom-40 isotope" data-isotope-mode="masonry">
                        
                         <?php 
                          $a=1;                         
                          
                          $count_product=count($product_val_result);
                           
                         foreach($product_val_result as $index => $product_list){ 

                            if($product_list['file_name']!=''){
                            $image_path=base_url().'upload/products/'.$product_list['file_name'];
                            }else{
                            $image_path=base_url().'upload/no_image.jpeg';
                            }

                            $url=base_url().'product/details/'.$product_list['id'];
                            $pin_it_url='https://pinterest.com/pin/create/button/?url='.$url.'&media='.$image_path;
                          ?>

                          <div  class="pi-col-sm-3 pi-col-xs-6 isotope-item common-pro-popup" >
                            <div class="pi-img-w images-box"> <a href="javascript:;" rel="#img-<?php echo $index;?>_<?php echo $key;?>" id="<?php echo $product_list['id'];?>"> <img src="<?php echo $image_path;?>" alt="">
                              <div class="hover-icons"> 
                                <span class="pin-it" rel="<?php echo $pin_it_url;?>"  ><img src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/images/pin.png" alt="" id="pin_it" rel="<?php echo $pin_it_url;?>" /></span> 
                                <span data-toggle="modal" data-target="#share-product" class="share-section" id="<?php echo $product_list['id'];?>"><i class="fa fa-share-alt " id="<?php echo $product_list['id'];?>"></i></span>
                                </div>
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

                          <?php 

                          

                          $a++;}?>
                        
                         
                        </div>
                      </div>
                    </div>

                 

                  </div>                     


                   <!--product list code--> 



                
                </div>

                <script type="text/javascript">
  $('input[id^="end_date_"]').datepicker({
       dateFormat: 'yy-mm-dd',
        onSelect: function()
         { 
           var dateObject = $(this).val(); 
           $.ajax({
      type: 'POST',
       url:'<?=base_url()?>product/searchAppend_product',
      data: {start:dateObject},
                    success:function(response)
                   {
                      console.log(response);         
                           $('#search_data').html(response);
                           $('.isotope').isotope();
                          // $('.products-view-list:second').addClass('divider-list');
                           
                   }
        });
              }
       }); 
     
        
    $('label[for^="end_date_"]').click(function () {
      $(this).next().datepicker('show');
      console.log($(this).next().datepicker().val());
    }); 
                </script>

                <script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/isotope.js" language="javascript"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/pi.js" language="javascript"></script> 

