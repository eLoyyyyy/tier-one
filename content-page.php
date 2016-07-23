<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="page-entry-header">
		<?php the_title( '<h1 class="page-entry-title">', '</h1>' ); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>