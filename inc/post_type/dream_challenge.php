<?php

function dream_challenges_post_type() {
	$labels = array(
		'name'                  => _x( 'DREAM Challenges', 'Post Type General Name', 'cd2h' ),
		'singular_name'         => _x( 'DREAM Challenge', 'Post Type Singular Name', 'cd2h' ),
		'menu_name'             => __( 'DREAM Challenges', 'cd2h' ),
		'name_admin_bar'        => __( 'DREAM Challenges', 'cd2h' ),
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
		'label'                 => __( 'DREAM Challenges', 'cd2h' ),
		'description'           => __( 'DREAM Challenges custom post type', 'cd2h' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'dream_challenge', $args );
}
add_action( 'init', 'dream_challenges_post_type', 0 );


add_action( 'load-post.php', 'dream_meta_boxes_setup' );
add_action( 'load-post-new.php', 'dream_meta_boxes_setup' );

//Meta box setup function.
function dream_meta_boxes_setup() {
  // Add meta boxes on the 'add_meta_boxes' hook.
  add_action( 'add_meta_boxes', 'dream_meta_boxes' );
  // Save post meta on the 'save_post' hook.
  add_action( 'save_post', 'save_dream_meta', 10, 2 );

}

function dream_meta_boxes() {
  add_meta_box( 'dream_meta', esc_html__( 'Meta Data', 'cd2h' ), 'dream_meta_box', 'dream_challenge', 'side', 'default' );
  add_meta_box( 'dream_content', esc_html__( 'Additional Content', 'cd2h' ), 'dream_content_box', 'dream_challenge', 'normal', 'default' );
	add_meta_box( 'dream_person_meta', esc_html__( 'People Involved', 'cd2h' ), 'dream_person_box', 'dream_challenge', 'side', 'default' );
}

function dream_meta_box( $object, $box ) {
  wp_nonce_field( basename( __FILE__ ), 'dream_nonce' );
  $dream_icon = get_post_meta($object->ID, 'dream-icon', true);
  $image = '';
  $is_current = get_post_meta($object->ID, 'current', true);
  if(empty($is_current)) { $is_current = false; }
  if(!empty($dream_icon)){$image = wp_get_attachment_image_src($dream_icon)[0];}
?>
  <p>
    <label for="active">
      <input type="checkbox" name="current" value="true" <?php if($is_current){ echo "checked"; } ?>> <strong>Currently Active?</strong>
    </label>
  </p>
  <div class="media-section">
    <label for="dream-icon"><strong>Icon</strong></label><br>
    <input type="hidden" id="dream-icon" name="dream-icon" value="<?php echo $dream_icon; ?>" />
    <a class="button image-add" href="#" data-uploader-title="Add Icon" data-uploader-button-text="Add image" data-for-input="dream-icon" <?php if(!empty($image)){ echo 'style="display:none;"'; } ?> >Add image</a><br>
      <div class="change-section" <?php if(empty($image)){ echo 'style="display:none;"'; } ?>>
        <a class="change-image" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image" data-for-input="dream-icon">
          <img class="image-preview" src="<?php echo $image; ?>" />
        </a><br>
        <p class="howto">Click the image to edit or update</p>
        <small><a class="remove-image" href="#">Remove image</a></small>
      </div>
  </div>
<?php }

function dream_content_box( $object, $box ) {
?>
<p>
  <label for="secondary"><strong>Secondary Information</strong></label><br />
  <input class="widefat" type="text" name="secondary" id="secondary" value="<?php echo get_post_meta($object->ID, 'secondary', true); ?>" size="30" />
</p>
<p>
  <label for="tertiary"><strong>Tertiary Information</strong></label><br />
  <input class="widefat" type="text" name="tertiary" id="tertiary" value="<?php echo get_post_meta($object->ID, 'tertiary', true); ?>" size="30" />
</p>
<?php }

function dream_person_box( $object, $box ) {
  $person_options = get_person_options();
  $current_people = get_post_meta($object->ID, 'people', true);
  if(empty($current_people)) { $current_people = []; }
?>
<p>
  <?php foreach ($person_options as $key => $val){ ?>
    <label><input type="checkbox" name="people[]" value="<?php echo $val; ?>" <?php if (in_array($val, $current_people)){ echo "checked"; }?>> <?php echo $key; ?></label><br>
  <?php } ?>
</p>

<?php }

/* Save the meta box's post metadata. */
  function save_dream_meta( $post_id, $post ) {
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['dream_nonce'] ) || !wp_verify_nonce( $_POST['dream_nonce'], basename( __FILE__ ) ) )
    return $post_id;
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;
    $meta_keys = array('current', 'dream-icon', 'secondary', 'tertiary', 'people');
    foreach($meta_keys as $key){
      $meta_val = get_post_val($key);
      update_post_meta($post_id, $key, $meta_val);
    }
  }
