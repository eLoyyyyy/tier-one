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
    wp_enqueue_style('tierone-media', get_template_directory_uri() . '/css/tierone-media.css',array(), '1.0.0' );
    
    /*custom*/
    wp_enqueue_style('tierone-custom', get_template_directory_uri() . '/custom.css',array(), '1.0.0' );
    
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
        add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));
        
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

/**
* tierone main walker
*/
class tierone_menu_walker extends Walker_Nav_Menu
{
    
    function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $dropdown = $args->has_children && $depth == 0;

        $class_names = $value = '';

        // If the item has children, add the dropdown class for bootstrap
        if ( $dropdown ) {
            $class_names = "dropdown ";
        }

        $classes = empty( $object->classes ) ? array() : (array) $object->classes;

        $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .' itemprop="name">';

        if ( $dropdown ) {
            $attributes = ' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"';
        } else {
            $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .' itemprop="url">';
        $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
        $item_output .= $args->link_after;

        // if the item has children add the caret just before closing the anchor tag
        if ( $dropdown ) {
            $item_output .= ' <b class="caret"></b>';
        }
        $item_output .= '</a>';

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
    } // end start_el function
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
    }
    
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}
// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
function tierone_add_active_class($classes, $item) {
    if( in_array('current-menu-item', $classes) ) {
        $classes[] = "active";
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'tierone_add_active_class', 10, 2 );

/*display the menu*/
function tierone_display_main_menu() {
    wp_nav_menu(
        array( 
            'theme_location' => 'header-menu', /* where in the theme it's assigned */
            'menu' => 'main_nav', /* menu name */
            'menu_class' => 'nav navbar-nav',
            'container' => false, /* container class */
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new tierone_menu_walker(),
        )
    );
}


/*requires functions*/
require get_template_directory() . '/inc/custom-excerpt-length.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/widgets/recent-post-widget.php';
require get_template_directory() . '/inc/widgets/tags-widget.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/widgets/socialmedia-widget.php';