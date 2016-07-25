<?php get_header(); ?>
<div class="container site-pad-rl">
	<div id="primary" class="col-lg-9 content-area">
		<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ 
				$counter = 0;
			?>
		
			<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>
			
			<?php 
				$counter++;
				if ($counter % 2 == 0) {
					echo '</div><div class="row">';
			 	} 
			?>
			<?php endwhile; ?>
				<ul class="pager">
					<li class="previous">
						<?php if( get_next_posts_link() ) : next_posts_link( '<i class="fa fa-chevron-left"></i> Old Post '); endif; ?>
					</li>
					<li class="next">
						<?php if( get_previous_posts_link() ) : previous_posts_link( ' New Post <i class="fa fa-chevron-right"></i>' ); endif; ?>
					</li>
				</ul>
		</div><!-- .row -->

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; wp_reset_query(); ?>
		</main><!-- #main -->
	</div><!-- .bootstrap cols -->
	<div class="col-lg-3 site-pad-r">
		<?php get_sidebar(); ?>
	</div><!-- .bootstrap cols -->
</div><!-- .row -->
<?php get_footer(); ?>