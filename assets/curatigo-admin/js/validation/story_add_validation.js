	
<!--@author : jasdeep singh pahwa-->
<!--@controller : Stories   -->
<!-- @model : story  --> 
<!-- function validation of story add page-->
 
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
    $('#title').change(function ()
    {
         var val = string_to_slug($('#title').val());
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_story_add/'+val,
      data: {product_id:val},
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
   $.ajax({
      type: 'POST',
      url:'<?=base_url()?>collections/ajax_slug_story_add/'+val,
      data: {product_id:val},
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
	
	
/*jasdeep Javascript for page title and validation of page title start */
	
     $('#user_id').change(function()
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
      url:'<?=base_url()?>collections/ajax_page_title/'+url,
      data: {product_id:val},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title").attr("value",str);
		  }
     }
        });
		  
    });
	$("#page_id_product").change(function(e)
{  
		  var page_id = this.value;
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
        url:'<?=base_url()?>collections/ajax_page_title/'+url,
      data: {product_id:val},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title").attr("value",str);
		  }
     }
        });
		
		   }
		  
    });
	
	 $('#page_title_value').change(function()
	{
		  var val = this.value;
		 
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
      url:'<?=base_url()?>collections/ajax_page_title/'+url,
      data: {product_id:val},
      success:function(response)
	 {
		 
		  if(response == 0)
		  {
			$("#page_title_value").attr("value",'');
			alert("Duplicate Page Title");
		  }
		  else
		  {
			 $("#page_title").attr("value",str);
		  }
     }
        });
		  
    });
	
	           $("#page_id_product").change(function(e)
		   {  
		           var page_id = this.value;
				   if(page_id == 1)
				  {
						                   $("#page_title_value").hide(400);
										   $("#page_title").show(400);
										    
				   }
				   else
				   {
					                       $("#page_title").hide(400);
										   $("#page_title_value").show(400);
										   
				    }
		  
			                              
		   });

		   
		   
});
 
	$('#tag_product').textext({plugins : 'tags autocomplete'})
	
		.bind('getSuggestions', function(e, data)
		{
			    var list = <?php echo $tags_html ?>,
				textext = $(e.target).textext()[0],
				query = (data ? data.query : '') || '';
				
		$(this).trigger('setSuggestions',{result : textext.itemManager().filter(list, query)} );
});

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
	