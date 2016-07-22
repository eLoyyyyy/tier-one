<?php /* Template Name: Front Page */ ?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div id="this-carousel-id" class="carousel slide"><!-- class of slide for animation -->
            <?php $args = array( 'posts_per_page' => 6 ); query_posts($args); $i = 1; $active = true; ?>
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
                    <?php if(have_posts()) : ?>
                        <?php while( have_posts() ) : the_post(); ?>

                            <?php if ($i == 1) : ?><div class="item <?php echo ($active) ? "active" : ""; ?>"><!-- class of active since it's the first item -->
                                <div class="row"><?php endif; ?>
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
                    <?php endif; ?>
                </div><!-- /.carousel-inner -->
              <!--  Next and Previous controls below
                    href values must reference the id for this carousel 
                <a class="carousel-control left" href="#this-carousel-id" role="button" data-slide="prev">
                    &lsaquo;
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control right" href="#this-carousel-id" role="button" data-slide="next">
                    &rsaquo;
                    <span class="sr-only">Next</span>
                </a> -->
            </div><!-- /.carousel -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
             <div class="row">
                 <div class="col-lg-4">
                     <div class="row">
                        <?php $args = array( 'posts_per_page' => 3, 'cat' => 62 ); query_posts($args); $catstyle1= true; ?>
                        <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>
                                    <div class="col-lg-12">
                                    <?php if ($catstyle1 == true) : ?>
                                        <?php get_template_part('templates/content', 'catstyle1a'); ?>
                                    <?php else : ?>
                                        <?php get_template_part('templates/content', 'catstyle1b'); ?>     
                                    <?php endif; 
                                    $catstyle1 = false;?>
                                    </div>
                            <?php endwhile; ?> 
                        <?php endif; ?>
                     </div>
                </div>
                 <div class="col-lg-4">
                     <div class="row">
                        <?php $args = array( 'posts_per_page' => 3, 'cat' => 72 ); query_posts($args); $catstyle1= true;?>
                        <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>
                                    <div class="col-lg-12">
                                    <?php if ($catstyle1 == true) : ?>
                                        <?php get_template_part('templates/content', 'catstyle1a'); ?>
                                    <?php else : ?>
                                        <?php get_template_part('templates/content', 'catstyle1b'); ?>     
                                    <?php endif; 
                                    $catstyle1 = false; ?>
                                    </div>
                            <?php endwhile; ?> 
                        <?php endif; ?>
                     </div>
                </div>
                 <div class="col-lg-4">
                     <div class="row">
                        <?php $args = array( 'posts_per_page' => 3, 'cat' => 37 ); query_posts($args); $catstyle1= true;?>
                        <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>
                                    <div class="col-lg-12">
                                    <?php if ($catstyle1 == true) : ?>
                                        <?php get_template_part('templates/content', 'catstyle1a'); ?>
                                    <?php else : ?>
                                        <?php get_template_part('templates/content', 'catstyle1b'); ?>     
                                    <?php endif; 
                                    $catstyle1 = false;?>
                                    </div>
                            <?php endwhile; ?> 
                        <?php endif; ?>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php get_template_part('templates/horizontal', 'ad'); ?>
                </div>
            </div>
            <div class="row">
                <?php $args = array( 'posts_per_page' => 5, 'cat' => 39 ); query_posts($args);?>
                <?php if(have_posts()) : ?>
                    <?php while( have_posts() ) : the_post(); ?>
                            <div class="col-lg-5ths">
                                <?php get_template_part('templates/content', 'catstyle2'); ?>
                            </div>
                    <?php endwhile; ?> 
                <?php endif; ?>
            </div>
            <div class="row">
                <?php $args = array( 'posts_per_page' => 2, 'cat' => 72 ); query_posts($args);?>
                <?php if(have_posts()) : ?>
                    <?php while( have_posts() ) : the_post(); ?>
                            <div class="col-lg-12">
                                <?php get_template_part('templates/content', 'catstyle3'); ?>
                            </div>
                    <?php endwhile; ?> 
                <?php endif; ?>
            </div>
            <div class="row">
                <?php 
                $upload_dir = wp_upload_dir(); 
                /*
                $logo_dir = ( $upload_dir['basedir'] );
                echo $logo_dir . '-----<br />';
                $images = glob( $logo_dir . "/2016/*.*" );
                print_r($images);
                foreach( $images as $image ) {
                    echo $image;
                }*/
                /*
                function glob_recursive($pattern, $flags = 0) {
                   $files = glob($pattern, $flags);
                   foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
                      $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
                   }
                   return $files;
                }
                var_dump(glob_recursive($upload_dir['basedir']));
                */
                $path = realpath($upload_dir['basedir']);

                $objects = new RecursiveIteratorIterator(
                               new RecursiveDirectoryIterator($path), 
                               RecursiveIteratorIterator::SELF_FIRST);
                $file_display = array('jpg', 'jpeg', 'png', 'gif');
                ?><div class="owl-carousel"><?php
                foreach($objects as $name => $object){
                    $file = explode('.', $object->getFilename());
                    $file_type = strtolower(end($file));
                    $path = str_replace( $_SERVER["DOCUMENT_ROOT"] . 'wordpress', '', str_replace('\\', '/', $object->getPathname()) );
                    if( in_array($file_type, $file_display) == true ) {
                        ?><a class="sexy-gils-link" rel="group" href="<?php echo bloginfo('url') . $path; ?>"><div class="sexy-gils" style="background: url('<?php echo bloginfo('url') . $path; ?>');"></div></a><?php
                    }
                }
                ?></div><?php
                ?>
            </div>
        </div>
        <div class="col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>                        


                    
</div>
<?php get_footer(); ?>