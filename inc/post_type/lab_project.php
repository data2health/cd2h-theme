<?php

function lab_project_post_type() {

  $labels = array(
    'name'                  => _x( 'Lab Projects', 'Post Type General Name', 'cd2h' ),
    'singular_name'         => _x( 'Lab Project', 'Post Type Singular Name', 'cd2h' ),
    'menu_name'             => __( 'Lab Projects', 'cd2h' ),
    'name_admin_bar'        => __( 'Lab Projects', 'cd2h' ),
    'archives'              => __( 'Item Archives', 'cd2h' ),
    'attributes'            => __( 'Item Attributes', 'cd2h' ),
    'parent_item_colon'     => __( 'Parent Item:', 'cd2h' ),
    'all_items'             => __( 'All Items', 'cd2h' ),
    'add_new_item'          => __( 'Add New Item', 'cd2h' ),
    'add_new'               => __( 'Add New', 'cd2h' ),
    'new_item'              => __( 'New Item', 'cd2h' ),
    'edit_item'             => __( 'Edit Item', 'cd2h' ),
    'update_item'           => __( 'Update Item', 'cd2h' ),
    'view_item'             => __( 'View Item', 'cd2h' ),
    'view_items'            => __( 'View Items', 'cd2h' ),
    'search_items'          => __( 'Search Item', 'cd2h' ),
    'not_found'             => __( 'Not found', 'cd2h' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'cd2h' ),
    'featured_image'        => __( 'Featured Image', 'cd2h' ),
    'set_featured_image'    => __( 'Set featured image', 'cd2h' ),
    'remove_featured_image' => __( 'Remove featured image', 'cd2h' ),
    'use_featured_image'    => __( 'Use as featured image', 'cd2h' ),
    'insert_into_item'      => __( 'Insert into item', 'cd2h' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'cd2h' ),
    'items_list'            => __( 'Items list', 'cd2h' ),
    'items_list_navigation' => __( 'Items list navigation', 'cd2h' ),
    'filter_items_list'     => __( 'Filter items list', 'cd2h' ),
  );
  $args = array(
    'label'                 => __( 'Lab Project', 'cd2h' ),
    'description'           => __( 'CD2H Labs projects', 'cd2h' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'          => false,
    'taxonomies'            => array( 'section' ),
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-media-document',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'lab_project', $args );

}
add_action( 'init', 'lab_project_post_type', 0 );

// Add sections for lab projects
function lab_cat_init() {
  register_taxonomy(
    'section', 'lab_project',
    array(
      'label' => __( 'Project Type' ),
      'rewrite' => array( 'slug' => 'section' ),
      'hierarchical' => true,
    )
  );
}
add_action( 'vc_before_init', 'lab_cat_init' );

add_action( 'load-post.php', 'lab_project_meta_boxes_setup' );
add_action( 'load-post-new.php', 'lab_project_meta_boxes_setup' );

//Meta box setup function.
function lab_project_meta_boxes_setup() {
  // Add meta boxes on the 'add_meta_boxes' hook.
  add_action( 'add_meta_boxes', 'lab_project_meta_boxes' );
  // Save post meta on the 'save_post' hook.
  add_action( 'save_post', 'save_lab_project_meta', 10, 2 );
}

function lab_project_meta_boxes() {
  add_meta_box( 'lab_project_meta', esc_html__( 'Additional Content', 'cd2h' ), 'lab_project_meta_box', 'lab_project', 'normal', 'default' );
}

function lab_project_meta_box( $object, $box ) {
  wp_nonce_field( basename( __FILE__ ), 'lab_project_nonce' );
  $curr_active = get_post_meta($object->ID, 'active', true);
  $people = get_person_options();
  if(empty($curr_active)) { $curr_active = false; }

  $project_lead = get_post_meta($object->ID, 'project-lead', true);

?>
  <p>
    <label for="active">
      <input type="checkbox" name="active" value="true" <?php if($curr_active){ echo "checked"; } ?>> <strong>CD2H Project</strong>
    </label>
  </p>
  <p>
    <strong><label for="venue-location">Project Lead</label></strong>
    <select class="widefat" name="project-lead">
      <option value="" <?php if("" == $project_lead){ echo "selected"; } ?>>None</option>
      <?php foreach($people as $key => $val){ ?>
        <option value="<?php echo $val; ?>" <?php if($val == $project_lead){ echo "selected"; } ?> ><?php echo $key; ?></option>
      <?php } ?>
    </select>
  </p>
  <p>
    <label for="acknowledgements"><strong>Acknowledgements</strong></label><br />
    <input class="widefat" type="text" name="acknowledgements" id="acknowledgements" value="<?php echo get_post_meta($object->ID, 'acknowledgements', true); ?>" size="30" />
  </p>
  <p>
    <label for="test-prototype"><strong>Test Prototype URL</strong></label><br />
    <input class="widefat" type="text" name="test-prototype" id="test-prototype" value="<?php echo get_post_meta($object->ID, 'test-prototype', true); ?>" size="30" />
  </p>
  <p>
    <label for="submit-feedback"><strong>Submit Feedback URL</strong></label><br />
    <input class="widefat" type="text" name="submit-feedback" id="submit-feedback" value="<?php echo get_post_meta($object->ID, 'submit-feedback', true); ?>" size="30" />
  </p>

<?php }

/* Save the meta box's post metadata. */
  function save_lab_project_meta( $post_id, $post ) {
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['lab_project_nonce'] ) || !wp_verify_nonce( $_POST['lab_project_nonce'], basename( __FILE__ ) ) )
    return $post_id;
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;
    $meta_keys = array('active', 'project-lead', 'acknowledgements', 'test-prototype', 'submit-feedback',);
    foreach($meta_keys as $key){
      $meta_val = get_post_val($key);
      update_post_meta($post_id, $key, $meta_val);
    }
  }
