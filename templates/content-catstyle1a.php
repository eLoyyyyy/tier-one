<article class="catstyle1a-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- <div class="featured-content"><?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </div>  -->
    <?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?>
    <div class="caption">
        <div class="entry-title-div">
            <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </div>
    </div>
</article>