<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="genpost-entry-header">
		<?php the_title( sprintf( '<h1 class="genpost-entry-title itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="genpost-featured-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'featured' ); ?></a>
		</figure>
	<?php } else { ?>
		<figure class="genpost-featured-image">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_template_directory_uri() . '/images/default.jpg'; ?>" />
			</a>
		</figure>
	<?php } ?>
	<div class="genpost-entry-content">
		<?php tierone_excerpt(45);?>
	</div>
</article>