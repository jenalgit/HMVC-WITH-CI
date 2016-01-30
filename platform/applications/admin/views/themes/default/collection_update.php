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

<?php
     
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>';
   echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>';
    ?>   
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/basic.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('link_base_url');?>assets/curatigo/css/dropzone.css"/>    
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
.form-control 
{
	height:auto !important;
}
#sample_3_info
{
	display:none;
}
</style>
<script>   
                     $(function()
                 {
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
												$("#category_id").append(newOption);
										     var newOption_product = '<option value='+response+'>'+category+'</option>'; 		
												$("#category_id_p").append(newOption_product);
												$('#cat_add').modal('hide');			
									 }
									 else
									 {
										 alert('Duplicate entry for Category');
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
        	<div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue-madison bold uppercase">Update a collection</span>
                    </div>                                        
                </div>
              <?php echo $this->session->flashdata('msg'); ?>
       <!-- Collection Main form Start-->      
                
            
            <div id="form">
      <form  class="form-horizontal"  action="<?php echo base_url();?>collections/update/<?php echo $single_id;?>"  name="collection_description"  id="collection_description"  enctype="multipart/form-data" method="POST">  
     
                     <input type="hidden" name="collection_products" id="collection_products">                                              
                            <div class="portlet-body">
                	        <div class="col-lg-12 col-md-12 col-sm-12 upper_column">
                             <div class="col-lg-8 col-md-8 col-sm-8">
                              <?php foreach ($single_collections as $collection): ?>
                                       <div class="add_productForm">
                                        <div class="form-group">
 <label class="control-label" >Title<span class="required">
                                  * </span></label>
         <input class="form-control" type="text" name="title"  pattern="[a-zA-Z0-9\s]+" id="title"  value="<?php echo $collection->title; ?>"  required>
                                                </div>
                                                                       
                                       <div class="form-group">
               <a class="add_newProductList" href="javascript:;" data-toggle="modal" data-target="#cat_add">Add new Category</a>                        
                                <label class="control-label">Category</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                   <?php  foreach($categories as $cat) :?>
                      <option value="<?php  echo $cat['id']; ?>" <?php if($cat['id']== $collection->cat_id) echo 'selected'; ?> ><?php  echo $cat['name']; ?></option>
                                   <?php endforeach;?>
                                 
                                   </select>
                            </div>
                            
                             <?php foreach ($single_user as $users): ?>   
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
                         <?php endforeach;?>     
                                    <div class="form-group">
                                      <label class="control-label">GET It</label>
                           <input type="text" class="form-control" maxlength="200" name="url_get" value="<?php echo $collection->url_get; ?>">
                                	</div>  
                                       <div class="form-group">   
                                   <label class="control-label">URL Slug <span class="required">* </span></label>
                        <input type="text" class="form-control"  name="url_slug" id="url_slug" required value ="<?php echo $collection->url_slug; ?>">
                                                  </div> 
                                     
                                             <div class="form-group">
                                                <label class="control-label">Description </label>
                             <textarea name="description" id="col_description" rows="10"><?php echo $collection->description;?></textarea>
                                                </div>
                                             
                                                <div class="form-group">
                           <label class="control-label">Tag Line <span class="required">* </span></label>
                         <input class="form-control" type="text" name="tag_line"  required value="<?php echo $collection->tag_line; ?>">
                                                </div>
                             </div>
                               </div>
     
                         <input type="hidden" name="collection_id" id="collection_id"  value="<?php echo $single_id;?>" > 
                         
                        <?php endforeach; ?>
                                             
                         <?php if(!empty($single_collections_seo)) { ?>
                         <?php foreach ($single_collections_seo as $collection_seo): ?>               
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 seo_class">
                                <div class="add_productForm">
                                    <h2 class="addImages">Search engine listing preview</h2>
                                    <label>Add a title and description to see how this product might appear in a search engine listing.</label>                               
                                	<div class="form-group seo_title">
                                        <label class="control-label">Page title (maxlength - 62 char) <span class="required">
                                  * </span></label>
                   <?php foreach ($single_collections_seo_type as $collection_seo_type): ?>                   
                          <?php if($collection_seo_type->title_type_seo == 1) { ?>  
                            <select class="form-control" name="page" id="page_id" required>
                                  <option value="1"  selected >Automatic</option>
                                  <option value="2" >Manual</option> 
                                   </select> 
                                  
                               <br/>  
   <input type="text" readonly  class="form-control" maxlength="60"  name="page_title"  id="page_title_value"  value="<?php echo $collection_seo->meta_title; ?>"  required>
         <br/>  
   <input type="text"  class="form-control" maxlength="60"  name="manual"  id="page_title_value_m" style="display:none;" value="<?php echo $collection_seo->meta_title; ?>">        <?php } else { ?>
                            <select class="form-control" name="page" id="page_id" required>
                                  <option value="1" >Automatic</option>
                                  <option value="2" selected >Manual</option> 
                                   </select> 
                              <br/>  
   <input type="text" readonly  class="form-control" maxlength="60"  name="page_title"  id="page_title_value" style="display:none;"  value="<?php echo $collection_seo->meta_title; ?>"  required>
         <br/>  
   <input type="text"  class="form-control" maxlength="60"  name="manual"  id="page_title_value_m"  value="<?php echo $collection_seo->meta_title; ?>">         
                 <br/>                 
                                   <?php } ?>
                          <?php endforeach; ?>         
                                            
                                	</div>
                                 
                                    <div class="form-group seo_title">
                                        <label class="control-label">Keyword(maxlength - 100 char)</label>
                   <input type="text" class="form-control" name ="keyword" value ="<?php echo $collection_seo->meta_keyword;; ?>" >
                                	</div>
                               	 	<div class="form-group seo_title">
                                        <label class="control-label">Meta description (maxlength- 160 char) <span class="required">
                                  * </span></label>
                                <textarea class="form-control" name="meta_description" id="meta_description_c" required><?php echo $collection_seo->meta_description ?></textarea>
                                    </div>
                                   
                            	</div>  
                        	</div>                  
                    	</div>
                	
                     <?php endforeach; ?>
                     <?php } else { ?>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 seo_class">
                                <div class="add_productForm">
                                    <h2 class="addImages">Search engine listing preview</h2>
                                    <label>Add a title and description to see how this Collection might appear in a search engine listing.</label>                               
                                	<div class="form-group seo_title">
                                        <label class="control-label">Page title (maxlength - 62 char)<span class="required">
                                  * </span></label>
                                        <select class="form-control" name="page" id="page_id" required>
                                  <option value="1" >Automatic</option>
                                  <option value="2" >Manual</option> 
                                   </select> 
                                   <br/>  
                            <input type="text" readonly  class="form-control" name="page_title"  id="page_title_value"   required>
                        <br/>  
                             <input type="text"   class="form-control" name="manual"  id="page_title_value_m" style="display:none;"   >
                                	</div>
                                    <div class="form-group seo_title">
                                        <label class="control-label">Keyword (maxlength - 100 char) </label>
                                        <input type="text" class="form-control" name ="keyword" >
                                	</div>
                               	 	<div class="form-group seo_title">
                                        <label class="control-label">Meta description (maxlength- 160 char)<span class="required">
                                  * </span></label>
                                <textarea class="form-control" name="meta_description"  id="meta_description_c"  required></textarea>
                                    </div>
                                   
                            	</div>  
                        	</div>                  
                    	</div>
                       
                     <?php } ?>
                     
                         
                    <div class="col-lg-12 col-md-12 col-sm-12 total_product">
                    	<div class="col-lg-8 col-md-8 col-sm-8">
                        	<div class="add_productForm">
                                <div class="col-lg-4 col-md-4 col-sm-4 price_input">
                                    <h2 class="masterList">Collection product List</h2>
                                </div>   
                               <div class="col-lg-4 col-md-4 col-sm-4 price_input">
                           <a class="add_newProductList" href="javascript:;" data-toggle="modal" data-target="#new-product">Add new product</a>
                                 </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                           <a class="add_masterList" href="javascript:;">Add product from master list</a>
                                </div>                                                    
                                <div class="col-lg-12 col-md-12 col-sm-12 outerVariant_optionClass">  
                                    <span class="page_select">
                                        <label>All products on this page are selected.</label>
                                    </span>
                                </div>
                                <div class="add_Form table-scrollable">
                                   <table class="table edit_variantTable" id="main_table">
                                        <thead>
                                            <tr>
                                                 <th>Image</th>
                                                 <th>SKU </th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Compare Price</th>
                                               <th>Brand Name</th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                          <?php  if(!empty($single_id_collection)) { ?>
                                          <?php foreach($product_collections_single as $product) :?>
                                        <tbody>
                                        <tr class="tr_InputHover" id="master_<?php echo $product->id; ?>">
    <input type="hidden" name="product_master[]" class="child_checkClass" id="<?php echo $product->id; ?>" value="<?php echo $product->id; ?>">                                             <td class="product_box">
                                    <div class="variant_image">
                                   <img src="../upload/products/<?php echo $product->file_name; ?>" width="50px" height="20px">
                                                    </div>    
                                                </td>
                                      <td><b><?php echo $product->sku_no; ?></b></td>              
    <td><input type="text" class="form-control input_box" id="title_<?php echo $product->id; ?>" value="<?php echo $product->title_p; ?>"> </td>
    <td><input type="text" id="price_<?php echo $product->id; ?>" class="form-control input_box" value="<?php echo $product->price; ?>"> </td>
     <td><input type="text" id="compare_<?php echo $product->id; ?>" class="form-control input_box" value="<?php echo $product->sale_price; ?>">     </td>   
                                          <td><input type="text"  id="brand_<?php echo $product->id; ?>" class="form-control input_box" value="<?php echo $product->brand_name; ?>"> </td>
                                                <td>
                                                    <ul>
                                                        <li>
  <a href="javascript:;" id="<?php echo $product->id;?>" class="subVariant subVariant_edit" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                                <i class="fa fa-edit faEdit"></i>
                                                            </a>
                                                        </li>
                                                      <li><a href="javascript:;" id="<?php echo $product->id;?>" class="subVariant subVariant_delete_main" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>   
                                            <?php endforeach;?> 
                                    <?php } else {  echo 'No product found in collection'; } ?>
                                            <tr class="edit_variantSlider" >
                                            
                                            </tr>                                                                                      
                                                                                                            
                                        </tbody>
                                    
                                    </table>
                                </div>
                        	</div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4"> 
                            <div class="add_productForm collectionTag">                            	
                                <div class="demo">
                                    <div class="control-group">
                                        <div class="tags">
                                           <label> Collection Tags</label>
                                        </div>
 <textarea style="width: 390px;height: 80px; border:1px solid #e5e5e5; background:#fff;" name="tags[]"  id="tags" class="tag-text" rows="1"></textarea>    
                                    </div>
                                </div>
                            </div> 
                             <?php foreach ($single_collections as $collection): ?>
                            <div class="add_productForm visibility">
                            	<div class="onlineStore">                                                	
                                    <h2 class="addImages">Collection Visibility</h2>
                                    <div class="inner">
                                     <?php if($collection->is_featured == 1){ ?>
                             <input  type="checkbox" class="check_onlineStore"   name="featured" value="1" style="margin-top: 10px;" checked >
                                     <label class="control-label">Featured </label>
                                                     <?php } else { ?>
                             <input  type="checkbox" class="check_onlineStore"   name="featured" value="1"  style="margin-top: 10px;">
                                     <label class="control-label">Featured </label>
                                                     <?php }  ?>
                                                     <br/>
                                               <?php if($collection->is_approved == 1){ ?>
                             <input type="checkbox" class="check_onlineStore"  name="collection_active" value="1" style="margin-top: 10px;" checked>
                                                   <label class="control-label"> Active </label> 
                                                     <?php } else { ?>
                             <input type="checkbox" class="check_onlineStore"  name="collection_active" value="1" style="margin-top: 10px;">
                                                   <label class="control-label"> Active </label> 
                                                     <?php }  ?>                         
                                                
                                       <div class="publish_date">
                                    	<label>Publish this collection on <span class="required">
                                  * </span></label>
                                    	<div class="col-lg-5 col-md-5 col-sm-5 price_input">      
                          <input class="form-control " type="text" name="publish_date" id="datetimepicker"  required placeholder="Date and Time" value="<?php echo $collection->updated_at; ?>"/>
                                    	</div>
                                           
                                    </div>
                               
                                        
                            	</div> 
                            </div> 
                        </div>                                                
                    </div>     
                    
                       <?php endforeach; ?>
                                   
                    <div class="col-lg-12 col-md-12 col-sm-12 middle_column old_product" id="master_productList">
                        <div class="add_productForm">
                            <div class="col-lg-6 col-md-6 col-sm-6 price_input">
                            	<h2 class="masterList">Add product from master list</h2>
                            </div>
                           
                            <div class="col-lg-1 col-md-1 col-sm-1 closeBtn">
                            	<span><i class="fa fa-close close_icon"></i></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 clearbothDiv">
                                
                                <div class="outerProduct_optionClass">
                                    
                                    
                                	<span class="page_selectSpan">
                                		<label>All products on this page are selected.</label>
                                	</span>
                                </div>
                                <div class="add_Form table-scrollable" >
                                    <table class="table edit_variantTable" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Image</th>
                                                 <th>SKU </th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Compare Price</th>
                                               <th>Brand Name</th>
                                               <th></th>
                                            </tr>
                                        </thead>
                                         
                                        <tbody>     
                                        <?php foreach($product_collections as $product) :?>                  
                                     <tr  class="tr_InputHover" id="master_<?php echo $product->id; ?>">
     <input type="hidden"  class="child_checkClass" id="<?php echo $product->id; ?>" value="<?php echo $product->id; ?>">                
                                         <td class="product_box">
                             <input type="button"  class="child_checkClass" id="<?php echo $product->id; ?>" value="Assign">
                             </td>
                                            <td>   
                                            <div class="variant_image">
                                            <img src="../upload/products/<?php echo $product->file_name; ?>">
                                            </div>
                                            </td>
                                     <td><b><?php echo $product->sku_no; ?></b></td>       
                                            </td>
   <td><input type="text" class="form-control input_box" id="title_<?php echo $product->id; ?>" value="<?php echo $product->title_p; ?>"</td>
    <td><input type="text" id="price_<?php echo $product->id; ?>" class="form-control input_box" value="<?php echo $product->price; ?>"> </td>
                                    <td><input type="text" id="compare_<?php echo $product->id; ?>" class="form-control input_box" value="<?php echo $product->sale_price; ?>"> </td>  
                                          <td><input type="text"  id="brand_<?php echo $product->id; ?>" class="form-control input_box" value="<?php echo $product->brand_name; ?>"> </td>
                                           <td>
                                                    <ul>
                                                <li id="edit_product_<?php echo $product->id; ?>" style="display:none;">
  <a href="javascript:;" id="<?php echo $product->id;?>" class="subVariant subVariant_edit" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit faEdit"></i>
                                                            </a>
                                                        </li>      
     <li id="delete_product_<?php echo $product->id; ?>" style="display:none;"><a href="javascript:;" id="<?php echo $product->id;?>" class="subVariant subVariant_delete" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>  
                                      <?php endforeach;?>                                                                             
                                        </tbody>
                                    </table>
                                </div>                                                                           
                            </div>
                        </div>                                                
                    </div>                      
                    <div class="col-lg-12 col-md-12 col-sm-12 rightHeadingDiv">
                        <ul style="padding-top: 30px;">
                <li><a href="<?php echo base_url();?>collections"><button type="button" class="btn btn-default default_btn">Cancel</button></a></li>
                            <li><button type="submit" class="btn btn-success" >Update Collection</button></li>
                        </ul>
                    </div> 
                    </form>
                    </div>
                </div>                   
            </div>
     




  
<style>
.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: 0px !important;
}
</style>
<div class="modal fade" id="new-product" role="dialog">
<div class="modal-dialog modal-lg newProduct_modal">
  <div class="product_modal modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h2 class="modal-title addProduct">Add new product</h2>
    </div>    	
    <div class="modal-body">                  	                       
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="add_productForm new_productAdd">  

            <input type="hidden" name="collections_id_product" id="collections_id_product"  value="<?php echo $single_id;?>" required >                                            
                    <div class="col-lg-12 col-md-12 col-sm-12 clearbothDiv">
                    	<div class="form-group">
                            <label class="control-label">SKU# <span class="required">
                                  * </span></label>              
               <input class="form-control" type="text"  name="sku_no"  id="sku_no" readonly  value = "<?php  echo $single_sku; ?>"   required>                    
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title <span class="required">
                                  * </span></label>
                            <input class="form-control" type="text"    name="product_title" id="title_p" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product URL <span class="required">
                                  * </span></label>
                            <input class="form-control" type="text" pattern="https?://.+"  name="product_url"  id="product_url" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea   rows="10" name="product_description" id="description"></textarea>
                        </div> 
                                                          
                        <div class="col-lg-6 col-md-6 col-sm-6 price_input">  
                            <div class="form-group">
                                <label class="control-label">Company / Brand Name <span class="required">
                                  * </span></label>
                                  <div class="text-core">
                                  	 <input type="text" class="form-control" name="brand_name"  id="brand_name"  required />
                                  </div>
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Industry </label>
                                <input type="text" class="form-control" name="industry"  id="industry"   />
                            </div> 
                        </div>
                         <div class="col-lg-12 col-md-12 col-sm-12 price_input">
                            <div class="form-group">
                                  <label class="control-label">Category <span class="required">
                                  * </span></label>
                                <select class="form-control" name="category_id" id="category_id_p" required>
                              <option value="0">Select Category</option> 
                                   <?php  foreach($categories as $cat) :?>
                               <option value="<?php  echo $cat['id']; ?>" ><?php  echo $cat['name']; ?></option>
                                   <?php endforeach;?>
                                   </select>
                            </div>
                        </div>                                                                                      
                        <div class="col-lg-12 col-md-12 col-sm-12 price_input">
                            <h2 class="addImages">Pricing</h2>
                            <div class="col-lg-4 col-md-4 col-sm-4 pricing">
                                <div class="form-group">
                                    <label class="control-label">Currency</label>
                                    <select class="form-control" name="currency" id="currency">
                                       <option  value="INR" >Select Currency</option> 
                                        <option value="INR"  >India Rupees - INR</option>
                                        <option value="JPY">Japan Yen - JPY</option>
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
                                        
                                        <input class="form-control" type="text" pattern="0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?" placeholder="0.00" name="price" id="price" required>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 price_input">
                                <div class="form-group">
                                    <label class="control-label">Compare at price </label>
                                    <div class="input-group">
                                        <input class="form-control" type="text"  pattern="0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?"  name="sale_price" id="sale_price" required>
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
                    <div class="form-group">
                         <label class="control-label">Page title  (maxlength - 62 char)<span class="required">
                                  * </span></label>
                                        <select class="form-control" name="page" id="page_id_product" required>
                                  <option value="1" >Automatic</option>
                                  <option value="2" >Manual</option> 
                                   </select> 
                                   <br/>  
              <input type="text" readonly  class="form-control"  name="page_title"  id="page_title_value_p"   required>
                         <br/>  
           <input type="text"   class="form-control"  maxlength="62"  name="manual"  id="page_title_value_m_p"  style="display:none;">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Keyword (maxlength - 100 char)</label>
                     <input type="text" class="form-control" maxlength="100" name ="keyword" id= "keyword" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta description(maxlength- 160 char)<span class="required">
                                  * </span></label>
                         <input type="text" class="form-control" maxlength="160" name="meta_description" id="meta_description" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">URL <span class="required">
                                  * </span></label>
                        <div class="input-group">                                                        	
                            <input type="text" class="form-control" name="url_slug" id="url_slug_p">
                        </div>
                    </div>
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
     <textarea style="width: 390px;height: 60px; border:1px solid #e5e5e5; background:#fff;" name="tag_product"  id="tag_product" class="tag-text" rows="1"></textarea>      
                                    </div>
                                </div>
                            </div> 
                     
                       <div class="add_productForm online_productStore">
                            	<div class="onlineStore">                                                	
                                    <h2 class="addImages">Product Visibility</h2>
                                    <div class="inner">
                                   <input  type="checkbox" class="check_onlineStore"   name="featured" id="featured"  style="margin-top: 3px;">
                                     <label class="control-label">Featured </label>
                                           <br/>
               <input  type="hidden" class="check_onlineStore"   name="product_active" id="product_active"  value="1"  style="margin-top: 3px;">
                                   <label class="control-label"> Active </label>
                              <input type="hidden"  id="datetimepicker1"  name="publish_date"  value="<?php echo date('Y-m-d H:i:s'); ?>" required>
                                   
                           
                    </div> 
                </div>                                         
            </div>
                                    <div class="product_footer modal-footer">
                                        
                                          <button type="submit" class="btn btn-success" id="save_product" >Save Product</button>
                                          <button type="button" class="btn btn-default default_btn" data-dismiss="modal" >Cancel</button>
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

<!--End Popup for add new product-->    
        
<script src="../assets/curatigo-admin/js/product_col_update.js" type="text/javascript"></script>   
<script src="../assets/curatigo-admin/js/user_add_products.js" type="text/javascript"></script> 
<script src="../assets/curatigo-admin/js/product_update_model.js" type="text/javascript"></script>      
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
<!--javascript for collection update -->

<script type="text/javascript">
CKEDITOR.replace( 'description', {
    filebrowserBrowseUrl: base_url+'browse.php?type=Files',
    filebrowserUploadUrl: base_url+'upload_editor.php?type=Files'
});
      
 CKEDITOR.replace( 'col_description', {
    filebrowserBrowseUrl: base_url+'browse.php?type=Files',
    filebrowserUploadUrl: base_url+'upload_editor.php?type=Files'
});

    
$('body').on('click', '.subVariant_delete_main',function(e) {   
    var product_id= $(this).attr("id");
	var col_id= <?php echo $single_id;?>;
   $.ajax({
      type: 'POST',
       url:'<?=base_url()?>products/ajax_delete',
      data: {product_id:product_id,collection_id:col_id},
      success:function(response)
	 {
		
		    $("#master_"+product_id).remove();
		   $(".edit_variantSlider").hide(400);
     }
        });
    });
	
$('body').on('click', '.btn.btn-default.default_btn',function(e) {   
 
		   $(".edit_variantSlider").hide(400);
    });	
$('body').on('click', '#main_table .subVariant_edit',function(e)
 {    
    var product_id = $(this).attr("id");
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/collection_products/'+product_id,
      data: {product_id:product_id},
      success:function(response)
	  {
         $('.edit_variantSlider').html(response);

       }
        });
    });
      coll_prod =[];
	  $('body').on('click', '#sample_2 .child_checkClass',function(e) {  
	   
		          var product_id = $(this).attr("id");
				 if (product_id.checked = true)
				 {
					    
						  $("#sample_2 #master_"+product_id).clone().appendTo('#main_table');
						  			   
							 $("#sample_2 #master_"+product_id).remove();
						///  $("#sample_2 #master_"+product_id).find('td:eq(0)').html('<input type="button"  class="child_checkClass" '+
						  							//	' value="Asigned">');
						  $("#main_table #master_"+product_id).find('td:eq(0)').hide();
						  
						  
						  $("#edit_product_"+product_id).show();
						  $("#delete_product_"+product_id).show();
						  coll_prod.push(product_id);
						  $("#collection_products").val(coll_prod.toString()); 
						 // coll_prod.splice( $.inArray(product_id, coll_prod), 1 );
                          
				 }
     });
	 
	 
	 $('body').on('change', '.input_box',function(e)
 { 
      
						var product_id = $(this).attr("id");
						var key = product_id.split('_');
						var up  =   key['0'];
						var down =  key['1'];
						var title = this.value;
						
				if(up  == 'price')
				{
					
					 price_compare  =   Number($("#compare_"+down).val());
                     price          =    Number(title);     

						if ((price_compare > price) || (price_compare == price ))
						{
							alert("compare price value is always less than the price value");
							$("#price_"+down).attr("value",price);
							return false;
						}	
				}
				else if(up == 'compare')
				{
					
					  price    =   Number($("#price_"+down).val());
					 price_compare        =    Number(title);     

						if ((price_compare > price) || (price_compare == price ))
						{
							alert("compare price value is always less than the price value");
							$("#compare_"+down).attr("value",price);
							return false;
						}	
				}
				
				   $.ajax({
					  type: 'POST',
					  url:'<?=base_url()?>products/update_product',
					  data: {product:title,compare:up,product_id:down},
					  success:function(response)
					  {
						 console.log(response);
					  }
						 });
		});	
	 
	  $('body').on('click', '.subVariant_delete',function(e) {   
			var product_id= $(this).attr("id");
			var col_id= <?php echo $single_id_collection; ?>;
			
								  //$("#master_"+product_id).clone().appendTo('#sample_2');
								/* $("#main_table #master_"+product_id).clone().appendTo('#sample_2');
								 $("#main_table #master_"+product_id).remove();
							     $("#sample_2 .child_checkClass").show();*/	
								 $("#delete_product_"+product_id).hide();
								  $("#edit_product_"+product_id).hide();
								 $("#main_table #master_"+product_id).find('td:eq(0)').show();
								 $("#main_table #master_"+product_id).clone().appendTo('#sample_2');
								  $("#main_table #master_"+product_id).remove();
								  
								  coll_prod.splice( $.inArray(product_id, coll_prod), 1 );
								  $("#collection_products").val(coll_prod.toString()); 
                          
			}); 
	
</script>

<script type="text/javascript">
   
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
	   $('#datetimepicker1').datetimepicker();
    $('#title').change(function ()
    {
         var val = string_to_slug($('#title').val());
		 var id = <?php echo $single_id;?>;
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_collection_update/',
       data: {product_title:val,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			  $("#url_slug").attr("value",'');
          alert("Duplicate Url Slug");
		  }
		  else
		  {
			 $("#url_slug").attr("value",val);
              return false; 
		  }
     }
        });
          
    });
	
	    $('#url_slug').change(function ()
    {
         var val = string_to_slug($('#url_slug').val());
		  var id = <?php echo $single_id;?>;
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_collection_update/',
      data: {product_title:val,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#url_slug").attr("value",'');
			alert("Duplicate Url Slug");
		  }
		  else
		  {
			 $("#url_slug").attr("value",val);
              return false; 
		  }
     }
        });
          
    });

	




/*jasdeep Javascript for tags and validation of tag end */	
	
	
/*jasdeep Javascript for page title and validation of page title start */
	
     $('#user_id').change(function()
	{
		  var category = $("#category_id option:selected").html();
		  var title =  $('#title').val();
		   var id = <?php echo $single_id;?>;
		   var brand =  $("#user_id option:selected").html();
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
      url:'<?=base_url()?>collections/ajax_page_title_collection/',
      data: {product_title:url,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title_value").attr("value",str);
		  }
     }
        });
		  
    });

$("#page_id").change(function(e)
{  
		     var page_id = this.value;
			  var id = <?php echo $single_id;?>;
	       if(page_id == 1)
	  {
						               
		  var category = $("#category_id option:selected").html();
		  var title =  $('#title').val();
		  var brand =  $("#user_id option:selected").html();
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
			$("#page_title_value").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title_value").attr("value",str);
		  }
     }
        });
		
		   }
		  
    });		
	
	
	 $('#page_title_value_m').change(function()
	{
		  var val = this.value;
		   var id = <?php echo $single_id;?>;
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
       url:'<?=base_url()?>collections/ajax_page_title_collection/',
      data: {product_title:url,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value_m").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title_value").attr("value",str);
		  }
     }
        });
		  
    });
	
	 $('#meta_description_c').change(function()
	{
		   var val = this.value;
		   var id = <?php echo $single_id;?>;
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
      url:'<?=base_url()?>collections/ajax_page_description_collection/',
      data: {product_title:url,product_id:id},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#meta_description_c").attr("value",'');
			alert("Duplicate Page Description");
		  }
		  else
		  {
			 $("#meta_description_c").attr("value",str);
		  }
     }
        });
		  
    });
	
	
	
    $('#meta_description').change(function()
	{
		   var val = this.value;
		 
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
       url:'<?=base_url()?>collections/ajax_page_description/'+url,
      data: {product_id:val},
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
	
	
	
	
	
	           $("#page_id").change(function(e)
		   {  
		           var page_id = this.value;
				   if(page_id == 1)
				  {
						                   $("#page_title_value_m").hide(400);
										   $("#page_title_value_m").prop("required", false);
										   $("#page_title_value").show(400);
				   }
				   else
				   {
					                       $("#page_title_value").hide(400);
										    $("#page_title_value_m").prop("required", true);
										   $("#page_title_value_m").show(400);
				    }
		  
			                              
		   });
		   
/*jasdeep Javascript for page title and validation of page title  end */		   
		   
});
      </script>
 <script type="text/javascript">
	 
	$('#tags').textext({plugins : 'tags autocomplete', tagsItems : <?php echo $tags_all_update ?> })
	
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
<!--javascript for collection update end  -->  


  
  



  
  
<!--javascript for add product start  -->  

<script type="text/javascript">
   
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
	  
    $('#title_p').change(function ()
    {
         var val = string_to_slug($('#title_p').val());
		 
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_products/'+val,
      data: {product_id:val},
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
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_products/'+val,
      data: {product_id:val},
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
      url:'<?=base_url()?>collections/ajax_page_title/'+url,
      data: {product_id:val},
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
        url:'<?=base_url()?>collections/ajax_page_title/'+url,
      data: {product_id:val},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value_p").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title_value_p").attr("value",val);
		  }
     }
        });
		
		   }
		  
    });
	
	 $('#page_title_value_m_p').change(function()
	{
		  var val = this.value;
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
      url:'<?=base_url()?>collections/ajax_page_title/'+url,
      data: {product_id:val},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value_m_p").attr("value",'');
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
				alert("compare price value is always less than the price value");
				$("#sale_price").attr("value",'');
			}
			                              
		   });
		   
		   
});
      </script>  
    
     <script type="text/javascript">
	 
	$('#tag_product').textext({plugins : 'tags autocomplete'})
	
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