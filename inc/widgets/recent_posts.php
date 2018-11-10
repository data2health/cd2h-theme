<?php
// Register and load the widget
function wildern_load_widget() {
  register_widget( 'wildern_widget' );
}
add_action( 'widgets_init', 'wildern_load_widget' );

// Creating the widget
class wildern_widget extends WP_Widget {
  function __construct() {
    parent::__construct(

      // Base ID of your widget
      'wildern_widget',

      // Widget name will appear in UI
      __('Recent Posts', 'wildern'),

      // Widget description
      array( 'description' => __( 'Recent Posts with Thumbnails', 'wildern' ), )
    );
  }

  // Creating widget front-end
  public function widget( $args, $instance ) {
    echo '<div class="widget recent-posts-widget">';
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if (!empty($postCount)) { $postCount = $postCount; } else { $postCount = 3;}

    // This is where you run the code and display the output
    //echo __( 'Hello, World!', 'wildern' );
    echo '<h2 class="h2 widget-title text-left">Recent Posts</h2>';

    $args = array(
      'posts_per_page'   => $postCount,
      'orderby'          => 'date',
      'order'            => 'DESC',
      'post_status'      => 'publish',
    );
    $posts = get_posts($args);

    $i = 0;
    $len = count($posts);
    foreach ($posts as $post) {
      $date_format = 'F d, Y';
      $post_id = $post->ID;
      $title = get_the_title($post_id);
      $url = get_the_permalink($post_id);
      $date = get_the_date( $date_format, $post_id );
      $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'large');

      if ($i == 0) {
      // First post
        include 'widget-parts/card.php';
      } else {
        include 'widget-parts/media.php';
      }
      // …
      $i++;
    }
    echo '</div>';
    //End recent post code
    //echo $args['after_widget'];
  }



  // Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'post-count' ] ) ) {
      $postCount = $instance[ 'post-count' ];
    }
    else {
      $postCount = __( 'Post Count', 'wildern' );
    }
    // Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'post-count' ); ?>"><?php _e( 'Posts to Display:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'post-count' ); ?>" name="<?php echo $this->get_field_name( 'post-count' ); ?>" type="text" value="<?php echo esc_attr( $postCount ); ?>" />
    </p>
    <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['post-count'] = ( ! empty( $new_instance['post-count'] ) ) ? strip_tags( $new_instance['post-count'] ) : '';
    return $instance;
  }
} // Class wildern_widget ends here
