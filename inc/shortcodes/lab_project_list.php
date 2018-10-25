<?php
/**
* Tabs Container element
* @param array $extra_classes
*
*/
//$section_slug = sanitize_title_with_dashes($faq_title);
$args = array(
  'taxonomy' => 'section',
  'hide_empty' => false,
);
$terms = get_terms( $args );
$count = 0;

$projects_full = get_posts(array(
  'post_type' => 'lab_project',
  'numberposts' => -1,
  'post_status' => 'publish',
)); ?>

<div class="lab-projects mb-5 mb-md-0">
  <div class="row no-gutters justify-content-center">
    <div class="col-md-3 lab-project-list">
      <?php
      $count = 0; foreach ( $terms as $term ) {
        $section_slug = sanitize_title_with_dashes($term->id);
        $projects = get_posts(array(
          'post_type' => 'lab_project',
          'numberposts' => -1,
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'section',
              'field' => 'name',
              'terms' => $term->name
            )
          )
        )); ?>
        <h4 class="h3 mb-2"><?php echo $term->name; ?></h4>
        <ul class="list-unstyled mb-3 ml-0 ml-md-4 nav nav-tabs mb-0 d-block d-md-flex" role="tablist">
        <?php foreach($projects as $project){
          $post_ID = $project->ID;
          $title = get_the_title($post_ID);
          $slug = 'project-' . $post_ID;
          $lead = get_post_meta($post_ID, 'project-lead', true);
          $acknowledgements = get_post_meta($post_ID, 'acknowledgements', true);
          $submit_feedback = get_post_meta($post_ID, 'submit-feedback', true);
          $test_prototype = get_post_meta($post_ID, '$test-prototype', true);
          $content = get_post_field('post_content', $project->ID);
          echo '<li class="h6 my-2"><a class="d-none d-md-block" href="#'. $slug .'" data-toggle="tab" role="tab" aria-controls="'. $slug .'">' . $title . '</a></li>';
          echo '<div class="d-block d-md-none mb-4">';
          include(locate_template('template-parts/content-lab-project.php'));
          echo '</div>';
        } ?>
        </ul>
      <?php } ?>
    </div>
    <div class="col-md-8 d-none d-md-block">
      <div class="tab-content" id="myTabContent">
      <?php foreach($projects_full as $project){
        $count++;
        if($count == 1){
          $active_state = "active show";
          $is_active = true;
        } else {$active_state = "";}
        $post_ID = $project->ID;
        $title = get_the_title($post_ID);
        $slug = 'project-' . $post_ID;
        $lead = get_post_meta($post_ID, 'project-lead', true);
        $acknowledgements = get_post_meta($post_ID, 'acknowledgements', true);
        $submit_feedback = get_post_meta($post_ID, 'submit-feedback', true);
        $test_prototype = get_post_meta($post_ID, '$test-prototype', true);
        $content_raw = get_post_field('post_content', $project->ID);
        $content = apply_filters('the_content', $content_raw);
        echo '<div class="tab-pane px-3 px-md-5 fade ' . $active_state . ' " id="'. $slug .'" role="tabpanel" aria-labelledby="'. $slug .'-tab">';
        include(locate_template('template-parts/content-lab-project.php'));
        echo '</div>';
      } ?>
      </div>
    </div>

  </div>
</div>
