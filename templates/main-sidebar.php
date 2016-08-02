<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    <aside class="widget-main-area main-sidebar " itemscope itemtype="http://schema.org/WPSideBar">
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    </aside><!-- .widget-area -->
<?php endif; ?>