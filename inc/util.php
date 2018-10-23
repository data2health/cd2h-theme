<?php
// Fetch the post value, else the default value
function get_post_val($key, $default = '') {
    if(isset($_POST[$key]) and
       !empty($_POST[$key])) {
        return $_POST[$key];
    } else {
        return $default;
    }
}
// Pretty prints an object.
function pretty_print($obj){
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
}
function set_post_meta($post_id, $input_name, $meta_val = ""){
  if(empty($meta_val)){
    $meta_val = $input_name;
  }
  $post_val = get_post_val($input_name);
  update_post_meta($post_id, $meta_val, $post_val);
}

function get_post_options() {
  $args = array(
    'posts_per_page'   => -1,
    'orderby'          => 'title',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
  );
  $posts = get_posts($args);
  $choice_array = array();
  foreach($posts as $post){
    $title = get_the_title($post->ID);
    $choice_array[$title] = $post->ID;
  }
  return $choice_array;
}

function get_page_options() {
  $args = array(
    'posts_per_page'   => -1,
    'orderby'          => 'title',
    'order'            => 'DESC',
    'post_type'        => 'page',
    'post_status'      => 'publish',
  );
  $posts = get_posts($args);
  $choice_array = array();
  foreach($posts as $post){
    $title = get_the_title($post->ID);
    $choice_array[$title] = $post->ID;
  }
  return $choice_array;
}

function media_metabox_enqueue($hook) {
  if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
    wp_enqueue_script('custom-admin-js', get_stylesheet_directory_uri() . '/inc/js/media-upload.js', array('jquery'));
  }
}
add_action('admin_enqueue_scripts', 'media_metabox_enqueue');
