<article class="catstyle1b-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <hr>
    <div class="row">
        <div class="col-lg-5">
            <a href="<?php the_permalink(); ?>"><?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?></a>
        </div>
        <div class="col-lg-7">
            <div class="caption">
                <div class="entry-title-div">
                    <?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                </div>
                <p class="featured-date"><small><?php the_time('M j, Y g:i a'); ?></small></p>
            </div>
        </div>
    </div>
    
    
</article>