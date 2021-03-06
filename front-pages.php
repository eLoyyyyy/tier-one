<?php /* Template Name: Front Page */ ?>

<?php get_header(); ?>
<main id="main" class="site-main" ><!-- itemscope itemtype="http://schema.org/Blog" -->
    <div class="padded-container">
        <div class="container-fluid site-pad-rl bg-default">
            <?php $args = array( 'posts_per_page' => 6); query_posts($args); $i = 1; $active = true; ?>
            <?php if(have_posts()) : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div id="this-carousel-id" class="carousel slide"><!-- class of slide for animation -->
                        <ol class="carousel-indicators">
                            <?php for ($j = 0; $j < $args['posts_per_page'] / 3; $j++) { 
                                if ($j == 0) : ?>
                                    <li data-target="#this-carousel-id" data-slide-to="<?php echo $j; ?>" class="active"></li>
                                <?php else : ?>
                                    <li data-target="#this-carousel-id" data-slide-to="<?php echo $j; ?>"></li>
                                <?php endif; 
                                } ?>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                                <?php while( have_posts() ) : the_post(); ?>
                                    <?php if ($i == 1) : ?><div class="item <?php echo ($active) ? "active" : ""; ?>">
                                        <div><?php endif; ?>
                                            <?php if ($i == 1) : ?>
                                                <?php get_template_part('templates/content', 'featured'); ?>
                                            <?php else : ?>
                                                <div class="col-lg-3">
                                                   <?php get_template_part('templates/content', 'featured2'); ?>     
                                                </div>
                                            <?php endif; ?>
                                        <?php if ($i == 3) : ?></div>
                                    </div><?php endif; ?>
                                    <?php $active = false; ( $i == 3 ) ? $i = 1: $i++; ?>
                                <?php endwhile; ?> 
                        </div><!-- /.carousel-inner -->
                    </div><!-- /.carousel -->
                </div>
            </div>
            <?php wp_reset_query(); ?>
            <?php endif; ?>

            <div class="col-lg-9 content-area">
                <div class="row featured-content-area clearfix">
                     <div class="col-lg-4">
                        <?php $args = array( 'posts_per_page' => 3, 'cat' => 9 ); query_posts($args); $catstyle1= true; ?>
                        <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>
                                <?php if ($catstyle1 == true) : ?>
                                    <?php get_template_part('templates/content', 'catstyle1a'); ?>
                                <?php else : ?>
                                    <?php get_template_part('templates/content', 'catstyle1b'); ?>     
                                <?php endif; 
                                $catstyle1 = false;?>
                            <?php endwhile; ?> 
                         <?php wp_reset_query(); ?>
                         <?php endif; ?>
                    </div>
                     <div class="col-lg-4">
                        <?php $args = array( 'posts_per_page' => 3, 'cat' => 58 ); query_posts($args); $catstyle1= true;?>
                        <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>                            
                                <?php if ($catstyle1 == true) : ?>
                                    <?php get_template_part('templates/content', 'catstyle1a'); ?>
                                <?php else : ?>
                                    <?php get_template_part('templates/content', 'catstyle1b'); ?>     
                                <?php endif; 
                                $catstyle1 = false; ?>                            
                            <?php endwhile; ?>
                         <?php wp_reset_query(); ?>
                         <?php endif; ?>
                    </div>
                     <div class="col-lg-4">
                        <?php $args = array( 'posts_per_page' => 3, 'cat' => 57 ); query_posts($args); $catstyle1= true;?>
                        <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>
                                    <?php if ($catstyle1 == true) : ?>
                                        <?php get_template_part('templates/content', 'catstyle1a'); ?>
                                    <?php else : ?>
                                        <?php get_template_part('templates/content', 'catstyle1b'); ?>     
                                    <?php endif; 
                                    $catstyle1 = false;?>
                            <?php endwhile; ?>
                         <?php wp_reset_query(); ?>
                         <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php get_template_part('templates/horizontal', 'ad'); ?>
                    </div>
                </div>
                <?php $args = array( 'posts_per_page' => 5, 'cat' => 5 ); query_posts($args);?>
                <?php if(have_posts()) : ?>
                <div class="row">
                        <?php while( have_posts() ) : the_post(); ?>
                                <div class="col-lg-5ths">
                                    <?php get_template_part('templates/content', 'catstyle2'); ?>
                                </div>
                        <?php endwhile; ?>
                </div>
                <?php wp_reset_query(); ?>
                <?php endif; ?>
                <?php $args = array( 'posts_per_page' => 2, 'cat' => 6 ); query_posts($args);?>
                <?php if(have_posts()) : ?>
                <div class="row">
                        <?php while( have_posts() ) : the_post(); ?>
                                <div class="col-lg-12">
                                    <?php get_template_part('templates/content', 'catstyle3'); ?>
                                </div>
                        <?php endwhile; ?> 
                </div>
                <?php wp_reset_query(); ?>
                <?php endif; ?>

                <?php 
                /*$upload_dir = wp_upload_dir(); 

                $path = realpath($upload_dir['basedir']);

                $objects = new RecursiveIteratorIterator(
                               new RecursiveDirectoryIterator($path), 
                               RecursiveIteratorIterator::SELF_FIRST);
                $file_display = array('jpg', 'jpeg', 'png', 'gif');
                if (!empty($objects)) :
                ?>


                <div class="owl-carousel">
                <?php
                    foreach($objects as $name => $object){
                        $file = explode('.', $object->getFilename());
                        $file_type = strtolower(end($file));
                        //$path = str_replace( $_SERVER["DOCUMENT_ROOT"] . 'wordpress', '', str_replace('\\', '/', $object->getPathname()) );
                        $path = strstr( str_replace('\\', '/', $object->getPathname()), '/wp-content');
                        if( in_array($file_type, $file_display) == true ) {
                            ?><a class="sexy-gils-link" rel="group" href="<?php echo bloginfo('url') . $path; ?>"><div class="sexy-gils" style="background: url('<?php echo bloginfo('url') . $path; ?>');"></div></a><?php
                        }
                    }
                ?>
                </div>

                <?php endif ; */?>
            </div>
            <div class="col-lg-3 site-pad-r">
                <?php get_sidebar(); ?>
            </div><!-- .bootstrap cols -->
        </div>
    </div>
</main>
<?php get_footer(); ?>