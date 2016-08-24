<?php get_header();?>
<div class="padded-container">
	<div class="container-fluid site-pad-rl bg-default">
		<div id="primary" class="col-lg-9 content-area">
			<div class="row">
				<main id="main" class="site-main" role="main" itemscope itemtype="http://schema.org/Blog">
					<?php while ( have_posts() ): the_post(); ?>
					 
						<?php get_template_part('content','single');?>

					<?php endwhile;?>
				</main>
				<?php tierone_next_prev_link();?> <!-- Next and prev-->
				<span class="cleafix"></span>
				<?php
					get_template_part( 'content', 'related' ); //related post
					comments_template( '', true ); // comments
				?>
			</div>
		</div>
		<div class="col-lg-3 site-pad-r">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<??>
<?php get_footer();?>