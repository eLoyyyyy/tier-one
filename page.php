<?php get_header(); ?>
<div class="padded-container">
<div class="container-fluid site-pad-rl bg-default">
	<div id="primary" class="col-lg-9 content-area">
		<div class="row">
			<main id="main" class="site-main" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						comments_template( '', true ); // comments
					?>

				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div>
	</div><!-- .bootstrap cols -->
	<div class="col-lg-3 site-pad-r">
		<?php get_sidebar(); ?>
	</div><!-- .bootstrap cols -->
</div><!-- .row -->
</div>
<?php get_footer(); ?>
