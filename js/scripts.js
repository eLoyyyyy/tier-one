jQuery(document).ready(function($){
    $('.owl-carousel').owlCarousel({
        items:4,
        lazyLoad:true,
        loop:true,
        margin:10,
        nav: true,
        dots: false,
    });
    $(".sexy-gils-link").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
    /*
    $('#example').vTicker('init', {
        speed: 400, 
        pause: 3000,
        height:35
    });
    */
    $('.carousel').carousel();

    jQuery('.menu.navbar-right li a').click(function(){
        jQuery('.tierone-search-box').stop(true,false).slideToggle();
    });
   
    /*Add class Search widget*/
    jQuery('.widget .search-form').find('.search-field').addClass('form-control');
    
    /*Add class Archieve widget*/
    jQuery('section.widget').find('select').addClass('form-control');
    
    /*download app*/
    /*$('.dp-app a').attr({href:'#','data-toggle':'modal','data-target':'#dp_modal'});*/
    
    $('.dp-app a').attr({
        class:'iframe',
        'href':'wp-content/themes/tier-one/inc/download-app.php'
    }).fancybox({
        type: "iframe",
        width: 1280,
        height: 823,
        maxHeight: 823,
        padding : 0
    });
    
    $("#slider").on('slide.bs.carousel', function(evt) {

	   var step = $(evt.relatedTarget).index();

	   $('#slider_captions .carousel-caption:not(#caption-'+step+')').fadeOut('fast', function() {
	   		$('#caption-'+step).fadeIn();
	   });

	});
    
    
    var handled=false;//global variable

    $('#slider').bind('slide.bs.carousel', function (e) {
        var current=$(e.target).find('.item.active');
        var indx=$(current).index();
        if((indx+2)>$('.carousel-indicators li').length)
            indx=-1
         if(!handled)
         {
            $('.carousel-indicators li').removeClass('active')
            $('.carousel-indicators li:nth-child('+(indx+2)+')').addClass('active');
         }
         else
         {
            handled=!handled;//if handled=true make it back to false to work normally.
         }
    });

    $(".carousel-indicators li").on('click',function(){
       //Click event for indicators
       $(this).addClass('active').siblings().removeClass('active');
       //remove siblings active class and add it to current clicked item
       handled=true; //set global variable to true to identify whether indicator changing was handled or not.
    });
});