<?php

// automatically retrieve the first image from posts
function get_first_image($src = null) {
    global $post, $posts;
    $isnot = ($src) ? true : false;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all( '/<img .+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
    $first_img = $matches[1][0]; 
    if ( empty( $first_img ) ) :
        // defines a fallback imaage
        if(!file_exists($first_img)) :
        $first_img = get_template_directory_uri() . "/images/default.jpg";
        endif;
    endif;

    return $first_img;
}

/*http://stackoverflow.com/questions/7684771/how-check-if-file-exists-from-the-url#answer-7684862*/
function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}

function _featured_image($image_src) {
    ?>
        <!-- <div class="featured-image" style="background: url('<?php echo $image_src; ?>')"></div> -->
        <img class="featured-image" itemprop="image" src="<?php echo $image_src; ?>">
    <?php
}


/*function _featured_image($image_src) {
    ?><div class="featured-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject"><img src="<?php echo $image_src; ?>" itemprop="url"/> </div><?php
}*/



/*Sidebar*/
if ( !function_exists( 'tierone_sidebar' ) ):
    function tierone_sidebar() {

        register_sidebar( array(
            'name' => __( 'Main Sidebar', 'tierone' ),
            'id' => 'main-sidebar',
            'before_widget' => '<section id="%1$s" class="widget %1$s">',
            'after_widget' => '</section>',
            'before_title'  => '<div class="widget-title-container"><h2 class="widget-title">',
            'after_title' => '</h2></div>',
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
        <nav class="navigation paging-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
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

/*featured image*/
function tierone_featured_image(){
    if ( post_password_required() || ! has_post_thumbnail() ) {
        return;
    }

   if ( is_singular() ) : 
        if ( get_theme_mod( 'show_article_featured_image', 1 ) ) { ?>
            <div class="article-featured-image">
                <?php the_post_thumbnail( 'featured-slider' ); ?>
            </div>
        <?php } ?>
    <?php else : ?>
        <div class="article-preview-image">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'featured', array('itemprop' => 'contentUrl') ); ?></a>
        </div>
    <?php endif;
}

/*next post & prev post*/

function tierone_next_prev_link()
{
     if (get_next_post() || get_previous_post()) { ?>
        <nav class="clearfix block">
            <ul class="page-numbers pull-right">
                <li class="previous"><?php previous_post_link('%link', "&laquo; " . __( 'Previous Post', "tierone")); ?></li>
                <li class="next"><?php next_post_link('%link', __( 'Next Post', "tierone") . " &raquo;"); ?></li>
            </ul>
        </nav>
    <?php } 
}

function tierone_tags(){
    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            ?><a rel="tags" href="<?php echo get_tag_link($tag->term_id);?>"><span itemprop="keywords"><?php echo $tag->name;?></span></a>, <?php
        }
    }
}


/* https://wordpress.org/support/topic/need-previous_posts_link-next_posts_link-has-title-and-rel */

if ( !function_exists('get_next_posts_link_attributes') ){
	function get_next_posts_link_attributes($attr){
		$attr = 'rel="myrel" title="mytitle"';
		return $attr;
	}
    add_filter('next_posts_link_attributes', 'get_next_posts_link_attributes');
}
if ( !function_exists('get_previous_posts_link_attributes') ){
	function get_previous_posts_link_attributes($attr){
		$attr = 'rel="myrel" title="mytitle"';
		return $attr;
	}
    add_filter('previous_posts_link_attributes', 'get_previous_posts_link_attributes');
}
