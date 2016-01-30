

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
  	 
$('body').on('click', '#save_story',function(e)
{

var title   = $("#title").val();
var url = $("#url").val();
var cat_id        = $("#category_id").val();
var title_type_seo        = $("#page_id_product").val();
var file_name         = cover_image;
var product_description = CKEDITOR.instances['description'].getData();
var  user_id           = $("#user_id").val();
var  url_slug           = $("#url_slug").val();
var  is_enable           = ($("#product_active").is(':checked'))? '1' : '0' ;
var  is_featured           = ($("#featured").is(':checked'))? '1' : '0' ;
var  meta_title             = $("#page_title").val();
if(title_type_seo  == '2')
{
   var  meta_title             = $("#page_title_value").val();
}
var  meta_keyword            = $("#keyword").val();
var  meta_description           = $("#meta_description").val();
var tags  = $("#tag_product").textext()[0].hiddenInput().val();
tags = JSON.parse(tags);
//tags = dffd.join(",");
//console.log(tags);
var updated_at          = $("#datetimepicker").val();

if(title =='' || user_id =='' || cat_id=='' || url_slug=='' ||  meta_title=='' || meta_description =='' ||  updated_at =='' || file_name =='1')
{
	alert(" Please fill up required fields in story form");
    return false;
}
else
{
$.ajax({
type: "POST",
url: '../admin/stories/story_save',
data: {title:title,product_description:product_description,url:url,user_id:user_id,cat_id:cat_id,url_slug:url_slug,is_enable:is_enable,is_featured:is_featured,updated_at:updated_at,tags:tags,title_type_seo:title_type_seo,meta_title:meta_title,meta_keyword:meta_keyword,meta_description:meta_description,file_name:file_name},
success: function(response)
{
           if(response == 0)
		  {
			alert("Story is not saved");
		  }
		  else
		  {
			  alert("Story is saved successfully ");
			   window.location.reload();   
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
 
