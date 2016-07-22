<article class="catstyle2-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <a href="<?php the_permalink(); ?>"><?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?></a>
    <p class="featured-excerpt"><?php tierone_excerpt('catstyle2-short'); ?></p>
    <a class="read-more" href="<?php the_permalink(); ?>">Read More ...</a>
</article>