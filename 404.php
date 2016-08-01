<?php get_header();?>
<div class="container site-pad-rl bg-default">
	<div id="primary" class="col-lg-12 content-area">
		<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<section class="error-404 not-found">
				<div class="page-content">
					<img src="<?php echo get_template_directory_uri(); ?>/images/404/404 error.png" class="center-block img-responsive">

					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

						<p class="text-center"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tierone' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

					<?php elseif ( is_search() ) : ?>

						<p class="text-center"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tierone' ); ?></p>
						<?php get_search_form(); ?>

					<?php else : ?>

						<p class="text-center"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tierone' ); ?></p>
						<?php get_search_form(); ?>

					<?php endif; ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			<br/>

		</main><!-- #main -->
	</div>
</div>
<?php get_footer();?>