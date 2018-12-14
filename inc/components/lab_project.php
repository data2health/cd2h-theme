<?php

//Slider for displaying posts
vc_map(array(
  "name" => "Lab Projects List",
  "description" => "Displays a list of lab project organized by category",
  "base" => "cd2h_lab_project_block",
  "category" => "Projects",
  "show_settings_on_create" => false,
  "content_element" => true,
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "dropdown",
      "heading" => __("Popup Form"),
      "param_name" => "form_id",
      "value" => get_form_options(),
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Extra classes"),
      "param_name" => "extra_classes",
      "value" => '',
    ),
  )
));
class WPBakeryShortCode_cd2h_lab_project_block extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "form_id" => '',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/lab_project_list.php'));
    $output = ob_get_clean();
    return $output;
  }
}

//Slider for displaying DREAM challenge ideas
vc_map(array(
  "name" => "Project",
  "description" => "Displays a singloe project card.",
  "base" => "cd2h_single_project",
  "category" => "Projects",
  "show_settings_on_create" => true,
  "content_element" => true,
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "dropdown",
      "heading" => __("Project"),
      "param_name" => "source_obj",
      "value" => get_project_options(),
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Extra classes"),
      "param_name" => "extra_classes",
      "value" => '',
    ),
  )
));
class WPBakeryShortCode_cd2h_single_project extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "source_obj" => '',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/single_project.php'));
    $output = ob_get_clean();
    return $output;
  }
}
