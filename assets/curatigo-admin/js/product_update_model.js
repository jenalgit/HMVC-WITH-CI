

$(document).ready(function() 
{
	$('body').on('click', '#update_product_model',function(e)
{

var title_p   = $("#title_p_model").val();
var product_url  = $("#product_url_model").val();
var product_id   = $("#product_id").val();
var cat_id        = $("#category_id_model").val();
var  brand_name           = $("#brand_name_model").val();
var  industry           = $("#industry_model").val();
var  price               = $("#price_model").val();
var  sale_price           = $("#sale_price_model").val();
var  currency           = $("#currency_model").val();

var dataString = 'title_p='+ title_p + '&product_id ='+ product_id + '&product_url=' + product_url + '&cat_id=' + cat_id +'&brand_name=' + brand_name + '&industry=' + industry + '&price=' + price +  '&sale_price=' + sale_price + '&currency=' + currency ;
if(title_p=='' ||  product_url=='' || product_id=='' || cat_id=='' || price=='' || currency=='' )
{
	alert("please enter a required fields in product form")
    return false;
}
else
{
$.ajax({
type: "POST",
url: '../admin/products/product_update_model/',
data: dataString,
success: function(response)
{
	     console.log(response);
           if(response == 0)
		  {
			alert("Product is not saved");
		  }
		  else
		  {
			  
			  alert("Product is Updated successfully ");
			   $(".edit_variantSlider").hide(400); 
			  
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
 
