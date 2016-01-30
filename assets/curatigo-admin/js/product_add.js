

$(document).ready(function() 
{
	var cover_image = 1;
Dropzone.options.myDropzone = {
     maxFiles: 1, addRemoveLinks: true, accept: function(file, done) {
    
    console.log("uploaded");
    done();
    
  },
success: function(file, response){
               // alert(response);
                cover_image = response;
				$('.dz-preview').addClass('dz-success');

            },
 

    init: function() {
    this.on("maxfilesexceeded", function(file) { this.removeFile(file); $('.error-image').show(); });
  }

  };
  Dropzone.options.myDropzone1 = {
     maxFiles: 1, addRemoveLinks: true, accept: function(file, done) {
    console.log("uploaded");
    done();
  },
    init: function() {
		
    this.on("maxfilesexceeded", function(file) { this.removeFile(file); $('.error-image').show(); });
  }
  };
  	 
$('body').on('click', '#save_product',function(e)
{

var title_p   = $("#title_p").val();
var collection_id = $("#collection_id").val();
var sku_no    = $("#sku_no").val();
var product_url = $("#product_url").val();
var title_type_seo        = $("#page_id_product").val();
var collection_id = $("#collections_id_product").val();
var cat_id        = $("#category_id_p").val();
var file_name         = cover_image;
var product_description = CKEDITOR.instances['description'].getData();
var  url_slug           = $("#url_slug_p").val();
var  brand_name           = $("#brand_name").val();
var  industry           = $("#industry").val();
var  price               = $("#price").val();
var  user_id               = $("#user_id").val();
var  sale_price           = $("#sale_price").val();
var  currency           = $("#currency").val();
var  is_enable           = 1 ;
var  is_featured           = ($("#featured").is(':checked'))? '1' : '0' ;
var  meta_title             = $("#page_title_value_p").val();
if(title_type_seo == '2')
{
   var  meta_title             = $("#page_title_value_m_p").val();
}
var  meta_keyword            = $("#keyword").val();
var  meta_description           = $("#meta_description").val();
var product_created_at  = $("#datetimepicker1").val();
var tags  = $("#tag_product").textext()[0].hiddenInput().val();
tags = JSON.parse(tags);
//tags = dffd.join(",");
//console.log(tags);
var updated_at          = $("#datetimepicker1").val();

var myarr = sku_no.split("CURATIGO00");
var myno = myarr[1];
console.log(myno)
var str1 = 'CURATIGO00';
var str2 =  Number(myno)  + Number(1);
var res_sku = str1.concat(str2);
if(title_p=='' || sku_no =='' || product_url=='' || brand_name=='' ||  cat_id=='0' ||  collection_id=='' ||  user_id=='' || url_slug=='' || price=='' || currency=='' || meta_title=='' || meta_description =='' ||  updated_at =='' || file_name =='1')
{
	alert("please enter a required fields in product form")
    return false;
}
else
{
var newFirmDiv9 = "";	
$.ajax({
type: "POST",
url: '../admin/products/save/',
data: {title_p:title_p,product_description:product_description,collection_id:collection_id,user_id:user_id,product_url:product_url,cat_id:cat_id,sku_no:sku_no,url_slug:url_slug,brand_name:brand_name,industry:industry,price:price,sale_price:sale_price,currency:currency,is_enable:is_enable,is_featured:is_featured,updated_at:updated_at,tags:tags,meta_title:meta_title,title_type_seo:title_type_seo,meta_keyword:meta_keyword,meta_description:meta_description,file_name:file_name},
success: function(response)
{
           if(response == 0)
		  {
			alert("Product is not saved");
		  }
		  else
		  {
			  alert("Product is saved successfully ");
	  newFirmDiv9 += '<tr class="tr_InputHover" id="master_'+response+'"><input type="hidden" name="product_master[]" class="child_checkClass" id="'+response+'" value="'+response+'"><td class="product_box" style="display:none;"><input type="button"  class="child_checkClass" id="'+response+'" value="Assign" ></td><td><div class="variant_image"><img src="../upload/products/'+file_name+'"></div></td><td><b>'+sku_no+'</b></td><td><input type="text" class="form-control input_box" id="title_'+response+' " value="'+title_p+'"></td><td><input type="text" id="price_'+response+'" class="form-control input_box" value="'+price+'"></td><td><input type="text" id="compare_'+response+'" class="form-control input_box" value="'+sale_price+'"></td><td><input type="text"  id="brand_'+response+'" class="form-control input_box" value="'+brand_name+'"></td><td><ul><li id="delete_product_'+response+'"><a href="javascript:;" id="'+response+'" class="subVariant subVariant_delete" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a></li></ul></td></tr>';	
	            $("#main_table").append(newFirmDiv9);
				 coll_prod.push(response);
			 	$("#collection_products").val(coll_prod.toString());
				 $('#title_p').val('');
				  $('#sku_no').val('');
				   $('#product_url').val('');
				    $('#description').val('');
					 $('#url_slug_p').val('');
					  $('#brand_name').val(''); 
					  $('#industry').val('');
					   $('#price').val('');
					 $('#sale_price').val('');
					  $('#page_title_value_p').val('');
					   $('#page_title_value_m_p').val('');
					    $('#keyword').val('');
						 $('#meta_description').val('');
						  $("#featured").prop("checked", false);
						  $("#category_id_p").val('0');
						  $("#page_id_product").val('1');
						  $("#currency").val('INR');
				 $('#sku_no').val(res_sku);	
				  $("#page_title_value_m_p").hide(400);
						 $("#page_title_value_p").show(400);  
			     $('#new-product').modal('hide');
				
		  }
},
complete: function(){
        $('#new-product').hide();
      }
});
}
return false;
});
});
 
