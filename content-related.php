<?php
if (get_theme_mod('tierone_related_post',true)) :
	// get the categories
	$categories = get_the_category();
	$cat_ids = array();
	foreach($categories as $category) $cat_ids[] = $category->term_id;

	$args = array(
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'orderby' => 'rand',
	    'category__in' => $cat_ids,
	    'post__not_in' => array( get_the_ID() ),
	    'posts_per_page' => 3
	);

	$posts_related = new WP_Query();
	$posts_related->query($args);
	if ( $posts_related->have_posts() ) :
	?>

	<div class="related-posts post-section">
	    <div class="genpost-entry-header">
	        <h4 class="genpost-entry-title"><?php esc_html_e('Related Posts', 'tierone') ?></h4>
	    </div>
	    
	    <div class="wrapper row">
	        <?php while( $posts_related->have_posts() ) : $posts_related->the_post(); ?>
	            <article class="col-md-4">
	                <div class="thumbnail">
	                <?php
	                    // Get featured image
	                    if ( has_post_thumbnail() ) {
	                        echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'" alt="'. get_the_title() .'">';
	                        the_post_thumbnail( 'small', array( 'alt' => get_the_title(), 'title' => get_the_title() ) );
	                        echo '</a>';
	                    } else {
	                        echo '<a href="'. get_permalink() .'" title="'. get_the_title() .'" alt="'. get_the_title() .'">';
	                        echo '<img src="' . get_template_directory_uri() . '/images/262x159.jpg" title="'. get_the_title() .'" alt="'. get_the_title() .'"/>';
	                        echo '</a>';
	                    }
	                ?>
		                <div class="caption text-center">
		                    <?php echo '<h3 class="article-title">' . '<a href="' . get_permalink() . '" title="'. get_the_title() .'">' . wp_trim_words( get_the_title(), 5, ' ... ' ) . '</a></h3>';?>
		                    <div class="meta">
		                        <i class="fa fa-calendar"></i> <span class="date"><?php echo date_i18n( 'M d, Y', strtotime( get_the_date('Y-m-d'), false ) ); ?></span>
		                    </div>
		                </div>
	                </div>
	            </article>
	        <?php endwhile; wp_reset_postdata(); ?>
	    <div class="clearfix"></div>
	    </div>
	</div>
	                
	<?php endif; ?>
<?php endif; ?>