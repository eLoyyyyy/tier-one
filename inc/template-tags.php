<?php

// automatically retrieve the first image from posts
function get_first_image($single_post = false) {
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
    if ($single_post == false) : 
        ?><div class="featured-image" style="background: url('<?php echo $first_img; ?>')"></div><?php
    else :
        ?><img src="<?php echo $first_img; ?>" /><?php
    endif; 
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



/*Pagination*/
if ( ! function_exists('tierone_paging_nav')) :
    function tierone_paging_nav(){
    //Do not show if the markup show only one
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return;
    }

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if( isset( $url_parts[1] ) ){
        wp_parse_str( $url_parts[1], $query_args);
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';


    //Set up pagination links
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $GLOBALS['wp_query']->max_num_pages,
        'current'  => $paged,
        'mid_size' => 3,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => __('<i class="fa fa-chevron-left"></i> Previous', 'tierone'),
        'next_text' => __('Next <i class="fa fa-chevron-right"></i>','tierone'),
        'type'      => 'list',
    ) );

    if ($links) :   ?>
        <nav class="navigation paging-navigation">
           <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'tierone' ); ?></h1>
           <?php echo $links; ?>
        </nav>
    <?php endif;
    }
endif;


if ( ! function_exists( 'tierone_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tierone_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    $posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

    $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline">' . $byline . '</span>';

}
endif;