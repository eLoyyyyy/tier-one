<div class="col-lg-9">
    <article class="featured-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

        <!-- <div class="featured-content"><?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </div>  -->
        <?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?>
        <div class="carousel-caption">
            <div class="entry-title-div">
                <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </div>
            <p class="featured-excerpt"><?php tierone_excerpt('short'); ?></p>
        </div>
    </article>
</div>