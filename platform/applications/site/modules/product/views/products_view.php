<?php $this->load->view('partials/top_application');
 //trace($res_product);
?>


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

<?php echo $product_json;?>

<div id="search_data"></div>

        <?php
        if(is_array($res_product) && !empty($res_product) )
        {  
           $ds=1;
          foreach($res_product as $product_val)
            {
              $show_list=8;

    ?> 
                <div class="products-view-list <?php echo ($ds==1)?'':'divider-list';?> common-new" >



                  <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="searcbar-section">
                        
                        
                        <div class="date-css col-lg-12 col-md-12 col-sm-12">
                         
                  <?php echo get_dates_day($product_val['publishdate'],date("Y-m-d"));?>
                         
                         </div>
                        
                      </div>  
                  </div>
<?php
//$this->load->model(array('Products'));
$where = "date_format(p.updated_at,'%Y-%m-%d') ='".$product_val['publishdate']."'";
$param = array('id'=>'','orderby'=>'updated_at desc','where'=>$where );
$product_val_result  = $this->Products->get_product($param); 
$key=$product_val['publishdate'];
//echo $sql = $this->db->last_query();
   // trace($product_val);

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

                          if($a==$show_list){
                            break;
                          }

                          $a++;}?>
                        
                         
                        </div>
                      </div>
                    </div>

<?php if($count_product>$show_list){
$html_btn='onclick="see_more_product(';
$html_btn.="'".$key."','".$show_list."'";
$html_btn.=')"';
echo '<div class="common-new"><a class="button see-more-css btn-color" id="see_more_product" '.$html_btn.' href="javascript:;">See More</a></div>';

}?>
                 

                  </div>                     


                   <!--product list code--> 



                
                </div>




         <?php $ds++;}






                  }?>










<div id="more_data"></div>
            
            </div>



 <div style="text-align: center;"><button class="btn btn-success"  id="load_more" name="load_more"  value="2">Load More</button>  </div>


          </div>
        </div>
      </section>
      
    </div>
    


<?php //$this->load->view('product/products_filter_view');?> 
    


 <!--====== Product Slider Section Start ======-->  
                    
 <div class="full-page-slider product-view product-list-views"  id="img-repo"> 

 <button type="button" class="fa fa-close"></button>
    <div class="container">
        
            <div class="row">
             <span class="loader-css">
              <!-- <img src="<?php //echo $this->config->item('link_base_url');?>assets/curatigo/images/loader.gif" alt="" /> --></span>
                <div class="images">
                
                   <div class="main-popup-slider">
                  
                      
                    
<div id="img-one" class="common-slider-content">

<!-- start product details -->
<div id="main_show_pop">   </div>
<!-- end product details -->

<!-- start more products with collection title -->

<div class="more-products common-new">  </div>
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

<script>
$('body').on('click', '.btn-success',function(e) {   
  var start = $(this).val();
  var end ='<?php echo $end_limit; ?>';
  var increment ='<?php echo $limit_incr; ?>';
  var numItems = Number(start)+Number(increment);
  var total = numItems;
  
   $.ajax({
      type: 'POST',
       url:'<?=base_url()?>product/readMore_products',
      data: {start:start},
      success:function(response)
             {
             $('.isotope').isotope();
             $('#more_data').append(response);
             if(end < numItems)
             {
                $("#load_more").hide();
             }
             else
             {
                $("#load_more").attr("value",total);
             }
            
      
              }
        });
    });


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
                  $('.isotope').isotope();
                  $('#search_data').html(response);                                                      
                  $('.products-view-list:eq(1)').addClass('divider-list');

                  }
        });
              }
       }); 
     
        
    $('label[for^="end_date_"]').click(function () {
      $(this).next().datepicker('show');
      
    }); 
  


</script>