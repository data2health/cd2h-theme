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
        "number" => '9',
        "category" => '',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/posts-slider.php'));
    $output = ob_get_clean();
    return $output;
  }
}

//Display just the latest number of posts, filterable by category
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
      "heading" => __("Formatting"),
      "description" => "Styling",
      "param_name" => "format",
      "value" => array(
        'Default' => '',
        'Condensed' => 'condensed',
      ),
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


//Displays posts with event dates that havent happened yet.
vc_map(array(
  "name" => "Upcoming Events",
  "description" => "Displays posts with upcoming event dates",
  "base" => "cd2h_upcoming_posts",
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
      "heading" => __("Formatting"),
      "description" => "Styling",
      "param_name" => "format",
      "value" => array(
        'Default' => '',
        'Condensed' => 'condensed',
      ),
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
class WPBakeryShortCode_cd2h_upcoming_posts extends WPBakeryShortCode {
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
    include(locate_template('inc/shortcodes/upcoming_events.php'));
    $output = ob_get_clean();
    return $output;
  }
}
