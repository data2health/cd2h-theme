<?php
/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'post_meta_boxes_setup' );
/* Meta box setup function. */
function post_meta_boxes_setup() {
  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'post_meta_boxes' );
  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'save_post_meta', 10, 2 );
}
function post_meta_boxes(){
    add_meta_box( 'post_meta_box', 'Post Meta', 'render_post_meta_box', 'post', 'side', 'high');
}
function render_post_meta_box($object, $box){ ?>
    <?php wp_nonce_field( basename( __FILE__ ), 'post_meta_nonce' );

    $curr_cat = get_post_meta($object->ID, 'featured-category', true);
    $cat_options = get_post_category_options(); ?>
    <p>
        <label for="news-source-name">Link Name</label><br />
        <input type="text" name="source-name" id="source-name" value="<?php echo get_post_meta($object->ID, 'source-name', true); ?>"/>
    </p>
    <p>
        <label for="news-source-url">URL</label><br />
        <input type="text" name="source-url" id="source-url" value="<?php echo get_post_meta($object->ID, 'source-url', true); ?>"/>
    </p>

    <hr  />

    <p>
      <label><strong>Start Date</strong></label>
      <br />
      <input class="datepicker widefat" type="text" name="start-date" id="event-start-date" value="<?php echo esc_attr( get_post_meta($object->ID, 'start-date', true)); ?>" />
    </p>

    <p>
      <label><strong>End Date</strong></label>
      <br />
      <input class="datepicker widefat" type="text" name="end-date" id="event-end-date" value="<?php echo esc_attr( get_post_meta($object->ID, 'end-date', true)); ?>" />
    </p>

    <p>
    <strong><label for="featured-category">Featured Category</label></strong>
    <select class="widefat" name="featured-category">
      <option value="" <?php if("" == $curr_cat){ echo "selected"; } ?>>None</option>
      <?php foreach($cat_options as $key => $val){ ?>
        <option value="<?php echo $val; ?>" <?php if($val == $curr_cat){ echo "selected"; } ?> ><?php echo $key; ?></option>
      <?php } ?>
    </select>
  </p>

<?php
}

/* Save the meta box's post metadata. */
  function save_post_meta( $post_id, $post ) {
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['post_meta_nonce'] ) || !wp_verify_nonce( $_POST['post_meta_nonce'], basename( __FILE__ ) ) )
    return $post_id;
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;
    $meta_keys = array('source-name', 'source-url', 'featured-category', 'end-date', 'date-time');
    foreach($meta_keys as $key){
      $meta_val = get_post_val($key);
      update_post_meta($post_id, $key, $meta_val);
    }
  }

  function enqueue_date_picker(){
    wp_enqueue_script(
      'admin_js',
      get_template_directory_uri() . '/inc/js/admin_dates.js',
      array('jquery', 'jquery-ui-datepicker'),
      time(),
      true
    );
    wp_enqueue_style('jquery_ui_css','https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css',false,"1.9.0",false);
  }
  add_action('admin_enqueue_scripts', 'enqueue_date_picker');
