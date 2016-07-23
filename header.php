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
        <div class="container site-header-main site-pad-rl">
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
        </div><!-- .site-header-main -->

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
    <nav id="header-nav">
        <div class="container">
            <ul class='menu' itemscope='' itemtype='http://schema.org/SiteNavigationElement'>
                <li class="active" itemprop='name'><a itemprop='url'><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <!-- <li ><a href='#'>Hello</a>
                    <ul class='sub-menu'>
                    <li itemprop='name'><a href='#' itemprop='url'>Test 1</a></li>
                    <li itemprop='name'><a href='#' itemprop='url'>Test 2</a></li>
                    <li itemprop='name'><a href='#' itemprop='url'>Test 3</a></li>
                    </ul>
                </li> -->
                <li itemprop='name'><a itemprop='url'>Blog</a></li>
                <li itemprop='name'><a itemprop='url'>Latest</a></li>
                <li itemprop='name'><a itemprop='url'>Featured</a></li>
                <li itemprop='name'><a itemprop='url'>Contact Us</a></li>
            </ul>
            <ul class='menu navbar-right' itemscope='' itemtype='http://schema.org/SiteNavigationElement'>
                <li itemprop='name'><a itemprop='url'><i class="fa fa-search" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </nav>
        
    <aside id="current">
        <div class="container site-pad-rl">
            <div class="marquee-title">MARQUEE SECTION</div>
            <div class="marquee-content">
                <div id="example">
                    <ul>
                        <li><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</a></li>
                        <li><a href="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</a></li>
                        <li><a href="">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</a></li>
                    </ul>
                </div>
            </div>
            <div class="social-media-buttons">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                <i class="fa fa-google-plus" aria-hidden="true"></i>
                <i class="fa fa-youtube" aria-hidden="true"></i>
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </div>
        </div>
    </aside>