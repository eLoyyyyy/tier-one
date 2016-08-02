<div class="col-lg-9">
    <article class="featured-post" id="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost" >
    	<link itemprop="mainEntityOfPage" href="<?php echo esc_url( get_permalink() );?>" />
        <header class="entry-meta site-meta-t" style="display:none;">
            <meta itemprop="author" content="<?php the_author();?>">
            <time itemprop="datePublished" datetime="<?php the_time('c'); ?> "><?php the_time('F j, Y '); ?></time>
            <time itemprop="dateModified"><?php the_modified_time('c'); ?></time>
        </header>
        <?php 
            $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 
            $first_image = '';
            if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }

            ?>

            <?php if ( has_post_thumbnail() ) { ?>
                <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <meta itemprop="url" content="<?php the_post_thumbnail_url(); ?>">
                        <?php the_post_thumbnail( 'featured' , array('itemprop'=>'url', 'class'=>'featured-image')); ?>
                    </a>
                </div >
            <?php } elseif ( is_url_exist($first_image) ) { ?>
                <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                    <meta itemprop="url" content="<?php echo get_first_image(); ?>">
                    <a href="<?php the_permalink(); ?>">
                        <img class="featured-image" src="<?php echo get_first_image(); ?>" itemprop="url"/>
                    </a>
                </div >
            <?php } else { ?>
            <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                <a href="<?php the_permalink(); ?>">
                    get_first_image()
                    <img class="featured-image" src="<?php echo get_template_directory_uri() . '/images/default.jpg'; ?>" itemprop="url"/>
                </a>
            </div >
        <?php } ?>
        <div class="carousel-caption">
            <div class="entry-title-div">
                <?php the_title( sprintf('<h2 class="entry-title" itemprop="headline"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </div>
            <p class="featured-excerpt"><?php tierone_excerpt('short'); ?></p>
        </div>
    </article>
</div>