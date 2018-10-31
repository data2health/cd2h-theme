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
    <div class="row">
      <?php
      if ( $post_wp_query->have_posts() ) :
        while ( $post_wp_query->have_posts() ) : $post_wp_query->the_post();
          $post_ID = get_the_ID();
          $title = get_the_title($post_ID);
          $secondary = get_post_meta($post_ID, 'secondary', true);
          $tertiary = get_post_meta($post_ID, 'tertiary', true);
          $slug = sanitize_title_with_dashes($title);
          $excerpt = get_the_excerpt();
          $people_array =  get_post_meta($post_ID, 'people', true);
          $icon_id = get_post_meta($post_ID, 'workgroup-icon', true);
          //echo $icon_id;
          if(!empty($icon_id)){
            $icon = wp_get_attachment_image_src($icon_id, 'full')[0];
          } else {
            $icon = '';
          }
          $content = get_the_content();
          echo '<div class="col-md-6 px-md-5 mb-5">';
          include(locate_template('template-parts/cardWorkgroup.php'));
          echo '</div>';
        endwhile; wp_reset_postdata();
      endif; ?>

      <div class="col-md-5 cd2h-workgroup-join align-self-center">
        <p class="headline h3 mb-3">Not ready to join a workgroup?  Stay up to date with the CD2H via our newsletter.</p>
        <a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSctJpFYOCyURD_m2vRIu2DfGAUJIk7x2_XUqV9xi5OpvB5rrQ/viewform">Subscribe to our Newsletter</a>
      </div>

    </div>
  </div>
