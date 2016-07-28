<?php get_header();?>
<div class="container site-pad-rl">
	<div id="primary" class="col-lg-9 content-area">
		<div class="row">
			<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<?php while (have_posts()): the_post(); ?>
					<?php get_template_part('content','single');?>

				<?php endwhile;?>
			</main>
			<ul class="pager">
				<li class="previous">
					<?php if( get_next_posts_link() ) : next_posts_link( '« Old Post '); endif; ?>
				</li>
				<li class="next">
					<?php if( get_previous_posts_link() ) : previous_posts_link( ' New Post »' ); endif; ?>
				</li>
			</ul>
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
<??>
<?php get_footer();?>