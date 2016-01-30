$(document).ready(function(e) {

    $('.add_masterList').click(function(e) {
        $('.old_product').show();
    });
	
	$('.close_icon').click(function(e) {
        $('.old_product').hide();
    });
	
	$('.glyphicon.alt').click(function(e) {
        $('.alt_text').toggle(300);
    });
	
	var oldProductFunction = function()
	{
		var getLength= $('.oldProduct_box input[type="checkbox"]:checked').length;
		if(getLength > 0)
		{
			$('.count').text(getLength);
			$('.oldProduct_options').addClass('grow_width').removeClass('shrink_width');
			$('.oldProduct_label').show();
			$('.oldProduct_ul').show();			
			$('.oldProduct_caret').hide();
		}
		else
		{
			$('.count').text("0");
		}
		 if($('.oldProduct_box input:checkbox').length == $('.oldProduct_box input[type="checkbox"]:checked').length)
		 {
			 $('.checkbox_productClass').attr('checked', 'checked');
			 $('.page_selectSpan').show();
		 }
		 else
		 {
			 $('.checkbox_productClass').removeAttr('checked');
			 $('.page_selectSpan').hide();
		 }
	};
	
    $('.oldProduct_box input:checkbox').on('change', function()
	{
		oldProductFunction();
	});
	
	 $('.checkbox_productClass').on('change', function()
	 {
		 var checkthis = $(this);
		 var checkboxes = $('.oldProduct_box input:checkbox');
		 if(checkthis.is(':checked'))
		 {
			 checkboxes.prop('checked',true);
			 $('.page_selectSpan').show();
		 }
		 else
		 {
			 checkboxes.prop('checked',false);
			 $('.oldProduct_options').addClass('shrink_width').removeClass('grow_width');
			 $('.oldProduct_caret').show();	
			 $('.page_selectSpan').hide();
			 $('.oldProduct_label').hide();
			 $('.oldProduct_ul').hide();
		 }		
		 oldProductFunction();
	 });
});