<?php
/**
* Displays a table of CD2H liasons
* @param string $extra_classes
*/


$entity_args = array(
  'taxonomy' => 'entity',
  'hide_empty' => false,
);
$entity_terms = get_terms( $entity_args );


$args = array(
  'posts_per_page'   => -1,
  'order' => 'ASC',
  'post_status' => 'publish',
  'post_type' => 'liaison',
);
$post_wp_query = new WP_Query($args); ?>

<div class="d-none d-md-block">
  <table class="table table-borderless cd2h-table cd2h-liason-table text-left <?php echo $extra_classes; ?>">
    <thead>
      <tr>
        <th scope="col" class="pl-4 border-right">Entity</th>
        <th scope="col" class="pl-4 border-right">Name</th>
        <th scope="col" class="pl-4">cd2h representative</th>
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
            <td class="border-right pl-4"><?php foreach ( $terms as $term ) : echo $term->name; endforeach; ?></td>
            <td class="border-right pl-4"><?php echo $title; ?></td>
            <td class="pl-4"><?php echo $representative; ?></td>
          </tr>
          <?php
        endwhile; wp_reset_postdata();
      endif; ?>
    </tbody>
  </table>
</div>

<div class="d-block d-md-none">
  <div class="cd2h-liason-list text-left">
    <?php foreach ( $entity_terms as $entity_term ) {
      $liasons = get_posts(array(
        'post_type' => 'liaison',
        'numberposts' => -1,
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'entity',
            'field' => 'name',
            'terms' => $entity_term->name
          )
        )
      )); ?>
      <h4 class="h3 pb-3 mb-3"><?php echo $entity_term->name; ?></h4>
      <ul class="list-unstyled mb-5" role="tablist">
      <?php foreach($liasons as $liason){
        $post_ID = $liason->ID;
        $title = get_the_title($post_ID);
        $representative = get_post_meta($post_ID, 'representative', true);
        echo '<li class="mt-2 mb-4">';
        echo '<h5 class="h4 mb-1">' . $title . '</h5>';
        echo '<h6 class="h5 mb-0">' . $representative . '</h6>';
        echo '</li>';
      } ?>
      </ul>

    <?php } ?>
  </div>
</div>
