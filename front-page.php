<?php /* Template Name: Front Page 2 */ ?>

<?php get_header(); ?>
<main id="main" class="site-main" ><!-- itemscope itemtype="http://schema.org/Blog" -->
    <div class="padded-container">
        <div class="container-fluid bg-default">
            <div class="row" id="fp2-slider">
                <?php $args = array( 'posts_per_page' => 3, ); query_posts($args); $active = true;?>
                <?php if(have_posts()) : ?>                 
                 
                <div id="slider" class="carousel slide col-lg-9 col-md-9 col-sm-12" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner"> <!-- 870x330--> 
                        <?php while( have_posts() ) : the_post(); ?>  
                            <div class="item <?php echo ($active == true) ? 'active' : ''; $active = false;?>">
                                <?php if ( has_post_thumbnail() ) { ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail( 'featured' , array('itemprop'=>'image', 'class'=>'featured-image')); ?>
                                        </a>
                                <?php } elseif ( is_url_exist($first_image) ) { ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="featured-image" src="<?php echo get_first_image(); ?>" itemprop="image"/>
                                        </a>
                                <?php } else { ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="featured-image" src="<?php echo get_template_directory_uri() . '/images/default.jpg'; ?>" itemprop="url"/>
                                        </a>
                                <?php } ?> 
                            </div>
                        <?php endwhile; ?>
                        <?php rewind_posts(); $count = 0;?>
                    </div>
                </div>

                <div id="slider_captions" class="col-lg-3 col-md-3 col-sm-12">
                    <div>
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div id="caption-<?php echo $count++;?>" class="carousel-caption">
                            <?php the_title( sprintf('<h2 class="entry-title" itemprop="headline"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                            <small><?php echo get_the_category()[0]->cat_name; ?>, <?php the_date('M d Y');?></small>
                            <p class="excerpt"><?php tierone_excerpt(10, true); ?></p>
                            <a href="<?php esc_url( the_permalink() ); ?>" class="permalink">Continue Reading</a>
                        </div>
                        <?php endwhile; ?>
                        <!-- <div id="caption-0" class="carousel-caption">
                            <h2>LOREM IPSUM</h2>
                            <small>Category Name, Date 00 0000</small>
                            <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, enim. A sint repudiandae tempora,</p>
                            <a href="#" class="permalink">Continue Reading</a>
                        </div>
                        <div id="caption-1" class="carousel-caption">
                            <h2>Title 2</h2>
                            <small>Category Name, Date 00 0000</small>
                            <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, enim. A sint repudiandae tempora,</p>
                            <a href="#" class="permalink">Continue Reading</a>
                        </div>
                        <div id="caption-2" class="carousel-caption">
                            <h2>Title 3</h2>
                            <small>Category Name, Date 00 0000</small>
                            <p class="excerpt"></p>
                            <a href="#" class="permalink">Continue Reading</a>
                        </div> -->
                    </div>
                    <?php rewind_posts(); $count = 0; $active = true;?>
                    <ol class="carousel-indicators">
                        <?php while ( have_posts() ) : the_post(); ?>
                           <li data-target="#slider" data-slide-to="<?php echo $count++;?>" class="<?php echo ($active == true) ? 'active' : ''; $active = false;?>"></li>
                        <?php endwhile; ?>
                    </ol>
                </div>
                <?php wp_reset_query(); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-9">
                <h2>Categories</h2>
                <div class="row categories">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="category">
                            <div class="category-hover">
                                <p style="text-align:center;"><span class="icon-sports" style="font-size: 8.2em;"></span><br/>Sports</p>
                            </div>
                            <img class="category-image" src="/wordpress/wp-content/uploads/2016/08/Sports.jpg">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="category">
                            <div class="category-hover">
                                <p style="text-align:center;"><span class="icon-egames" style="font-size: 8.2em;"></span><br/>E-Games</p>
                            </div>
                            <img class="category-image" src="/wordpress/wp-content/uploads/2016/08/Egames.jpg">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="category">
                            <div class="category-hover">
                                <p style="text-align:center;"><span class="icon-casino" style="font-size: 8.2em;"></span><br/>Casino</p>
                            </div>
                            <img class="category-image" src="/wordpress/wp-content/uploads/2016/08/Casino.jpg">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="category">
                            <div class="category-hover">
                                <p style="text-align:center;"><span class="icon-lottery" style="font-size: 8.2em;"></span><br/>Lotto</p>
                            </div>
                            <img class="category-image" src="/wordpress/wp-content/uploads/2016/08/Lotto.jpg">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="category">
                            <div class="category-hover">
                                <p style="text-align:center;"><span class="icon-poker" style="font-size: 8.2em;"></span><br/>Poker</p>
                            </div>
                            <img class="category-image" src="/wordpress/wp-content/uploads/2016/08/Poker.jpg">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="category">
                            <div class="category-hover">
                                <p style="text-align:center;"><span class="icon-racing" style="font-size: 8.2em;"></span><br/>Racing</p>
                            </div>
                            <img class="category-image" src="/wordpress/wp-content/uploads/2016/08/Racing.jpg">
                        </div>
                    </div>
                </div> <!-- row -->
                <h2>Categories</h2>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <?php $args = array( 'posts_per_page' => 1, ); query_posts($args);?>
                        <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>                            
                                    <?php get_template_part('templates/content2', 'cat1a'); ?>        
                            <?php endwhile; ?>
                         <?php wp_reset_query(); ?>
                         <?php endif; ?>
                        <!-- <img src="http://placehold.it/460x500"> -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 irregular-cats">
                        <div class="row">
                            <?php $args = array( 'posts_per_page' => 2, 'offset' => 1 ); query_posts($args);?>
                            <?php if(have_posts()) : ?>
                                <?php while( have_posts() ) : the_post(); ?>  
                                <div class="col-lg-6 col-md-6">
                                        <?php get_template_part('templates/content2', 'cat1b'); ?> 
                                </div>
                                <?php endwhile; ?>
                             <?php wp_reset_query(); ?>
                             <?php endif; ?>
                        </div>
                        <div class="row">
                            <?php $args = array( 'posts_per_page' => 2, 'offset' => 3 ); query_posts($args);?>
                            <?php if(have_posts()) : ?>
                                <?php while( have_posts() ) : the_post(); ?>  
                                <div class="col-lg-6 col-md-6">
                                        <?php get_template_part('templates/content2', 'cat1b'); ?> 
                                </div>
                                <?php endwhile; ?>
                             <?php wp_reset_query(); ?>
                             <?php endif; ?>
                        </div>
                    </div>
                </div>
                <h2>Categories</h2>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <?php $args = array( 'posts_per_page' => 2, 'offset' => 5 ); query_posts($args); $trigger= false;?>
                            <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>  
                                <?php if (!$trigger) : ?>
                                    <?php get_template_part('templates/content2', 'cat2a'); ?> 
                                <?php else : ?>
                                    <?php get_template_part('templates/content2', 'cat2b'); ?>  
                                <?php endif; $trigger = true;?>
                            <?php endwhile; ?>
                         <?php wp_reset_query(); ?>
                         <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <?php $args = array( 'posts_per_page' => 2, 'offset' => 7 ); query_posts($args); $trigger= false;?>
                            <?php if(have_posts()) : ?>
                            <?php while( have_posts() ) : the_post(); ?>  
                                <?php if (!$trigger) : ?>
                                    <?php get_template_part('templates/content2', 'cat2a'); ?> 
                                <?php else : ?>
                                    <?php get_template_part('templates/content2', 'cat2b'); ?>  
                                <?php endif; $trigger = true;?>
                            <?php endwhile; ?>
                         <?php wp_reset_query(); ?>
                         <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 site-pad-r">
                    <?php get_sidebar(); ?>
            </div><!-- .bootstrap cols -->
        </div>
    </div>
</main>
<?php get_footer(); ?>