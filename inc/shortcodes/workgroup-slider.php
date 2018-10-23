<?php
/**
* Displays a grid of all the Watson team
* @param string $extra_classes
*/
$args = array(
  'posts_per_page'   => -1,
  'order' => 'ASC',
  'post_status' => 'publish',
  'post_type' => 'workgroup',
);
$post_wp_query = new WP_Query($args); ?>


  <div class="workgroup-slider posts-container mb-5 <?php echo $extra_classes; ?>">
    <div class="workgroup-owl-carousel owl-carousel">
      <?php
      if ( $post_wp_query->have_posts() ) :
        while ( $post_wp_query->have_posts() ) : $post_wp_query->the_post();
          $post_ID = get_the_ID();
          $title = get_the_title($post_ID);
          $secondary = get_post_meta($post_ID, 'secondary', true);;
          $tertiary = get_post_meta($post_ID, 'tertiary', true);
          $slug = sanitize_title_with_dashes($title);
          $excerpt = get_the_excerpt();
          $icon_id = get_post_meta($post_ID, 'icon', true);
          $icon = '';
          if(!empty($icon_id)){$icon = wp_get_attachment_image_src(get_post_thumbnail_id($icon_id), 'full')[0];}
          $content = get_the_content();
          include(locate_template('template-parts/cardWorkgroup.php'));
        endwhile; wp_reset_postdata();
      endif; ?>
    </div>
  </div>
