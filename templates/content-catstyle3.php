<article class="catstyle3-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="col-lg-5">
            <a href="<?php the_permalink(); ?>">
            <?php
            $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 
            ( has_post_thumbnail() ) ? _featured_image( $src[0] ) : get_first_image(); 
            ?>
            </a>
        </div>
        <div class="col-lg-7">
            <div class="post-content">
                <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <p class="featured-excerpt"><?php tierone_excerpt('regular'); ?></p>
            </div>
        </div>
    </div>
</article>