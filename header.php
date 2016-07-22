<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="canonical" href="<?php bloginfo('url'); ?>">
		<?php wp_head(); ?>
	</head>
    <body>
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
    <header>
        <div class="container">
            <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
            <h2><?php bloginfo('tagline'); ?></h2>
        </div>
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
        <div class="container">
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