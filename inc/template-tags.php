<?php

// automatically retrieve the first image from posts
function get_first_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all( '/<img .+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
    $first_img = $matches[1][0];
    if ( empty( $first_img ) ) {
        // defines a fallback imaage
        $first_img = get_template_directory_uri() . "/images/default.jpg";
    }
    ?><div class="featured-image" style="background: url('<?php echo $first_img; ?>')"></div><?php
}


/*Sidebar*/
if ( !function_exists( 'tierone_sidebar' ) ):
    function tierone_sidebar() {

        register_sidebar( array(
            'name' => __( 'Main Sidebar', 'tierone' ),
            'id' => 'main-sidebar',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'description' => __( 'Main Sidebar for Front Page of Tier-One Theme', 'tierone' ),
        ) );

    }
    add_action( 'after_setup_theme', 'tierone_sidebar' );
endif;

if ( !function_exists( 'horizontal_ad_widget' ) ):
    function horizontal_ad_widget() {

        register_sidebar( array(
            'name' => __( 'Horizontal Ad Widget', 'tierone' ),
            'id' => 'horizontal-ad-1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'description' => __( 'Horizontal Ad Widget On Body', 'tierone' ),
        ) );

    }
    add_action( 'after_setup_theme', 'horizontal_ad_widget' );
endif;


/*paging nav*/
