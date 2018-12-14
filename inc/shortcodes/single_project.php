<?php
/**
* Displays a grid of all the Watson team
* @param string $source_obj
* @param string $extra_classes
*/

$project_ID = $source_obj;
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
include(locate_template('template-parts/cardProject.php'));
