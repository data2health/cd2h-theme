<?php

// Register Custom Person
function person_post_type() {

	$labels = array(
		'name'                  => _x( 'People', 'Person General Name', 'cd2h' ),
		'singular_name'         => _x( 'Person', 'Person Singular Name', 'cd2h' ),
		'menu_name'             => __( 'People', 'cd2h' ),
		'name_admin_bar'        => __( 'Person', 'cd2h' ),
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
		'label'                 => __( 'Person', 'cd2h' ),
		'description'           => __( 'Person Description', 'cd2h' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'person', $args );

}
add_action( 'init', 'person_post_type', 0 );

add_action( 'load-post.php', 'person_meta_boxes_setup' );
add_action( 'load-post-new.php', 'person_meta_boxes_setup' );

//Meta box setup function.
function person_meta_boxes_setup() {
  // Add meta boxes on the 'add_meta_boxes' hook.
  add_action( 'add_meta_boxes', 'person_meta_boxes' );
  // Save post meta on the 'save_post' hook.
  add_action( 'save_post', 'save_person_meta', 10, 2 );
}

function person_meta_boxes() {
  add_meta_box( 'person_meta', esc_html__( 'Additional Content', 'cd2h' ), 'person_meta_box', 'person', 'normal', 'default' );
}

function person_meta_box( $object, $box ) {
  wp_nonce_field( basename( __FILE__ ), 'person_nonce' );
?>
  <p>
    <label for="email"><strong>Email</strong></label><br />
    <input class="widefat" type="text" name="email" id="email" value="<?php echo get_post_meta($object->ID, 'email', true); ?>" size="30" />
  </p>
<?php }

/* Save the meta box's post metadata. */
  function save_person_meta( $post_id, $post ) {
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['person_nonce'] ) || !wp_verify_nonce( $_POST['person_nonce'], basename( __FILE__ ) ) )
    return $post_id;
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;
    $meta_keys = array('email', );
    foreach($meta_keys as $key){
      $meta_val = get_post_val($key);
      update_post_meta($post_id, $key, $meta_val);
    }
  }
