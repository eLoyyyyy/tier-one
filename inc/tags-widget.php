<?php
// Creating the widget 
class tag_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'tag_widget', 

            // Widget name will appear in UI
            __('[Tier-One] Tags', 'tag_widget_domain'), 

            // Widget description
            array( 'description' => __( 'Tag Widget for Tier-One', 'tag_widget_domain' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        echo '<div class="tags">';
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        
        $rp = '';
        $tags = get_tags( array('orderby' => 'count', 'order' => 'DESC', 'number' => 6) );
        echo '<ul class="list-inline">';
        foreach ( (array) $tags as $tag ) {
            echo '<li><a class="btn btn-scratch" href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a></li>';
        }
        echo '</ul>';

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
function tag_load_widget() {
	register_widget( 'tag_widget' );
}
add_action( 'widgets_init', 'tag_load_widget' );