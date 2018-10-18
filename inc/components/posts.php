<?php

//Slider for displaying posts
vc_map(array(
  "name" => "Latest news Slider",
  "description" => "Displays a slider with the most recent posts",
  "base" => "cd2h_posts_slider",
  "category" => "Team",
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
class WPBakeryShortCode_cd2h_posts_slider extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/posts-slider.php'));
    $output = ob_get_clean();
    return $output;
  }
}
