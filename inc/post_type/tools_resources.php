<?php

function tools_resources_post_type() {

  $labels = array(
    'name'                  => _x( 'Tools & Resources', 'Post Type General Name', 'cd2h' ),
    'singular_name'         => _x( 'Tools & Resources', 'Post Type Singular Name', 'cd2h' ),
    'menu_name'             => __( 'Tools & Resources', 'cd2h' ),
    'name_admin_bar'        => __( 'Tools & Resources', 'cd2h' ),
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
    'label'                 => __( 'Tools & Resources', 'cd2h' ),
    'description'           => __( 'CD2H Labs tools_resourcess', 'cd2h' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'thumbnail' ),
    'hierarchical'          => false,
    'taxonomies'            => array( 'tool_category' ),
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-hammer',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'tools-resources', $args );

}
add_action( 'init', 'tools_resources_post_type', 0 );

// Add sections for lab tools_resourcess
function tool_cat_init() {
  register_taxonomy(
    'tool_category', 'tools-resources',
    array(
      'label' => __( 'Tool Category' ),
      'rewrite' => array( 'slug' => 'tool-category' ),
      'hierarchical' => true,
    )
  );
}
add_action( 'vc_before_init', 'tool_cat_init' );

add_action( 'load-post.php', 'tools_resources_meta_boxes_setup' );
add_action( 'load-post-new.php', 'tools_resources_meta_boxes_setup' );

//Meta box setup function.
function tools_resources_meta_boxes_setup() {
  // Add meta boxes on the 'add_meta_boxes' hook.
  add_action( 'add_meta_boxes', 'tools_resources_meta_boxes' );
  // Save post meta on the 'save_post' hook.
  add_action( 'save_post', 'save_tools_resources_meta', 10, 2 );
}

function tools_resources_meta_boxes() {
  add_meta_box( 'tools_meta', esc_html__( 'Meta Data', 'cd2h' ), 'tools_resources_meta_box', 'tools-resources', 'normal', 'default' );
  add_meta_box( 'tool_icon', esc_html__( 'Icon', 'cd2h' ), 'tool_icon_box', 'tools-resources', 'side', 'default' );
}

function tools_resources_meta_box( $object, $box ) {
  wp_nonce_field( basename( __FILE__ ), 'tools_resources_nonce' );
  $curr_size = get_post_meta($object->ID, 'size', true);
  ?>
  <style>.composer-switch { display: none !important; }</style>
  <p>
    <label for="url"><strong>Link URL</strong></label><br />
    <input class="widefat" type="text" name="url" id="url" value="<?php echo get_post_meta($object->ID, 'url', true); ?>" size="30" />
  </p>
  <p>
    <strong><label for="size">Size</label></strong>
    <select class="widefat" name="size">
      <option value="" <?php if("" == $curr_size){ echo "selected"; } ?>>Square</option>
      <option value="rectangle" <?php if("rectangle" == $curr_size){ echo "selected"; } ?> >Rectangle</select>
    </select>
  </p>
  <?php
}

function tool_icon_box( $object, $box ) {
  $tool_icon = get_post_meta($object->ID, 'tool-icon', true);
  $tool_icon_source = '';
  if(!empty($tool_icon)){$tool_icon_source = wp_get_attachment_image_src($tool_icon)[0];}
?>
<div class="media-section" style="text-align: center;">
  <input type="hidden" id="tool-icon" name="tool-icon" value="<?php echo $tool_icon; ?>" />
  <a class="button image-add" href="#" data-uploader-title="Add Icon" data-uploader-button-text="Add image" data-for-input="tool-icon" <?php if(!empty($tool_icon_source)){ echo 'style="display:none;"'; } ?> >Add image</a><br>
    <div class="change-section" <?php if(empty($tool_icon_source)){ echo 'style="display:none;"'; } ?>>
      <a class="change-image" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image" data-for-input="tool-icon">
        <img class="image-preview" src="<?php echo $tool_icon_source; ?>" />
      </a><br>
      <p class="howto">Click the icon to edit or update</p>
      <small><a class="remove-image" href="#">Remove icon</a></small>
    </div>
</div>
<?php }

/* Save the meta box's post metadata. */
  function save_tools_resources_meta( $post_id, $post ) {
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['tools_resources_nonce'] ) || !wp_verify_nonce( $_POST['tools_resources_nonce'], basename( __FILE__ ) ) )
    return $post_id;
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;
    $meta_keys = array('size', 'url', 'tool-icon');
    foreach($meta_keys as $key){
      $meta_val = get_post_val($key);
      update_post_meta($post_id, $key, $meta_val);
    }
  }
