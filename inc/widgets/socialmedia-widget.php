<?php
// Creating the widget 
class socialmedia_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'socialmedia_widget', 

            // Widget name will appear in UI
            __('[Tier-One] Social Media', 'socialmedia_widget_domain'), 

            // Widget description
            array( 'description' => __( 'Social Media Widget for Tier-One', 'socialmedia_widget_domain' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        echo '<div class="social-media">';
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        
        $rp = '';
       ?>

        <div class="sm sm-facebook"><a href=""><i class="fa fa-facebook fa-2x" aria-hidden="false"></i></a></div>
        <div class="sm sm-twitter"><a href=""><i class="fa fa-twitter fa-2x" aria-hidden="false"></i></a></div>
        <div class="sm sm-pinterest"><a href=""><i class="fa fa-pinterest-p fa-2x" aria-hidden="false"></i></a></div>
        <div class="sm sm-google-plus"><a href=""><i class="fa fa-google-plus fa-2x" aria-hidden="false"></i></a></div>
        <div class="sm sm-youtube"><a href=""><i class="fa fa-youtube fa-2x" aria-hidden="false"></i></a></div>
        <div class="sm sm-linkedin"><a href=""><i class="fa fa-linkedin fa-2x" aria-hidden="false"></i></a></div>

        <?php

        // This is where you run the code and display the output
        echo __( $rp, 'tag_widget_domain' );
        echo '</div>';
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
function socialmedia_load_widget() {
	register_widget( 'socialmedia_widget' );
}
add_action( 'widgets_init', 'socialmedia_load_widget' );