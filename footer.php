
        <footer id="foothead" itemscope itemtype="http://schema.org/WPFooter">
			<div class="padded-container">
                <div class="container-fluid bg-default">
                    <nav id="footer-nav" class="bg-default" itemscope itemtype='http://schema.org/SiteNavigationElement'>
                        <div class="row">
                            <div class="footer-socket clearfix">
                              <div id="footer-socket-social" class="social-media-buttons pull-left list-inline">
                                     <?php my_social_media_icons();?>
                              </div>
                                <?php
                                       /**
                                        * Displays a navigation menu
                                        * @param tierone
                                        */
                                        /*$args = array(
                                            'theme_location' => 'footer-menu',
                                            'menu_class' => 'menu-right pull-right',
                                            'menu_id' => 'footer_menu',
                                            'container'       => false,
                                              'items_wrap'      => '%3$s',
                                              'depth'           => 0,
                                        );

                                        wp_nav_menu( $args );*/
                                        /*echo strip_tags( wp_nav_menu( $args ), '<a>' );*/
                                        if (has_nav_menu("footer-menu")): 
                                            tierone_display_main_menu();
                                        endif;
                                ?>
                            </div>
                        </div>
                    </nav>
                </div>
				<div class="container-fluid text-center bg-default footer-wrap">
					<p><?php _e('<small>&copy; 2016. All Rights Reversed.</small>','tierone')?></p>
				</div>
			</div>
        </footer><!--end of footer-->
        <?php wp_footer(); ?>

    </body>
</html>