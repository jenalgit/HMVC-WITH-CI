

$(document).ready(function() 
{
	  var cover_image;
Dropzone.options.myDropzone = {
     maxFiles: 1, addRemoveLinks: true, accept: function(file, done) {
    
    console.log("uploaded");
    done();
    
  },

success: function(file, response)
{
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
  	 
$('body').on('click', '#update_product',function(e)
{

var title_p   = $("#title_p").val();
if(title_p == '')
{
	alert("please enter a required fields in product form")
}	
var sku_no    = $("#sku_no").val();
var product_url  = $("#product_url").val();
var product_id   = $("#product_id").val();
var title_type_seo        = $("#page_id_product").val();
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
var  is_enable           = ($("#product_active").is(':checked'))? '1' : '0' ;
var  is_featured           = ($("#featured").is(':checked'))? '1' : '0' ;
var  meta_title             = $("#page_title_value_p").val();
if(title_type_seo == '2')
{
   var  meta_title             = $("#page_title_value_m_p").val();
}
var  meta_keyword            = $("#keyword").val();
var  meta_description           = $("#meta_description").val();
var tags  = $("#tag_product").textext()[0].hiddenInput().val();
tags = JSON.parse(tags);
//tags = dffd.join(",");
//console.log(tags);
var updated_at          = $("#datetimepicker").val();

if(title_p=='' || sku_no =='' || product_url=='' || updated_at=='' ||  user_id=='' ||  product_id=='' || cat_id=='' || url_slug=='' || price=='' || currency=='' || meta_title=='' ||meta_description =='')
{
	alert("please enter a required fields in product form")
    return false;
}
else
{
$.ajax({
type: "POST",
url: '../admin/products/product_update/',
data: {title_p:title_p,product_description:product_description,product_url:product_url,cat_id:cat_id,sku_no:sku_no,product_id:product_id,url_slug:url_slug,brand_name:brand_name,industry:industry,price:price,user_id:user_id,sale_price:sale_price,currency:currency,is_enable:is_enable,is_featured:is_featured,updated_at:updated_at,tags:tags,title_type_seo:title_type_seo,meta_title:meta_title,meta_keyword:meta_keyword,meta_description:meta_description,file_name:file_name},
success: function(response)
{
	     
           if(response == 0)
		  {
			alert("Product is not saved");
		  }
		  else
		  {
			  alert("Product is Updated successfully ");
			  window.location.href = '../admin/products'; 
			  
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
 
