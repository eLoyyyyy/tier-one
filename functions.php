<?php

function full_reset(){
	/*http://wordpress.stackexchange.com/questions/207104/edit-theme-wp-head*/
	// Removes the wlwmanifest link
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Removes the RSD link
	remove_action( 'wp_head', 'rsd_link' );
	// Removes the WP shortlink
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	// Removes the canonical links
	remove_action( 'wp_head', 'rel_canonical' );
	// Removes the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 ); 
	// Removes links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'feed_links', 2 ); 
	// Removes the index link
	remove_action( 'wp_head', 'index_rel_link' ); 
	// Removes the prev link
	remove_action( 'wp_head', 'parent_post_rel_link' ); 
	// Removes the start link
	remove_action( 'wp_head', 'start_post_rel_link' ); 
	// Removes the relational links for the posts adjacent to the current post
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	// Removes the WordPress version i.e. -
	remove_action( 'wp_head', 'wp_generator' );
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	
	/*https://wordpress.org/support/topic/wp-44-remove-json-api-and-x-pingback-from-http-headers*/
	add_filter('rest_enabled', '_return_false');
	add_filter('rest_jsonp_enabled', '_return_false');
	
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	
	remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'init', 'full_reset') ;

function tierone_script_enqueue() {
    
    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), '', 'all');
    wp_enqueue_style('bootstrap');
    wp_register_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');
    wp_enqueue_style('font-awesome');
    wp_register_style('owl-carousel', get_stylesheet_directory_uri() . '/css/owl.carousel.css', array(), '', 'all');
    wp_enqueue_style('owl-carousel');
    wp_register_style('owl-carousel-theme', get_stylesheet_directory_uri() . '/css/owl.theme.default.css', array(), '', 'all');
    wp_enqueue_style('owl-carousel-theme');
    wp_register_style('fancybox', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css', array(), '', 'all');
    wp_enqueue_style('fancybox');
    
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.js', array('jquery'), '', false);
    wp_enqueue_script('jquery-vticker', get_stylesheet_directory_uri() . '/js/jquery.vticker.js', array('jquery'), '', false);
    wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', false);
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '', false);
    wp_enqueue_script('fancybox-js', get_stylesheet_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '', false);
    
    wp_register_style('color-theme', get_stylesheet_directory_uri() . '/css/theme.css', array(), '', 'all');
    wp_enqueue_style('color-theme');
    
}
add_action('wp_enqueue_scripts','tierone_script_enqueue');

function tierone_theme_setup(){
		//add_theme_support('menus');
		register_nav_menu('header-menu','Header Navigation');
		register_nav_menu('footer-menu','Footer Navigation');
}
add_action('init', 'tierone_theme_setup');

if (!function_exists('tierone_setup')) :
    
    function tierone_setup(){
        /*Theme Support function*/
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
        */
        add_theme_support('title-tag');

        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background' , apply_filters( 'tier_custom_background_cb', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('aside','image','video'));
        add_theme_support('featured' ,388, 220, true );
        add_theme_support('html5',array('search-form'));
        
        /*Setup the Wordpress custom-logo*/
        
    }

endif;
add_action('after_setup_theme','tierone_setup');


/*add_theme_support('custom-logo', array(
    'height' =>  100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
));*/

/*header logo*/
/*if ( ! function_exists( 'tier_the_custom_logo' ) ) :
function tier_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;*/



/*requires functions*/
require '/inc/custom-excerpt-length.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/widgets/recent-post-widget.php';
require get_template_directory() . '/inc/widgets/tags-widget.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/widgets/socialmedia-widget.php';