<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="genpost-entry-header">
		<?php the_title( '<h1 class="genpost-entry-title" itemprop="headline">', '</h1>' ); ?>
	</header>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="genpost-featured-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'featured' ); ?></a>
		</figure>
	<?php } else { ?>
		<figure class="genpost-featured-image">
			<a href="<?php the_permalink(); ?>">
				<?php get_first_image(true); ?>
			</a>
		</figure>
	<?php } ?>
	<div class="genpost-entry-content" itemprop="text">
		<?php the_content();?>
	</div>
</article>