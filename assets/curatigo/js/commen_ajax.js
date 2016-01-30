//jQuery.noConflict();
$(function(){

 $('[data-toggle="tooltip"]').tooltip(); 


 
var winWidth = $(window); 
var numOfItems = 0;
/*====== product comment js start=====*/

      
  /*====== Filter Js =====*/
  
  
  $('.store-filteration a').click(function() {
       
    $('.store-filter-panel').addClass('panel-visible');
    $('.panel-grid').addClass('resize-visible');
    $('.store-filteration').addClass('change-color');
    });
  
  
  $('.close-panel').click(function() {
     $('.store-filter-panel').removeClass('panel-visible');
     $('.panel-grid').removeClass('resize-visible');
     $('.store-filteration').removeClass('change-color');
  }); 
  
  
    $('.store-categories li').click(function(e) {
    e.stopPropagation();
    $(this).children('ul').slideToggle();
    
      $(this).toggleClass('active');
    
    });
  
$('.filter-store').css({'height':$(window).height()-( $('.main-header').height()+150)});    
$("#filter_store").mCustomScrollbar({
  scrollButtons:{enable:true},
  theme:"minimal-dark",
  scrollbarPosition:"outside"
}); 

/*====== product comment js end  =====*/


 countProperties = function(obj) {
    var count = 0;

    for (var property in obj) {
        if (Object.prototype.hasOwnProperty.call(obj, property)) {
            count++;
        }
    }

    return count;
}

getIndex = function(obj, element) {
    var count=0;

    for (var property in obj) {
      if(element == property){
        return count;
      }
      
      count++;
        
    }

    //return count;
}

more_product = function (cindex){ 
   $.ajax({
      type: 'POST',
      url: base_url+'product/more_product_with_collection',
      data: {cindex:cindex},
      success:function(response){
         $('.more-products').html(response);
         
          }
        });

  }

product_main_show = function (cindex){ 
   $.ajax({
      type: 'POST',
      url: base_url+'product/product_main_show',
      data: {cindex:cindex},
      success:function(response){
         $('#main_show_pop').html(response);
                  
          }
        });

  }


navigation = function (pdate,cindex){  
        $('.prev').hide();
        $('.next').hide();
        if(numOfItems == 1){return false;}
        

        if((numOfItems - cindex) > 1){
            $('.next').show();
        }

       if((numOfItems - cindex) <= (numOfItems - 1)){
            $('.prev').show();
        }
   }



$('body').on('click','.common-pro-popup a',function(e) {
    
   var z = $(this).attr('rel');

 var key = z.split('_');

  var product_date=key[1];  

  var product_data=key[0];
  var product_data1 = product_data.split('-');
  var current_index=product_data1[1];

console.log(product_date);
console.log(current_index);
console.log(sliderData.products[product_date][current_index].url_slug);

   var url=base_url+'product/show/'+sliderData.products[product_date][current_index].url_slug;
   window. history.pushState({}, '', url);


  $("#prev").attr("rel",product_date);
  $("#next").attr("rel",current_index);
 
     

  numOfItems = countProperties(sliderData.products[product_date]);
 //console.log(sliderData.products[product_date]);
  product_main_show(sliderData.products[product_date][current_index].id);

  $(z).addClass('active');

  $('.full-page-slider').addClass('show-slider');
 //  indexNew = $(this).parents('.images-box').index(); 
     
       navigation(product_date, current_index); 
 
       more_product(sliderData.products[product_date][current_index].id);
          
  // $('.main-popup-slider').css({transform: 'translateX(' + (-100 * (indexNew)) + '%)',WebkitTransform: 'translateX(' + (-100 * (indexNew)) + '%)'});

        $('.loader-css').fadeIn(); 
     setTimeout(function(){
        $('.loader-css').fadeOut();
      
      }, 100);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 150);

 


       $('body').addClass('full-slider-open');  
 

    

  
});






$('.full-page-slider button').click(function() {

   var url=$(location).attr('href'); 
   var url_array=url.split('/');
   url_array.pop();
   url_array.pop();
   url=url_array.join('/');
   window. history.pushState({}, '', url);



    $('.full-page-slider').removeClass('show-slider');
    $('.common-slider-content').removeClass('active');
    $('.images').fadeOut();
    $('.main-popup-slider').css({transform: 'none',WebkitTransform: 'none'});
    $('body').removeClass('full-slider-open');
    

    //$('body').css({'overflow-y':'auto'});
    });  








$('.controls-slider a').click(function(e){
  
  var n = $(this).attr('class');
  var active = $(".active").removeClass('active');
  
  product_date = $("#prev").attr("rel");
  current_index = $("#next").attr("rel");


    if(n === ('prev')){
      current_index--;
      }
        
     if(n === ('next')){
      current_index++;
     }

    $("#next").attr("rel",current_index);
    numOfItems = countProperties(sliderData.products[product_date]);

    var url=base_url+'product/show/'+sliderData.products[product_date][current_index].url_slug;
    window. history.pushState({}, '', url);

    product_main_show(sliderData.products[product_date][current_index].id);

    $(product_date).addClass('active');
    $('.full-page-slider').addClass('show-slider');

    navigation(product_date, current_index); 
    more_product(sliderData.products[product_date][current_index].id);

    $('.loader-css').fadeIn(); 
         
       setTimeout(function(){
        $('.loader-css').fadeOut();
      
         }, 100);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 150);
      
   $('body').css({'overflow-y':'none'});    
      
      
       });
  });
  
  
  // jasdeep singh collection detail page


$('.common-col-popup a').click(function() {
	alert(current_user_id);
      
console.log(current_user_id);
    var z = $(this).attr('rel');
    var key = z.split('_');
    var collection_id = key[1]; 
  
  var product_data=key[0];
  var product_data1 = product_data.split('-');
  var current_index=product_data1[1];

 // console.log(sliderData);

  var file = base_url+'upload/products/'+sliderData.products[current_index].file_name;
  $("#prev").attr("rel",collection_id);
  $("#next").attr("rel",current_index);
 
        numOfItems = sliderData.products.length;
if(current_user_id!=''){
 var html_vote='<a href="javascript:;" onclick="increase(1,'+sliderData.products[current_index].id+','+current_user_id+');" >'+
    '<span class="vote-count"><i class="fa fa-caret-up"></i><span>'+ sliderData.products[current_index].vote +'</span></span></a>';
}else{
  var html_vote='<a href="javascript:;" data-toggle="modal" data-target="#common-form" >'+
    '<span class="vote-count"><i class="fa fa-caret-up"></i><span>'+ sliderData.products[current_index].vote +'</span></span></a>';
}     
		//sliderData.products[product_date]
        ///console.log(countProperties(sliderData.products[collection_id]));
        //console.log(sliderData.products[collection_id]); 
        //$('#img-one').val(sliderData.products['collection_id'][0].id);
        $('#pop_title').html(sliderData.products[current_index].title_p);
        $('#pop_desc').html(sliderData.products[current_index].product_description);
        $('#pop_collection').html(sliderData.products[current_index].title);
        $('#pop_img').attr('src',file);
        $('#pop_vote_div').html(html_vote);
      
        $('#pop_url').attr('href',sliderData.products[current_index].product_url);
        $('#pop_price').html(sliderData.products[current_index].price);
        $('#pop_sellprice').html(sliderData.products[current_index].sale_price);
        $(z).addClass('active');
        $('.full-page-slider').addClass('show-slider');
      
     
       navigation_collection(collection_id, current_index,numOfItems); 
 
          
  

         $('.loader-css').fadeIn(); 
       setTimeout(function(){
        $('.loader-css').fadeOut();
      
         }, 1000);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 1500);
      
   $('body').css({'overflow-y':'none'});    

    
    
    $('.full-page-slider button').click(function() {

    $('.full-page-slider').removeClass('show-slider');
    $('.common-slider-content').removeClass('active');
    $('.images').fadeOut();
    $('.main-popup-slider').css({transform: 'none',WebkitTransform: 'none'});
    $('body').css({'overflow-y':'auto'});
    });       
	

   
});



  navigation_collection = function (cid,cindex,numOfItems){  
  
        $('.prev').hide();
        $('.next').hide();
        if(numOfItems == 1){return false;}
        

        if((numOfItems - cindex) > 1){
            $('.next').show();
        }

       if((numOfItems - cindex) <= (numOfItems - 1)){
            $('.prev').show();
        }
   }
   
   
   $('.controls-slidercol a').click(function(e){
  
  var n = $(this).attr('class');
  var active = $(".full-page-slider .active").removeClass('active');
  
  collection_id = $("#prev").attr("rel");
  current_index = $("#next").attr("rel");

    var file = base_url+'upload/products/'+sliderData.products[current_index].file_name;
    if(n === ('prev')){
      current_index--;
      }
        
     if(n === ('next')){
      current_index++;
     }

      $("#next").attr("rel",current_index);

    numOfItems = sliderData.products.length;
     
     if(current_user_id!=''){
 var html_vote='<a href="javascript:;" onclick="increase(1,'+sliderData.products[current_index].id+','+current_user_id+');" >'+
    '<span class="vote-count"><i class="fa fa-caret-up"></i><span>'+ sliderData.products[current_index].vote +'</span></span></a>';
}else{
  var html_vote='<a href="javascript:;" data-toggle="modal" data-target="#common-form" >'+
    '<span class="vote-count"><i class="fa fa-caret-up"></i><span>'+ sliderData.products[current_index].vote +'</span></span></a>';
}

		//sliderData.products[product_date]
        ///console.log(countProperties(sliderData.products[collection_id]));
        //console.log(sliderData.products[collection_id]); 
        //$('#img-one').val(sliderData.products['collection_id'][0].id);
        $('#pop_title').html(sliderData.products[current_index].title_p);
        $('#pop_desc').html(sliderData.products[current_index].product_description);
       /* $('#pop_collection').html(sliderData.products[current_index].collection_title);*/
        $('#pop_img').attr('src',file);
        $('#pop_vote_div').html(html_vote);
      
        $('#pop_url').attr('href',sliderData.products[current_index].product_url);
        $('#pop_price').html(sliderData.products[current_index].price);
        $('#pop_sellprice').html(sliderData.products[current_index].sale_price);
        $(product_date).addClass('active');
        $('.full-page-slider').addClass('show-slider');
      
          navigation_collection(collection_id, current_index,numOfItems); 
 

 
       

         $('.loader-css').fadeIn(); 
       setTimeout(function(){
        $('.loader-css').fadeOut();
      
         }, 1000);
      
      setTimeout(function(){
      $('.images').fadeIn();
      
      }, 1500);
      
   $('body').css({'overflow-y':'none'});    
      
     // indexNew += checkValue;
      
      //  $('.main-popup-slider').css({transform: 'translateX(' + (-100 * (indexNew)) + '%)',WebkitTransform: 'translateX(' + (-100 * (indexNew)) + '%)'});
      
       });









$(function(){
    $(".dropdown-toggle").hover(            
            function() {

                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).parents('li').toggleClass('open');
               // $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).parents('li').toggleClass('open');
               // $('b', this).toggleClass("caret caret-up");                
            });


     
var hideme = false;
    showCommonCard = function(cardid){
      
        $('#'+cardid).show();
       setTimeout(function() {
    setBox(cardid);
}, 1000)


    }

    setBox = function(cardid){
      
      hideme = true;
      $('#'+cardid).show();

    }


     hideCommonCard = function(cardid){
         if(hideme){
          $('#'+cardid).hide();
         } 
     }     



       




  
/*==== Followers & Following Js Start ====*/    
  
$('.users-followers-link a').click(function() {
  
  $($(this).attr('href')).removeClass('tab-pane fade').animate({'bottom':0},600);
  $('body').addClass('open-popup');
  return false;
  
});

$('.follower-title').click(function() {
  $('.follower-common').removeClass('tab-pane fade').animate({'bottom':'-100%'},600);
  $('body').removeClass('open-popup');
  
});

  
  
  
/*==== Background Section Js Start ====*/ 
  
      
  $('.profile-page-mid .nav a').click(function(e) {
    
    //console.log($(this).parents('li').attr('class'));
    
    if(($(this).attr('rel')=='#bg-change')){
      
      $($(this).attr('rel')).css({'background':'#eee'});
      
    }else{
      
      $('.user-mid-bar').css({'background':'#fff'});
    }
        
    });   
    

      /*==== Owl carousel JS ====*/ 
 
  $('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:20,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        }
    }
});


      /*==== Owl carousel JS ====*/ 
 
  $('#collection_carousel').owlCarousel({
    stagePadding: 20,
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        }
    }
});



  $("#user_carousel").owlCarousel({   
      items : 7, //10 items above 1000px browser width
      itemsDesktop : [1000,4], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option    
      rewindNav: false,
      pagination : false,
     navigation:true,
       navigationText: [
      "<a></a>",
      "<a></a>"
      ],
    });


 


          
    });






  
$('.header-search-form i').click(function(e) {
  
  $('.header-search-form input').show(); 
  $('.header-search-form .fa-close').show(); 
  
});

$('.header-search-form .fa-close').click(function(e) {
  
  $('.header-search-form input').hide(); 
  $(this).hide();
    
});



function sidebarHeight(){
  
  //$('.collection-sidebar').css({'height':$('.colection-css').height()});  .
  $('.collection-sidebar').css({'height':767});  
  
  
  }
sidebarHeight();
$(window).resize(function() {
  
 if($(this).width() <= 767){
   $('.collection-sidebar').css({'height':'auto'});
   } else {
    sidebarHeight();  
  }
  
});


$(window).scroll(function() {


if($(this).scrollTop()+300 > $('.collection-single-mid').height()){
  $('.fixed-user-strip').css({'position':'relative'});
  
}
else { 

$('.fixed-user-strip').css({'position':'fixed'});

}

    
});


see_more_product = function(date,numofrecode){

   var date=date;  
   var show_data=numofrecode; 
  
    $.ajax({
      type: 'POST',
      url: base_url+'product/ajax_product_data',
      data: {date:date,show_data:show_data},
      success:function(response){
     
         $('#show_' + date).html(response);
         $('.isotope').isotope();
                 
          }

        });

}

