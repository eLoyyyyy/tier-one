<?php get_header(); ?>
<div class="container site-pad-rl">
	<div id="primary" class="col-lg-9 content-area">
		<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		<header class="archive-page-header row">
			<h1 class="archive-page-title">
				<?php echo get_the_archive_title();	?>
			</h1>
		</header>
		<?php if ( have_posts() ) : ?>

			<?php
				$term_description = term_description( );
				if (empty($term_description)) :
					printf('<div class="taxonomy-description">%s</div>', $term_description);
				endif;

				 /* Start the Loop */ 
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
			<?php tierone_paging_nav(); ?>
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