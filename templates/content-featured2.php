<div class="row">
    <div class="col-lg-12">
        <article class="featured-post2" id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
            <?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?>
            <div class="featured-caption">
                <div class="entry-title-div">
                    <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                </div>
                <div class="entry-content">
                    <?php tierone_excerpt(5);?>
                </div>
                
            </div>
        </article>
    </div>
</div>
