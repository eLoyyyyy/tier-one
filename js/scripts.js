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
    $('#example').vTicker('init', {
        speed: 400, 
        pause: 3000,
        height:35
    });
    $('.carousel').carousel();

    jQuery('.menu.navbar-right li a').click(function(){
        jQuery('.tierone-search-box').stop(true,false).slideToggle();
    });
});