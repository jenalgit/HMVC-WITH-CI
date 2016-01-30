$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
	
/* ------------------------------------------------------ */
	$('input[name="product_quantity"]').TouchSpin({
		min: -1000000000,
		max: 1000000000,
		maxboostedstep: 10000000,
		verticalbuttons: true,
		verticalupclass: 'glyphicon glyphicon-plus',
		verticaldownclass: 'glyphicon glyphicon-minus'
	});

/* ---------------------------------------------------------- */
	$('.store_calender').click(function(e) {
        $(this).parent().next().show();
    });
	
	$('.publishRemovebtn').click(function(e) {
       $(this).parent().hide();
    });
/* ----------------------------------------------------------- */
	$('.subVariant_edit').click(function(e) {
        $('.edit_variantSlider').slideToggle();
    });
	
/* ------------------------------------------------------------ */
	$('.edit_seo').click(function(e) {
		$(this).hide();
        $('.searchEngine_class').show();		
    });

/* ------------------------------------------------------------ */
});