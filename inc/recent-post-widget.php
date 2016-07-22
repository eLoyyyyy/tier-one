<?php
// Creating the widget 
class wpb_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'wpb_widget', 

            // Widget name will appear in UI
            __('[Tier-One] Recent Post', 'wpb_widget_domain'), 

            // Widget description
            array( 'description' => __( 'Recent Post Widget for Tier-One', 'wpb_widget_domain' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        
        $rp = '';
        query_posts( 'posts_per_page=5&order=DESC' );

        
        ?><div class="recent-posts">
            <div class="row"><?php
        // the Loop
        while (have_posts()) : the_post(); ?>
            <div class="col-lg-12 random-post">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="<?php the_permalink(); ?>"><?php ( has_post_thumbnail() ) ? the_post_thumbnail() : get_first_image(); ?></a>
                    </div>
                    <div class="col-lg-8">
                        <div class="recent-post">
                            <span class="text-right">
                                <h3 class="h3-mod"><a href="<?php esc_url( the_permalink() );?>"><?php the_title(); ?></a></h3>
                                <p><small><?php the_time('M j, Y g:i a'); ?></small></p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><hr class="random-post-line"></div>
                </div>
            </div>
        <?php endwhile;
            ?></div>
        </div><?php
   

        // This is where you run the code and display the output
        echo __( $rp, 'wpb_widget_domain' );
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php 
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );