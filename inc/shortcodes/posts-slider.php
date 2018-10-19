<?php
/**
* Displays a grid of all the Watson team
* @param string $extra_classes
*/
$args = array(
  'posts_per_page'   => -1,
  'order' => 'ASC',
  'post_status' => 'publish',
  'post_type' => 'post',
);
$post_wp_query = new WP_Query($args); ?>


  <div class="posts-slider posts-container mb-5 <?php echo $extra_classes; ?>">
    <div class="posts-owl-carousel owl-carousel">
      <?php
      if ( $post_wp_query->have_posts() ) :
        while ( $post_wp_query->have_posts() ) : $post_wp_query->the_post();
          $post_ID = get_the_ID();
          $title = get_the_title($post_ID);
          $slug = sanitize_title_with_dashes($title);
          $excerpt = get_the_excerpt();
          $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_ID), 'full');
          $content = get_the_content();
          include(locate_template('template-parts/cardPost.php'));
        endwhile; wp_reset_postdata();
      endif; ?>
    </div>
    <div class="mt-4 text-center">
      <div class="d-block posts-footer-link py-2">
        <a class="btn-link" href="#">View Past Events</a>
      </div>
      <div class="d-block posts-footer-link py-2">
        <a class="btn-link" href="#">Visit Our Blog</a>
      </div>
    </div>
  </div>
