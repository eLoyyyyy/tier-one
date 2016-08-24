<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost">
    <div itemscope itemtype="http://schema.org/BlogPosting">
        <header class="genpost-entry-header">
            <?php the_title( '<h1 class="genpost-entry-title" itemprop="headline">', '</h1>' ); ?>
            <meta itemprop="author" content="<?php the_author();?>">
            <meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
            <meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
        </header>
        <?php tierone_featured_image();
        ?>
        <div class="genpost-entry-content">
             <h3 class="entry-meta site-meta-t">
                <?php if ( has_tag() ) : ?>
                    <i class="fa fa-tags"></i> <?php tierone_tags(); ?><br/>
                <?php endif; ?>
                <small><i class="fa fa-user"> </i> : <?php the_author(); ?> / <i class="fa fa-calendar"> </i> : <time itemprop="datePublished" class="small" datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y '); ?></time> / <i class="fa fa-folder-o"></i> : <?php the_category(' , ');?>  / <i class="fa fa-edit"></i> : <?php edit_post_link();?></small>
             </h3> 
            <div itemprop="articleBody"><?php the_content();?></div>
        </div>
    </div>
</article>