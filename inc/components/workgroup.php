<?php

//Slider for displaying posts
vc_map(array(
  "name" => "Workgrouop Slider",
  "description" => "Displays a slider with the most recent posts",
  "base" => "cd2h_workgroup_slider",
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
class WPBakeryShortCode_cd2h_workgroup_slider extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/workgroup-slider.php'));
    $output = ob_get_clean();
    return $output;
  }
}

//Slider for displaying posts
vc_map(array(
  "name" => "Workgrouop List",
  "description" => "Displays a slider with the most recent posts",
  "base" => "cd2h_workgroup_list",
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
class WPBakeryShortCode_cd2h_workgroup_list extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/workgroup-list.php'));
    $output = ob_get_clean();
    return $output;
  }
}
