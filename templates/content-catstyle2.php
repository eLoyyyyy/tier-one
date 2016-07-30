<article class="catstyle2-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <a href="<?php the_permalink(); ?>"><?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?></a>
    <p class="featured-excerpt"><?php tierone_excerpt(4); ?></p><!--catstyle2-short-->
</article>