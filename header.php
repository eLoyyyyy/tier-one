<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="canonical" href="<?php bloginfo('url'); ?>">
		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
  <!--[if lt IE 9]>
    <script>
        document.createElement("header" );
        document.createElement("footer" );
        document.createElement("section"); 
        document.createElement("aside"  );
        document.createElement("nav"    );
        document.createElement("article"); 
        document.createElement("hgroup" ); 
        document.createElement("time"   );
    </script>
    <noscript>
        <strong>Warning !</strong>
        Because your browser does not support HTML5, some elements are created using JavaScript.
        Unfortunately your browser has disabled scripting. Please enable it in order to display this page.
    </noscript>
    <![endif]-->
   <header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
		<div class="padded-container">
			<div class="container-fluid site-header-main site-pad-rl bg-default">
			   <div class="site-branding">
					<?php  
						$logo = get_theme_mod( 'site_logo', '' );
						$title_option = get_theme_mod( 'site_title_option', 'text-only' );

						if ( $title_option == 'logo-only' && ! empty($logo) ) { ?>
							<div class="site-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
							</div>
						<?php } 

						if ( $title_option == 'text-logo' && ! empty($logo) ) { ?>
							<div class="site-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
							</div>
							<div class="site-title-text">
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
							</div>
						<?php } 

						if ( $title_option == 'text-only' ) { ?>
							<div class="site-title-text">
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
							</div>
					<?php } ?>
				</div><!-- .site-branding -->
					<div class="col-md-7 site-adds-wrap">
						<?php if ( is_active_sidebar( 'horizontal-ad-1' ) ) : ?>
							<div class="header-ad">
								<?php dynamic_sidebar( 'horizontal-ad-1' ); ?> 
							</div><!--header ad-->
						<?php endif; ?> 
					</div>

			</div><!-- .site-header-main -->
		</div>

        <?php if ( get_header_image() ) : ?>
            <?php
                $custom_header_sizes = apply_filters( 'tier_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
            ?>
            <div class="header-image">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            </div><!-- .header-image -->
        <?php endif; // End header image check. ?>
    </header>
	
	<div class="padded-container">
		<div class="container-fluid bg-default">
			<div class="row">
				<nav id="header-nav" class="navbar navbar-default navbar-static-top">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tierone_nav">
							<span class="sr-only"><?php _e('Navigation', 'tierone'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- <a class="navbar-brand" title="<?php bloginfo('name');?>" href="<?php echo esc_html(home_url('/'));?>"><?php bloginfo('name');?></a> -->
					</div>
					<div id="tierone_nav" class="navbar-collapse collapse">
						<span class="tierone-home-icon">
							<a itemprop='url' title="<?php bloginfo('name');?>" href="<?php echo esc_html(home_url('/'));?>"><i class="fa fa-home" aria-hidden="true"></i></a>
						</span>
						<?php if (has_nav_menu("header-menu")): ?>
							<?php tierone_display_main_menu(); ?>
						<?php endif;?>
						<ul class='menu navbar-right' itemscope='' itemtype='http://schema.org/SiteNavigationElement'>
							<li itemprop='name'><a itemprop='url'><i class="fa fa-search" aria-hidden="true"></i></a></li>
						</ul>
						<div class="tierone-search-box">
							<div class="tierone-search-container clearfix">
								<form action="<?php echo esc_url(home_url('/'));?>" id="tierone-search-form" method="get">
									<input type="text" name="s" id="s" placeholder="Search …">
									<input type="submit" value="<?php _e( 'Search', 'tierone' ); ?>" />
								</form>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
    <aside id="current" class="current_wrap">
		<div class="padded-container">
			<div class="container-fluid site-pad-rl bg-default site-pad-tb">
				<div class="marquee-title">MARQUEE SECTION</div>
				<div class="marquee-content">
					<div id="example">
						<!-- <ul>
							<li><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</a></li>
							<li><a href="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</a></li>
							<li><a href="">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</a></li>
						</ul> -->
						<ul>
						<?php $args = array( 'posts_per_page' => 10); query_posts($args); ?>
						<?php if(have_posts()) : ?>
							<?php while( have_posts() ) : the_post(); ?>  
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></li>               
							<?php endwhile; ?>
						 <?php endif; ?>
                         <?php wp_reset_query(); ?>
						</ul>
					</div>
				</div>
				<div class="social-media-buttons">
					 <?php my_social_media_icons();?>
				</div><!-- Social media icons -->
			</div>
		</div>
    </aside>