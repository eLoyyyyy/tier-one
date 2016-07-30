<article class="catstyle3-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="col-lg-5">
            <a href="<?php the_permalink(); ?>"><?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?></a>
        </div>
        <div class="col-lg-7">
            <div class="post-content">
                <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <p class="featured-excerpt"><?php tierone_excerpt('regular'); ?></p>
            </div>
        </div>
    </div>
</article>