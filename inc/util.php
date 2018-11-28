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

function media_metabox_enqueue($hook) {
  if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
    wp_enqueue_script('custom-admin-js', get_stylesheet_directory_uri() . '/inc/js/media-upload.js', array('jquery'));
  }
}
add_action('admin_enqueue_scripts', 'media_metabox_enqueue');


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

function get_person_options() {
  $args = array(
    'posts_per_page'   => -1,
    'orderby'          => 'title',
    'order'            => 'DESC',
    'post_type'        => 'person',
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

function get_workgroup_options() {
  $args = array(
    'posts_per_page'   => -1,
    'orderby'          => 'title',
    'order'            => 'DESC',
    'post_type'        => 'workgroup',
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

function get_tool_category_options() {
  $options = array( 'None' => '');
  $categories = get_terms( 'tool_category',
    array(
      'hide_empty' => false,
      'parent'  => 0,
    )
  );
  foreach($categories as $category){
    $options[$category->name] = $category->term_id;
  }
  return $options;
}

function get_post_category_options() {
  $options = array( 'All Posts' => '');
  $categories = get_categories(array('hide_empty' => false,));
  foreach($categories as $category){
    $options[$category->name] = $category->term_id;
  }
  return $options;
}


function meta_person_box( $object, $box ) {
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

// Shortcode parsing stuff
function get_pattern( $text ) {
    $pattern = get_shortcode_regex();
    preg_match_all( "/$pattern/s", $text, $c );
    return $c;
}

function parse_atts( $content ) {
    $content = preg_match_all( '/([^ ]*)=(\'([^\']*)\'|\"([^\"]*)\"|([^ ]*))/', trim( $content ), $c );
    list( $dummy, $keys, $values ) = array_values( $c );
    $c = array();
    foreach ( $keys as $key => $value ) {
        $value = trim( $values[ $key ], "\"'" );
        $type = is_numeric( $value ) ? 'int' : 'string';
        $type = in_array( strtolower( $value ), array( 'true', 'false' ) ) ? 'bool' : $type;
        switch ( $type ) {
            case 'int': $value = (int) $value; break;
            case 'bool': $value = strtolower( $value ) == 'true'; break;
        }
        $c[ $keys[ $key ] ] = $value;
    }
    return $c;
}

function the_shortcodes( &$output, $text, $child = false ) {

    $patts = get_pattern( $text );
    $t = array_filter( get_pattern( $text ) );
    if ( ! empty( $t ) ) {
        list( $d, $d, $parents, $atts, $d, $contents ) = $patts;
        $out2 = array();
        $n = 0;
        foreach( $parents as $k=>$parent ) {
            ++$n;
            $name = $child ? 'child' . $n : $n;
            $t = array_filter( get_pattern( $contents[ $k ] ) );
            $t_s = the_shortcodes( $out2, $contents[ $k ], true );
            $output[ $name ] = array( 'name' => $parents[ $k ] );
            $output[ $name ]['atts'] = parse_atts( $atts[ $k ] );
            $output[ $name ]['original_content'] = $contents[ $k ];
            $output[ $name ]['content'] = ! empty( $t ) && ! empty( $t_s ) ? $t_s : $contents[ $k ];
        }
    }
    return array_values( $output );
}
