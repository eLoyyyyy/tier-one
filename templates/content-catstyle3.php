<article class="catstyle3-post" id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting" >
    <div class="row">
        <link itemprop="mainEntityOfPage" href="<?php echo esc_url( get_permalink() );?>" />
        <header class="entry-meta site-meta-t">
            <meta itemprop="author" content="<?php the_author();?>">
            <meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
            <meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
            <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                <?php $logo = get_theme_mod( 'site_logo', '' ); 
                if ( !empty($logo) ) : ?>
                <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <meta itemprop="url" content="<?php echo esc_url( $logo ); ?>">
                </span>
                <?php endif; ?>
                <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
            </span>
        </header>
        <div class="col-lg-5">
        <?php 
            $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 
            $first_image = '';
            if ( !has_post_thumbnail() ) { $first_image = get_first_image(); }

            ?>

            <?php if ( has_post_thumbnail() ) { ?>
                <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                    <meta itemprop="url" content="<?php the_post_thumbnail_url(); ?>">
					<meta itemprop="width" content="340">
					<meta itemprop="height" content="235">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail( 'featured' , array('itemprop'=>'image', 'class'=>'featured-image')); ?>
                    </a>
                </figure >
            <?php } elseif ( is_url_exist($first_image) ) { ?>
                <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                    <meta itemprop="url" content="<?php echo get_first_image(); ?>">
					<meta itemprop="width" content="340">
					<meta itemprop="height" content="235">
                    <a href="<?php the_permalink(); ?>">
                        <img class="featured-image" src="<?php echo get_first_image(); ?>" itemprop="image"/>
                    </a>
                </figure >
            <?php } else { ?>
            <figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
				<meta itemprop="width" content="340">
				<meta itemprop="height" content="235">
                <a href="<?php the_permalink(); ?>">
                    <img class="featured-image" src="<?php echo get_template_directory_uri() . '/images/default.jpg'; ?>" itemprop="url"/>
                </a>
            </figure >
        <?php } ?>
        </div>
        <div class="col-lg-7">
            <div class="post-content">
                <?php the_title( sprintf('<h2 class="entry-title" itemprop="headline"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <p class="featured-excerpt" itemprop="description"><?php tierone_excerpt('regular'); ?></p>
            </div>
        </div>
    </div>
</article>