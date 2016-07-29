<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="genpost-entry-header">
		<?php the_title( '<h1 class="genpost-entry-title" itemprop="headline">', '</h1>' ); ?>
	</header>
	<?php tierone_featured_image();?>
	<div class="genpost-entry-content" itemprop="text">
		 <h3 class="entry-meta site-meta-t">
		 	<i class="fa fa-tags"></i>  <?php the_tags('');?><br/>
		 	<small><i class="fa fa-user"> </i> : <?php the_author(); ?> / <i class="fa fa-calendar"> </i> : <?php the_time('F j, Y '); ?> / <i class="fa fa-folder-o"></i> : <?php the_category(' , ');?>  / <i class="fa fa-edit"></i> : <?php edit_post_link();?></small>
		 </h3> 
		<?php the_content();?>
	</div>
</article>