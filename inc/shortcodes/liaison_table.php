<?php
/**
* Displays a table of CD2H liasons
* @param string $extra_classes
*/
$args = array(
  'posts_per_page'   => -1,
  'order' => 'ASC',
  'post_status' => 'publish',
  'post_type' => 'liaison',
);
$post_wp_query = new WP_Query($args); ?>

<div class="d-none d-md-block">
  <table class="table cd2h-table">
    <thead>
      <tr>
        <th scope="col">Entity</th>
        <th scope="col">Name</th>
        <th scope="col">cd2h representative</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ( $post_wp_query->have_posts() ) :
        while ( $post_wp_query->have_posts() ) : $post_wp_query->the_post();
          $post_ID = get_the_ID();
          $terms = wp_get_post_terms( $post_ID, array( 'entity' ) );
          $title = get_the_title($post_ID);
          $representative = get_post_meta($post_ID, 'representative', true); ?>
          <tr>
            <td><?php foreach ( $terms as $term ) : echo $term->name; endforeach; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $representative; ?></td>
          </tr>
          <?php
        endwhile; wp_reset_postdata();
      endif; ?>
    </tbody>
  </table>
</div>

<div class="d-block d-md-none">

</div>
