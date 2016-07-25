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
				<img src="<?php echo get_template_directory_uri() . '/images/default.jpg'; ?>" />
			</a>
		</figure>
	<?php } ?>
	<div class="genpost-entry-content" itemprop="text">
		 <h3 class="entry-meta site-meta-t">
		 	<small><i class="fa fa-user"> </i> : <?php the_author(); ?> / <i class="fa fa-calendar"> </i> : <?php the_time('F j, Y '); ?> / <i class="fa fa-folder-o"></i> : <?php the_category(' , ');?> / <i class="fa fa-edit"></i> : <?php edit_post_link();?></small>
		 </h3> 
		<?php the_content();?>
	</div>
</article>
<ul class="pager">
	<li class="previous">
		<?php previous_post_link('%link', '<i class="fa fa-chevron-left"></i> Previous in category', TRUE); ?> 
	</li>
	<li class="next">
		<?php next_post_link('%link', 'Next in category <i class="fa fa-chevron-right"></i>', TRUE); ?> 
	</li>
</ul>