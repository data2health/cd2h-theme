<?php
/**
* Displays a grid of all the Watson team
* @param string $extra_classes
*/
$args = array(
  'posts_per_page'   => $number,
  'order' => 'DESC',
  'post_status' => 'publish',
  'post_type' => 'post',
);
if(!empty($category)){
  $args['cat'] = $category;
}

$event_category_id = get_cat_ID( 'Events' );
$event_category_link = get_category_link( $event_category_id );

$post_wp_query = new WP_Query($args); ?>


  <div class="posts-slider posts-container mb-5 <?php echo $extra_classes; ?>">
    <div class="posts-owl-carousel owl-carousel">
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
          include(locate_template('template-parts/cardPost.php'));
        endwhile; wp_reset_postdata();
      endif; ?>
    </div>
    <div class="text-center">
      <div class="d-block posts-footer-link py-2">
        <a class="btn-link btn-link-text" href="<?php echo $event_category_link; ?>">View All Events</a>
      </div>
      <div class="d-block posts-footer-link py-2">
        <a class="btn-link btn-link-text" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Visit Our Blog</a>
      </div>
    </div>
  </div>
