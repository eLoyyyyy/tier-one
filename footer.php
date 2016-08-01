        <div class="container bg-default">
            <nav class="bg-default">
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
                                $args = array(
                                    'theme_location' => 'footer-menu',
                                    'menu_class' => 'menu-right pull-right',
                                    'menu_id' => 'footer_menu',
                                );
                            
                                wp_nav_menu( $args );
                        ?>
                    </div>
                </div>
            </nav>
        </div>
        <footer>
            <div class="container text-center bg-default footer-wrap">
                <p><?php _e('<small>Designed by Niel Rosini. Built by JEJABRY.</small>','tierone'); ?></p>
                <p><?php _e('<small>&copy; 2016. All Rights Reversed.</small>','tierone')?></small></p>
            </div>
        </footer><!--end of footer-->
        <?php wp_footer(); ?>
    </body>
</html>