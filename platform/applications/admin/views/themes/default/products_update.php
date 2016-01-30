<?php 
echo '<link href="../assets/curatigo-admin/css/textext_005.css" rel="stylesheet" type="text/css">
<link href="../assets/curatigo-admin/css/textext_006.css" rel="stylesheet" type="text/css">
<link href="../assets/curatigo-admin/css/textext_002.css" rel="stylesheet" type="text/css">
<link href="../assets/curatigo-admin/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css">
<link href="../assets/curatigo-admin/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="../assets/curatigo-admin/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../assets/curatigo-admin/css/store_product.css" rel="stylesheet" type="text/css"/>
<link href="../assets/curatigo-admin/css/store_addNewProduct.css" rel="stylesheet" type="text/css"/>
<link href="../assets/curatigo-admin/css/addCollection.css" rel="stylesheet" type="text/css"/>
<link href="../assets/curatigo-admin/css/selectize.default.css" rel="stylesheet" type="text/css"/>'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/basic.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/dropzone.css"/>      
  </head>
<style>
#tag_textarea
{
	width:100% !important;
}
.text-wrap
{
	width: 100% !important;
}
.publish_date
{
	display:block !important;
}
</style>

  
 
<style>
.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: 0px !important;
}
</style>
<script>   
 $(function(){
 
					  $("#category_add").submit(function(e)
				   { 
				    var category = $("#category_name").val(); 
					   e.preventDefault();
					  $.ajax({
					   url:'<?=base_url()?>category/cat_save',
					   type: 'POST',
					   data: $("#category_add").serialize(),
						 success: function(response)
					  {
						   if(response > 0)
									 {
									     
					                         alert('Category is Successfully created');
										  var newOption = '<option value='+response+'>'+category+'</option>'; 
												$("#category_id_p").append(newOption);
												$('#cat_add').modal('hide');		
									 }
									 else
									 {
										 alert('Duplicate entry for category');
										 $("#category_name").attr("value",'');
									 }
								 				 
					  },
									   error: function()
									   {
										   alert("Fail")
									   }
				     });
				 });
});
 </script>
  
 
<div class="row row_panel">
            <div class="upper_column">
                <!-- BEGIN CONTENT -->
                <div class="profile-content">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                    	<div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                	<span class="caption-subject font-blue-madison bold uppercase">Update a product</span>
                                </div>                                        
                            </div>
                              <?php echo $this->session->flashdata('msg'); ?>
                            <div class="portlet-body">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                       
                                	<div class="col-lg-8 col-md-8 col-sm-8 new_product" id="add_newProduct">
                                    	<div class="add_productForm">
                                     
                      <div class="col-lg-12 col-md-12 col-sm-12 clearbothDiv">
                    <input  type="hidden" name="product_id" id="product_id"  value="<?php echo $product_id; ?>"  required> 
                      <?php foreach ($single_product as $products): ?>
                              <div class="form-group">
                            <label class="control-label">SKU# <span class="required">
                                  * </span></label>              
        <input class="form-control" type="text"  name="sku_no"  id="sku_no" readonly  value = "<?php echo $products->sku_no; ?>"  required>                    
                 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title <span class="required">
                                  * </span></label>
                            <input class="form-control" type="text"    name="product_title" value="<?php echo $products->title_p; ?>" id="title_p" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product URL <span class="required">
                                  * </span></label>
  <input class="form-control" type="text" pattern="https?://.+" value="<?php echo $products->product_url; ?>"  name="product_url"  id="product_url" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea  rows="10" name="product_description"  id="description"> <?php echo $products->product_description; ?></textarea>
                        </div> 
                                                          
                        <div class="col-lg-6 col-md-6 col-sm-6 price_input">  
                            <div class="form-group">
                                <label class="control-label">Company / Brand Name <span class="required">
                                  * </span></label>
                                  <div class="text-core">
                                  	 <input type="text" class="form-control" name="brand_name"  value="<?php echo $products->brand_name; ?>"  id="brand_name"  required />
                                  </div>
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Industry </label>
                                <input type="text" class="form-control" name="industry"  value="<?php echo $products->industry; ?>"  id="industry"   />
                            </div> 
                        </div>
                         <div class="col-lg-12 col-md-12 col-sm-12 price_input">
                        <a class="add_newProductList" href="javascript:;" data-toggle="modal" data-target="#cat_add">Add new Category</a>   
                             <div class="form-group">
                                <label class="control-label">Category <span class="required">
                                  * </span></label>
                                <select class="form-control" name="category_id" id="category_id_p" required>
                                   <?php  foreach($categories as $cat) :?>
    <option value="<?php  echo $cat['id']; ?>" <?php if($cat['id']== $products->cat_id) echo 'selected'; ?>><?php  echo $cat['name']; ?></option>
                                   <?php endforeach;?>
                                 
                                   </select>
                            </div>
                        </div>  
                        <?php foreach ($single_user as $users): ?>   
                        <div class="col-lg-12 col-md-12 col-sm-12 price_input">
                        <a class="add_newProductList" href="javascript:;" data-toggle="modal" data-target="#user_add">Add new User</a>        
                            <div class="form-group">
                                <label class="control-label">Created by <span class="required">
                                  * </span></label>
                                 <label class="control-label"></label>  
                                <select class="form-control" name="user_id" id="user_id" required>
                                     <?php  foreach($allUsers as $user) :?>
                        <option value="<?php echo $user['id']; ?>" <?php if($user['id']== $users->user_id ) echo 'selected'; ?>><?php  echo $user["first_name"] .' '. $user["last_name"]; ?></option>
                                   <?php endforeach;?>
                                   </select>
                            </div>
                        </div>
                         <?php endforeach;?>                                                                                   
                        <div class="col-lg-12 col-md-12 col-sm-12 price_input">
                            <h2 class="addImages">Pricing</h2>
                            <div class="col-lg-4 col-md-4 col-sm-4 pricing">
                                <div class="form-group">
                                    <label class="control-label">Currency</label>
                                     <label class="control-label"> (<b><?php echo $products->currency; ?></b>)</label>
                                    <select class="form-control" name="currency" id="currency">
                                    <option value="<?php echo $products->currency; ?>" selected >Select Currency</option>
                                        <option value="INR"  >India Rupees - INR</option>
                                        <option value="JPY">Japan Yen - JPY</option>
                                        <option value="INR">India Rupees - INR</option>
                                        <option value="NZD">New Zealand Dollars - NZD</option>
                                        <option value="CHF">Switzerland Francs - CHF</option>
                                        <option value="ARS">Argentina Pesos - ARS</option>
                                        <option value="AUD">Australia Dollars - AUD</option>
                                        <option value="BRL">Brazil Reais - BRL</option>
                                        <option value="CAD">Canada Dollars - CAD</option>
                                        <option value="CNY">China Yuan Renminbi - CNY</option>
                                        <option value="COP">Colombia Pesos - COP</option>
                                        <option value="CRC">Costa Rica Colones - CRC</option>
                                        <option value="DKK">Denmark Kroner - DKK</option>
                                        <option value="DOP">Dominican Republic Pesos - DOP</option>
                                        <option value="EGP">Egypt Pounds - EGP</option>
                                        <option value="EEK">Estonia Krooni - EEK</option>
                                        <option value="EUR">Euro - EUR</option>
                                        <option value="HKD">Hong Kong Dollars - HKD</option>
                                        <option value="ISK">Iceland Kronur - ISK</option>
                                        <option value="IDR">Indonesia Rupiahs - IDR</option>
                                        <option value="ILS">Israel New Shekels - ILS</option>
                                        <option value="JMD">Jamaica Dollars - JMD</option>
                                        <option value="JPY">Japan Yen - JPY</option>
                                        <option value="JOD">Jordan Dinars - JOD</option>
                                        <option value="KES">Kenya Shillings - KES</option>
                                        <option value="KRW">Korea (South) Won - KRW</option>
                                        <option value="KWD">Kuwait Dinars - KWD</option>
                                        <option value="LBP">Lebanon Pounds - LBP</option>
                                        <option value="MYR">Malaysia Ringgits - MYR</option>
                                        <option value="MUR">Mauritius Rupees - MUR</option>
                                        <option value="MXN">Mexico Pesos - MXN</option>
                                        <option value="MAD">Morocco Dirhams - MAD</option>
                                        <option value="NZD">New Zealand Dollars - NZD</option>
                                        <option value="NOK">Norway Kroner - NOK</option>
                                        <option value="OMR">Oman Rials - OMR</option>
                                        <option value="PKR">Pakistan Rupees - PKR</option>
                                        <option value="PEN">Peru Nuevos Soles - PEN</option>
                                        <option value="PHP">Philippines Pesos - PHP</option>
                                        <option value="PLN">Poland Zlotych - PLN</option>
                                        <option value="QAR">Qatar Riyals - QAR</option>
                                        <option value="RON">Romania New Lei - RON</option>
                                        <option value="RUB">Russia Rubles - RUB</option>
                                        <option value="SAR">Saudi Arabia Riyals - SAR</option>
                                        <option value="SGD">Singapore Dollars - SGD</option>
                                        <option value="SKK">Slovakia Koruny - SKK</option>
                                        <option value="ZAR">South Africa Rand - ZAR</option>
                                        <option value="KRW">South Korea Won - KRW</option>
                                        <option value="LKR">Sri Lanka Rupees - LKR</option>
                                        <option value="SEK">Sweden Kronor - SEK</option>
                                        <option value="CHF">Switzerland Francs - CHF</option>
                                        <option value="TWD">Taiwan New Dollars - TWD</option>
                                        <option value="THB">Thailand Baht - THB</option>
                                        <option value="TTD">Trinidad and Tobago Dollars - TTD</option>
                                        <option value="TND">Tunisia Dinars - TND</option>
                                        <option value="TRY">Turkey Lira - TRY</option>
                                        <option value="AED">United Arab Emirates Dirhams - AED</option>
                                        <option value="GBP">United Kingdom Pounds - GBP</option>
                                        <option value="USD">United States Dollars - USD</option>
                                        <option value="VEB">Venezuela Bolivares - VEB</option>
                                        <option value="VND">Vietnam Dong - VND</option>
                                        <option value="ZMK">Zambia Kwacha - ZMK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 pricing">
                                <div class="form-group">
                                    <label class="control-label">Price <span class="required">
                                  * </span></label>
                                    <div class="input-group">
                                        
                                        <input class="form-control" type="text" pattern="0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?" placeholder="0.00" name="price" value="<?php echo $products->price; ?>"  id="price" required>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 price_input">
                                <div class="form-group">
                                    <label class="control-label">Compare at price </label>
                                    <div class="input-group">
                                        <input class="form-control" type="text"  pattern="0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?"  name="sale_price" value="<?php echo $products->sale_price; ?>" id="sale_price" required>
                                    </div>
                                </div> 
                            </div>                                                       
                        </div>
                    </div>
                                  
                                  
                                     </div>                                                       
                                </div>    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="add_productForm seo_main">                                
                    <div>
                        <h2 class="addImages">Search engine listing preview</h2>
                        <label>Add a title and description to see how this product might appear in a search engine listing.</label>
                    </div>    
                     <?php foreach ($single_product_seo as $product): ?>                
                    <div class="form-group">
                         <label class="control-label">Page title (maxlength - 62 char) <span class="required">
                                  * </span></label>
                                    <?php if($product->title_type_seo == 1) { ?>  
                            <select class="form-control" name="page" id="page_id_product" required>
                                  <option value="1"  selected >Automatic</option>
                                  <option value="2" >Manual</option> 
                                   </select> 
                                  
                               <br/>  
   <input type="text" readonly  class="form-control" maxlength="60"  name="page_title"  id="page_title_value_p"  value="<?php echo $product->meta_title; ?>"  required>
         <br/>  
   <input type="text"  class="form-control" maxlength="60"  name="manual"  id="page_title_value_m_p" style="display:none;" value="<?php echo $product->meta_title; ?>">        <?php } else { ?>
                            <select class="form-control" name="page" id="page_id_product" required>
                                  <option value="1" >Automatic</option>
                                  <option value="2" selected >Manual</option> 
                                   </select> 
                              <br/>  
   <input type="text" readonly  class="form-control" maxlength="60"  name="page_title"  id="page_title_value_p" style="display:none;"  value="<?php echo $product->meta_title; ?>"  required>
         <br/>  
   <input type="text"  class="form-control" maxlength="60"  name="manual"  id="page_title_value_m_p"  value="<?php echo $product->meta_title; ?>">         
                 <br/>                 
                                   <?php } ?>
                              
                    </div>
                    <div class="form-group">
                        <label class="control-label">Keyword (maxlength - 100 char)</label>
                     <input type="text" class="form-control" maxlength="100" name ="keyword"  value="<?php echo $product->meta_keyword; ?>" id= "keyword" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta description (maxlength- 160 char) <span class="required">
                                  * </span></label>
  <input type="text" class="form-control" maxlength="160" name="meta_description"  value="<?php echo $product->meta_description; ?>" id ="meta_description" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">URL <span class="required">
                                  * </span></label>
                        <div class="input-group">                                                        	
                            <input type="text" class="form-control" name="url_slug" value="<?php echo $product->url_slug; ?>" id="url_slug_p">
                        </div>
                    </div>
                     
                     <img src="../upload/products/<?php echo $product->file_name; ?>" style="width:180px;height:120px;">
                     <?php endforeach;?>
                    <div class="col-lg-12 col-md-12 col-sm-12 fileinput-button">
                       
                       <form action="<?php echo base_url();?>products/cover_image" id="my-dropzone" class="dropzone">
                                <div class="featured-image">
                                   <i class="fa fa-camera"></i>
                                  <h4>Upload a Picture <span class="required">
                                  * </span></h4>
                                   <div class="error-image" style="display:none;">You can't select more files</div>                              
                                </div>
                             </form>
                      </div>
                </div>  
               <div class="add_productForm collectionTag">                            	
                                <div class="demo">
                                    <div class="control-group">
                                        <div class="tags">
                                            <label >Product Tags</label>
                                        </div>
     <textarea style="width: 390px;height: 80px; border:1px solid #e5e5e5; background:#fff;" name="tag_product"  id="tag_product" class="tag-text" rows="1"></textarea>      
                                    </div>
                                </div>
                            </div> 
                     
                       <div class="add_productForm online_productStore">
                            	<div class="onlineStore">                                                	
                                    <h2 class="addImages">Product Visibility</h2>
                                    <div class="inner">
                                  <?php if($products->is_featured == 1){ ?>              
                               <input  type="checkbox" class="check_onlineStore"  name="featured" id="featured" checked>
                                              <label class="control-label"> Featured </label>
                                               
                                                     <?php } else { ?>
                                                        <div class="form-group">
                          <input  type="checkbox" class="check_onlineStore"  name="featured" id="featured"  >
                                              <label class="control-label"> Featured </label>
                                                </div>
                                                     <?php }  ?>
                                        <br/>              
                                     <?php if($products->is_enable == 1){ ?>              
                               <input  type="checkbox" class="check_onlineStore"  name="product_active" id="product_active"  checked>
                                              <label class="control-label"> Active </label>
                                                     <?php } else { ?>
                                                        <div class="form-group">
                          <input  type="checkbox" class="check_onlineStore"  name="product_active" id="product_active"  >
                                              <label class="control-label"> Active </label>
                                                </div>
                                                     <?php }  ?> 
                                                     <br/> 
                                             <label class="control-label">Publish date <span class="required">
                                  * </span></label>   
                                             <br/>         
               <input class="form-control " type="text" name="publish_date" required  placeholder="Date and Time"  id="datetimepicker" value="<?php echo $products->updated_at; ?>"/> 
                      
                    </div> 
                </div>                                         
            </div>
                        </div>      
                                                                                                                                                                                                 <?php endforeach;?>  
                                    <div class="col-lg-12 col-md-12 col-sm-12 rightHeadingDiv">
                                            <ul>
              <li><a href="<?php echo base_url();?>products"><button type="button" class="btn btn-default default_btn">Cancel</button></a></li>
                                     <li><button type="submit" class="btn btn-success"  id="update_product" >Update Product</button></li>
                                            </ul>
                                        </div>  
                                        </form> 
                                           </div>
                                                                   
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<!--Begin Popup for collection -->
<div id="cat_add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" id="close_dailog">x</button>
                <h3 class="modal-title">Add category</h3>
            </div>
            <div class="modal-body">
            <div class="onlineStore"> 
               <form  class="form-horizontal" name="category_add"  id="category_add"   enctype="multipart/form-data" method="POST">               
                                      <div class="select_publishDate form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label class="control-label"><b>Enter the Category</b></label>
                                        </div>
                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                    <div class="col-lg-5 col-md-5 col-sm-5 price_input">
            <input class="form-control form-control-inline date-picker" type="text"  name="category_name" id="category_name" placeholder="Category Name"  required />
                                    </div>
                                        
                    </div>
                  
                 </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default default_btn" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-default default_btnr"  id="category_button" >Save</button>                
            </div>
              </form>
        </div>
    </div>
</div>
<!--End Popup for  collection-->

<!--Begin Popup for collection -->
<div id="user_add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" id="close_dailog">x</button>
                <h3 class="modal-title">Add User</h3>
            </div>
            <div class="modal-body">
            <div class="portlet-body form">
                                <div class="form-body">
                                   <?php echo validation_errors('<p class="error">'); ?>
                                                <div class="form-horizontal">            
                               <div class="form-group">
                                  <label class="control-label col-md-3">Username<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-8">
                                    <input type="text"  data-required="1" class="form-control"  id="username"  name="username" />
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Email<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-8">
                                    <input type="email"  data-required="1" class="form-control"  id="email_id"  name="email_id" />
                                  </div>
                                </div>
                           
                                <div class="form-group">
                                  <label class="control-label col-md-3">First Name<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-8">
                                    <input type="text"  data-required="1" class="form-control"  id="first_name"  name="first_name" />
                                  </div>
                                </div>
                        
                                <div class="form-group">
                                  <label class="control-label col-md-3">Last Name
                                  </label>
                                  <div class="col-md-8">
                                    <input type="text"  data-required="1" class="form-control"  id="last_name"  name="last_name" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Facebook handler
                                  </label>
                                  <div class="col-md-8">
                                    <input type="text"  data-required="1" class="form-control"  id="facebook"  name="facebook" />
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Twitter handler
                                  </label>
                                  <div class="col-md-8">
                                    <input type="text"  data-required="1" class="form-control"  id="twitter"  name="twitter" />
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-md-3">Password<span class="required">
                                  * </span>
                                  </label>
                                  <div class="col-md-8">
                                    <input type="password"  data-required="1" class="form-control" name="password" id="password" />
                                  </div>
                                </div>
                               
                                <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                 <div class="form-group">
                                        <label class="control-label col-md-3">Status <span class="required"> * </span></label>
                                                    <div class="col-md-8">
                                               <select class="form-control" name="status" id="status">
                                                  <option value="1">Active</option>
                                                    <option value="0">InActive</option>
                                                </select>
                                 </div>
                            </div>
                               </div>
                               <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn green" id="user_submit">Submit</button>
                      <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
                                </div>
                               </div>
    </div>
</div>
<!--End Popup for  collection-->

   
    
<script src="../assets/curatigo-admin/js/product_update.js" type="text/javascript"></script>    
<script src="../assets/curatigo-admin/js/user_add_products.js" type="text/javascript"></script>      
<script src="../assets/curatigo-admin/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/jquery.bootstrap-touchspin.js"></script>        
<script src="../assets/curatigo-admin/js/textext_002.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/textext.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/textext_005.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/textext_006.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/textext_003.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/index.js"></script>
<script src="../assets/curatigo-admin/js/addProduct_view.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/store_productShow.js" type="text/javascript"></script>
<script src="../assets/curatigo-admin/js/addCollection.js" type="text/javascript"></script>
<script src="http://cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>  
<script type="text/javascript"> var base_url = '<?php echo $this->config->item('link_base_url');?>';</script>
<script type="text/javascript" src="<?php echo $this->config->item('link_base_url');?>assets/curatigo/js/dropzone.js"></script>
<!--javascript for add product start  -->  

<script type="text/javascript">
   CKEDITOR.replace( 'description', {
    filebrowserBrowseUrl: base_url+'browse.php?type=Files',
    filebrowserUploadUrl: base_url+'upload_editor.php?type=Files'
});    
 function string_to_slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  
  // remove accents, swap ñ for n, etc
  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
  var to   = "aaaaeeeeiiiioooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
}

$(document).ready(function()
 {

	 $('#datetimepicker').datetimepicker();  
    $('#title_p').change(function ()
    {
          var val = string_to_slug($('#title_p').val());
		  var id = <?php echo $product_id; ?>;
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_products_update/',
      data: {product_title:val,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			  $("#url_slug_p").attr("value",'');
          alert("Duplicate Url Slug");
		  }
		  else
		  {
			 $("#url_slug_p").attr("value",val);
              return false; 
		  }
     }
        });
          
    });
	
	    $('#url_slug_p').change(function ()
    {
         var val = string_to_slug($('#url_slug_p').val());
		  var id = <?php echo $product_id; ?>;
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_products_update/',
     data: {product_title:val,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#url_slug_p").attr("value",'');
			alert("Duplicate Url Slug");
		  }
		  else
		  {
			 $("#url_slug_p").attr("value",val);
              return false; 
		  }
     }
        });
          
    });
	
	
/*jasdeep Javascript for page title and validation of page title start */
	
     $('#category_id_p').change(function()
	{
		  var category = $("#category_id_p option:selected").html();
		  var title =  $('#title_p').val();
		   var id = <?php echo $product_id; ?>;
		  var brand =  $('#brand_name').val();
		  var val = title + ' ' + 'by' +  ' ' + brand + ' ' + 'in' +  ' ' + category ;
		    var max_chars = 62;
         if( val.length > max_chars) 
	{
		 val = val.substr(0, max_chars);
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ');
    }
	else
	{
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ');
	}
		   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_page_title_product/',
      data: {product_title:url,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value_p").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title_value_p").attr("value",str);
		  }
     }
        });
		  
    });
	
$("#page_id_product").change(function(e)
{  
		     var page_id = this.value;
	       if(page_id == 1)
	  {
						               
		  var category = $("#category_id_p option:selected").html();
		   var id = <?php echo $product_id; ?>;
		  var title =  $('#title_p').val();
		  var brand =  $('#brand_name').val();
		  var val = title + ' ' + 'by' +  ' ' + brand + ' ' + 'in' +  ' ' + category ;
		  var max_chars = 62;
		  
         if( val.length > max_chars) 
	{
		 val = val.substr(0, max_chars);
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ');
    }
	else
	{
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ');
	}
		  
  $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_page_title_product/',
      data: {product_title:url,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value_p").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title_value_p").attr("value",str);
		  }
     }
        });
		
		   }
		  
    });	
	
	
	
	 $('#page_title_value_m_p').change(function()
	{
		     var val = $('#page_title_value_m_p').val();
			 
			 var id = <?php echo $product_id; ?>;
		    var max_chars = 62;
		  if( val.length > max_chars) 
	{
		 val = val.substr(0, max_chars);
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ')
    }
	else
	{
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ');
	}
  $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_page_title_product/',
     data: {product_title:url,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value_m_p").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title_value_m_p").attr("value",str);
		  }
     }
        });
		  
    });
	
	
	 $('#meta_description').change(function()
	{
		   var val = this.value;
		   var id = <?php echo $product_id;?>;
		   var max_chars = 160;
		  if( val.length > max_chars) 
	{
		 val = val.substr(0, max_chars);
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ')
    }
	else
	{
		 var url = string_to_slug(val);
		 var str = url.replace(/-/g, ' ');
	}
  $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_page_description_product/',
      data: {product_title:url,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#meta_description").attr("value",'');
			alert("Duplicate Page Description");
		  }
		  else
		  {
			 $("#meta_description").attr("value",str);
		  }
     }
        });
		  
    });
	
	
	
	           $("#page_id_product").change(function(e)
		   {  
		           var page_id = this.value;
				   if(page_id == 1)
				  {
						                   $("#page_title_value_m_p").hide(400);
										   $("#page_title_value_p").show(400);
										   
				   }
				   else
				   {
					  
					                       $("#page_title_value_p").hide(400);
										   $("#page_title_value_m_p").show(400);
				    }
		  
			                              
		   });
/*jasdeep Javascript for page title and validation of page title  end */

              $("#sale_price").change(function(e)
		   { 
		           price_compare  =    Number($('#sale_price').val());
                   price          =       Number($('#price').val());

			if ((price_compare > price) || (price_compare == price ))
			{
				alert("Compare at price value should be less than Price value");
				$("#sale_price").attr("value",'');
			}
			                              
		   });

		   
		   
});
      </script>  
      
    <script type="text/javascript">
		$('#tag_product').textext({plugins : 'tags autocomplete', tagsItems : <?php echo $tags_update ?>})
	
		.bind('getSuggestions', function(e, data)
		{
			    var list = <?php echo $tags_html ?>,
				textext = $(e.target).textext()[0],
				query = (data ? data.query : '') || '';
				
		$(this).trigger('setSuggestions',{result : textext.itemManager().filter(list, query)} );
});
</script>


<script>
	(function()
	{
		var textarea = $('textarea.tag-text:last'),
			output   = $('pre.output:last');
			
		textarea.bind('setFormData', function(e, data, isEmpty)
		{
			var textext = $(e.target).textext()[0];
			output.text(textext.hiddenInput().val());
		});

		textarea.textext()[0].getFormData();
	})();
	</script>   

<!--javascript for add product end  -->  

  <!--javascript for add user start  -->              
                 
<script>
     $(document).ready(function()
 {
	 
	   function validateEmail(val)
	 {
           var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           return re.test(val);
    }     

	  
    $('#email_id').change(function ()
    {
         var val = $('#email_id').val();
					 if (validateEmail(val))
					{
					   email_id = val;
					} 
				  else 
				  { 
				        $("#email_id").attr("value",'');
					   alert("Not a Valid email Id");
					   return false;
				  }
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/email_validation_database/',
      data: {email:email_id},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#email_id").attr("value",'');
               alert("Duplicate Email Id");
		  }
		  else
		  {
			 $("#email_id").attr("value",val);
              return false; 
		  }
     }
        });
		});

		
   
		
		
$('#username').change(function ()
    {
         var val = $('#username').val();
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/username_validation_database/',
      data: {username:val},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#username").attr("value",'');
               alert("Duplicate Username");
		  }
		  else
		  {
			 $("#username").attr("value",val);
              return false; 
		  }
     }
        });
          
        });		
		$('#facebook').change(function ()
    {
         var val = $('#facebook').val();
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/username_validation_database/',
      data: {facebook_identifer:facebook},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#facebook").attr("value",'');
               alert("Duplicate facebook handler");
		  }
		  else
		  {
			 $("#facebook").attr("value",val);
              return false; 
		  }
     }
        });
          
        });		
		$('#twitter').change(function ()
    {
         var val = $('#twitter').val();
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>user/username_validation_database/',
      data: {twitter_identifier:twitter},
      success:function(response)
	 {
		
		  if(response == 0)
		  {
			  $("#twitter").attr("value",'');
               alert("Duplicate twitter handler");
		  }
		  else
		  {
			 $("#twitter").attr("value",val);
              return false; 
		  }
     }
        });
          
        });		
		
		
		
	});
</script>

     <!--javascript for add user end  -->   

     


