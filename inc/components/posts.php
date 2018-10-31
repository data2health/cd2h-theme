<?php

//Slider for displaying posts
vc_map(array(
  "name" => "Latest Posts Slider",
  "description" => "Displays a slider with the most recent posts",
  "base" => "cd2h_posts_slider",
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

//Slider for displaying posts
vc_map(array(
  "name" => "Latest Posts",
  "description" => "Displays a set number of posts from a category",
  "base" => "cd2h_posts",
  "category" => "Content",
  "show_settings_on_create" => false,
  "content_element" => true,
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Post count"),
      "param_name" => "number",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "dropdown",
      "heading" => __("Filter By Category"),
      "param_name" => "category",
      "value" => get_post_category_options(),
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
class WPBakeryShortCode_cd2h_posts extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "number" => '2',
        "category" => '',
        "format" => '',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/posts.php'));
    $output = ob_get_clean();
    return $output;
  }
}
