<?php get_header(); ?>
<div class="padded-container">
<div class="container-fluid site-pad-rl bg-default">
	<div id="primary" class="col-lg-9 content-area">
		<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<?php if ( have_posts() ) : ?>

			<header class="search-page-header row">
				<h1 class="search-page-title"><?php printf(__( '<span class="search-title-span">Search Results for : </span> %s', 'tierone' ), '<span>' . get_search_query() . '</span>'); ?></h1>
			</header>
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
					get_template_part( 'content', 'search' );
				?>
			
			<?php 
				$counter++;
				if ($counter % 2 == 0) {
					echo '</div><div class="row">';
			 	} 
			?>
			<?php endwhile; ?>
		</div><!-- .row -->
		<?php tierone_paging_nav(); ?>
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; wp_reset_query(); ?>
		</main><!-- #main -->
	</div><!-- .bootstrap cols -->
	<div class="col-lg-3 site-pad-r">
		<?php get_sidebar(); ?>
	</div><!-- .bootstrap cols -->
</div><!-- .row -->
</div>
<?php get_footer(); ?>