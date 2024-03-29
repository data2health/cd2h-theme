<?php
/**
* Displays a grid of all the Watson team
* @param string $number
* @param string $category
* @param string $format
* @param string $extra_classes
*/

$today = date('Y/m/d');
$meta_query = array(
  'start' => array(
    'key'     => 'start-date',
    'value'   => $today,
    'compare' => '>=',
  ),
);

$args = array(
  'posts_per_page'   => $number,
  'order' => 'DESC',
  'post_status' => 'publish',
  'post_type' => 'post',
  'orderby' => array(
    'start' => 'ASC',
  ),
  'meta_query' => $meta_query,
);
if(!empty($category)){
  $args['cat'] = $category;
}
$post_wp_query = new WP_Query($args); ?>

<div class="posts-container mb-md-5 <?php echo $extra_classes; ?>">
  <div class="row">
  <?php
  if ( $post_wp_query->have_posts() ) :
    while ( $post_wp_query->have_posts() ) : $post_wp_query->the_post();
    $post_ID = get_the_ID();
    $title = get_the_title($post_ID);
    $url = get_the_permalink($post_ID);
    $slug = sanitize_title_with_dashes($title);
    $featured_category_id = get_post_meta($post_ID, 'featured-category', true);
    if (!empty($featured_category_id)) {
      $featured_category = get_term($featured_category_id)->name;
    } else { $featured_category = ''; }
    $excerpt = get_the_excerpt();
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_ID), 'full');
    $content = get_the_content();
    if ($format == 'condensed') {
      echo '<div class="col-md-6">';
      include(locate_template('template-parts/cardPost_cond.php'));
      echo '</div>';
    } else {
      echo '<div class="col-md-4">';
      include(locate_template('template-parts/cardPost.php'));
      echo '</div>';
    }
  endwhile; wp_reset_postdata(); else :
    echo '<p class="text-center col-12">No upcoming events.</p>';
endif; ?>
  </div>
</div>
