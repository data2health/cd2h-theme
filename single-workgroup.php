<?php
/**
 * The template for displaying a single workgroup
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CD2H_Website
 */

 $post_id = get_the_id();

 $title = get_the_title($post_id);
 $the_excerpt = get_the_excerpt($post_id);
 $the_content = apply_filters('the_content', get_post_field('post_content', $post_id));
 $image = get_post_thumbnail_id($post_id);
 $people_array =  get_post_meta(get_the_ID(), 'people', true);

$secondary_image_id =  get_post_meta(get_the_ID(), 'secondary-image', true);
$secondary_image = wp_get_attachment_image_src($secondary_image_id, 'large');

 if(!empty($people_array)) {
 $people_args = array(
  'numberposts' => -1,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'post_type' => 'person',
  'post_status' => 'publish',
  'suppress_filters' => true,
  'post__in' => $people_array,
 );
 $people = get_posts($people_args);
}

$project_args = array(
 'numberposts' => -1,
 'orderby' => 'post_date',
 'order' => 'DESC',
 'post_type' => 'project',
 'post_status' => 'publish',
 'suppress_filters' => true,
 'meta_key' => 'workgroups',
 'meta_value' => $post_id,
 'meta_compare' => 'LIKE',

);
$projects = get_posts($project_args);

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php echo do_shortcode( '[cd2h_hero_slide image="'.$image .'" title="'. $title . '" btn_text="" btn_url=""]'. $the_excerpt .'[/cd2h_hero_slide]' ); ?>
    <div class="workgroup-overview green-bg py-5 my-4">
      <div class="workgroup-overview-inner mx-auto">
        <div class="text-center my-5">
          <?php echo do_shortcode( '[cd2h_headline title="'. $title .' Overview"]' ); ?>
        </div>

        <div class="row justify-content-md-center mb-4">
          <div class="col-md-4">
            <h6 class="h6 lead-contact-title color-secondary mb-2">Lead Contacts</h6>
            <ul class="list-unstyled pl-3">
              <?php if(!empty($people_array)) {
                foreach ($people as $person) {
                  $person_id = $person->ID;
                  $person_name = get_the_title($person_id);
                  $person_email = get_post_meta($person_id, 'email', true); ?>
                  <li class="lead-contact color-secondary py-2">
                    <?php if ($person_email) {?><a href="mailto:<?php echo $person_email; ?>"><?php echo $person_name; ?></a><?php } else { ?><?php echo $person_name; ?><?php } ?>
                  </li>
                <?php } } ?>
            </ul>


          </div>
          <div class="col-md-8">
            <?php echo $the_content; ?>
          </div>
        </div>
        <div class="secondary-image mb-5">
          <img src="<?php echo $secondary_image[0]; ?>" />
        </div>
      </div>
    </div>

    <div class="workgroup-projects blue-bg py-5 mb-4">
      <div class="workgroup-projects-inner">
        <div class="text-center my-5">
          <?php echo do_shortcode( '[cd2h_headline title="Our Current Projects"]' ); ?>
        </div>
        <div class="workgroup-projects-list mx-auto py-5">
          <?php if(!empty($projects)) { ?>
          <div class="row no-gutters grid masonry-grid">
            <div class="grid-sizer col-md-6"></div>
          <?php
          foreach ($projects as $project) {
            $project_ID = $project->ID;
            $title = get_the_title($project_ID);
            $secondary = get_post_meta($project_ID, 'secondary', true);
            $tertiary = get_post_meta($project_ID, 'tertiary', true);
            $lead = get_post_meta($project_ID, 'project-lead', true);
            $slug = sanitize_title_with_dashes($title);
            $excerpt = get_the_excerpt($project_ID);
            $icon_id = get_post_meta($project_ID, 'project-icon', true);
            $url = get_post_meta($project_ID, 'read-more', true);
            $icon = '';
            if(!empty($icon_id)){$icon = wp_get_attachment_image_src($icon_id, 'full')[0];}
            $terms = get_the_terms( $project_ID, 'section' );
            echo '<div class="col-md-6 grid-item mb-4">';
            include(locate_template('template-parts/cardProject.php'));
            echo '</div>';
          } ?>
          </div>
        <?php } else {
          echo '<div class="empty-projects">';
          include(locate_template('template-parts/empty-lab-project.php'));
          echo '</div>';
        } ?>
        </div>

      </div>
    </div>
  </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
