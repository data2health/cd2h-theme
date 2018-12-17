<?php
/**
* Tabs Container element
* @param array $form_id
* @param array $extra_classes
*
*/
$args = array(
  'taxonomy' => 'section',
  'hide_empty' => false,
);
$terms = get_terms( $args );
$count = 0;

$meta_query = array(
 'is_public' => array(
   'key' => 'lab_project',
   'value' => 'true',
 )
);
$projects_full = get_posts(array(
  'post_type' => 'project',
  'numberposts' => -1,
  'post_status' => 'publish',
  'meta_query' => $meta_query,
)); ?>

<div class="lab-projects mb-5 mb-md-0">
  <div class="row no-gutters justify-content-center">
    <div class="col-md-3 lab-project-list" >
      <?php foreach ( $terms as $term ) {
        $section_slug = sanitize_title_with_dashes($term->term_id);
        $projects = get_posts(array(
          'post_type' => 'project',
          'numberposts' => -1,
          'post_status' => 'publish',
          'meta_query' => $meta_query,
          'tax_query' => array(
            array(
              'taxonomy' => 'section',
              'field' => 'name',
              'terms' => $term->name
            )
          )
        ));
        $is_empty = empty($projects);
        if($is_empty): ?>
        <h4 class="h3 mb-2 d-none d-md-block nav nav-tabs"><a class="nav-link py-0 px-0 empty-link" href="#empty-tab" data-toggle="tab" role="tab" aria-controls="empty-tab"><?php echo $term->name; ?></a></h4>
        <?php else: ?>
        <h4 class="h3 mb-2 d-none d-md-block"><?php echo $term->name; ?></h4>
        <?php endif; ?>
        <span class="d-block d-md-none text-center project-cat-xs pb-1 mb-2">
          <a class="d-block" href="#project-type-<?php echo $section_slug; ?>" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="project-type-<?php echo $section_slug; ?>">
            <?php echo $term->name; ?>
        </a></span>
        <ul class="list-unstyled mb-3 ml-0 ml-md-4 mb-0 d-md-flex collapse nav nav-tabs" id="project-type-<?php echo $section_slug; ?>" role="tablist">
        <?php foreach($projects as $project){
          $post_ID = $project->ID;
          $title = get_the_title($post_ID);
          $slug = 'project-' . $post_ID;
          $lead = get_post_meta($post_ID, 'project-lead', true);
          $secondary = get_post_meta($post_ID, 'secondary', true);
          $acknowledgements = get_post_meta($post_ID, 'acknowledgements', true);
          $submit_feedback = get_post_meta($post_ID, 'submit-feedback', true);
          $test_prototype = get_post_meta($post_ID, 'test-prototype', true);
          $content = get_post_field('post_content', $project->ID);
          $cd2h_project = get_post_meta($post_ID, 'cd2h_project', true);
          echo '<li class="h6 my-2 d-none d-md-block w-100"><a class="nav-link py-0" href="#'. $slug .'" data-toggle="tab" role="tab" aria-controls="'. $slug .'">' . $title . '</a></li>';
          echo '<div class="d-block d-md-none">';
          include(locate_template('template-parts/content-lab-project.php'));
          echo '</div>';
        }
        if($is_empty) {
          echo '<div class="d-block d-md-none">';
          include(locate_template('template-parts/empty-lab-project.php'));
          echo '</div>';
        }
        ?>
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
        $secondary = get_post_meta($post_ID, 'secondary', true);
        $acknowledgements = get_post_meta($post_ID, 'acknowledgements', true);
        $submit_feedback = get_post_meta($post_ID, 'submit-feedback', true);
        $test_prototype = get_post_meta($post_ID, 'test-prototype', true);
        $content_raw = get_post_field('post_content', $project->ID);
        $content = apply_filters('the_content', $content_raw);
        $cd2h_project = get_post_meta($post_ID, 'cd2h_project', true);
        echo '<div class="tab-pane px-3 px-md-5 fade ' . $active_state . ' " id="'. $slug .'" role="tabpanel" aria-labelledby="'. $slug .'-tab">';
        include(locate_template('template-parts/content-lab-project.php'));
        echo '</div>';
      }
      echo '<div class="empty-tab tab-pane px-3 px-md-5 fade" id="empty-tab" role="tabpanel">';
      include(locate_template('template-parts/empty-lab-project.php'));
      echo '</div>';
      ?>
      </div>
    </div>
  </div>
</div>

<?php if ($form_id) {?>
<div class="modal fade formModal" id="formModal-<?php echo $form_id; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $form_id; ?>-FormTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header pb-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-md-5">
        <h5 class="modal-title text-center mb-4" id="<?php echo $form_id; ?>-FormTitle"><?php echo get_the_title($form_id); ?></h5>
        <?php echo do_shortcode('[contact-form-7 id="' . $form_id . '"]')?>
      </div>
    </div>
  </div>
</div>
<?php } ?>
