<?php

//Slider for displaying posts
vc_map(array(
  "name" => "Lab Projects List",
  "description" => "Displays a list of lab project organized by category",
  "base" => "cd2h_lab_project_block",
  "category" => "Content",
  "show_settings_on_create" => false,
  "content_element" => true,
  "params" => array(
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
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/lab_project_list.php'));
    $output = ob_get_clean();
    return $output;
  }
}
