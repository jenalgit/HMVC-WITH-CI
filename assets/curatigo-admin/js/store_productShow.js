$(document).ready(function(e) {

	var checkBoxFunction = function()
	{
		var getLength= $('.product_box input[type="checkbox"]:checked').length;
		if(getLength > 0)
		{
			$('.count').text(getLength);
			$('.product_options').addClass('grow_width').removeClass('shrink_width');
			$('.product_label').show();
			$('.product_ul').show();			
			$('.product_caret').hide();
		}
		else
		{
			$('.count').text("0");
		}
		 if($('.product_box input:checkbox').length == $('.product_box input[type="checkbox"]:checked').length)
		 {
			 $('.checkbox_class').attr('checked', 'checked');
			 $('.page_select').show();
		 }
		 else
		 {
			 $('.checkbox_class').removeAttr('checked');
			 $('.page_select').hide();
		 }
	};
	
    $('.product_box input:checkbox').on('change', function()
	{
		checkBoxFunction();
	});
	
	 $('.checkbox_class').on('change', function()
	 {
		 var checkthis = $(this);
		 var checkboxes = $('.product_box input:checkbox');
		 if(checkthis.is(':checked'))
		 {
			 checkboxes.prop('checked',true);
			 $('.page_select').show();
		 }
		 else
		 {
			 checkboxes.prop('checked',false);
			 $('.product_options').addClass('shrink_width').removeClass('grow_width');
			 $('.product_caret').show();	
			 $('.page_select').hide();
			 $('.product_label').hide();
			 $('.product_ul').hide();
		 }		
		 checkBoxFunction();
	 });
	 
/* ---------------------------------------------------------------------------- */
	$('ul li.collection_content').on('click', function()
	{
		if($(this).hasClass('addClass'))
		{
			$(this).removeClass('addClass');
		}
		else
		{
			$(this).addClass('addClass');
		}
	});

/* ---------------------------------------------------------------------------- */	
});