<?php

//Display the currently active DREAM challenges
vc_map(array(
  "name" => "Current Dream Challenges",
  "description" => "Displays a list of active DREAM Challenges",
  "base" => "cd2h_dream_current_block",
  "category" => "Dream Challenges",
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
class WPBakeryShortCode_cd2h_dream_current_block extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/dream_list_current.php'));
    $output = ob_get_clean();
    return $output;
  }
}

//Slider for displaying DREAM challenge ideas
vc_map(array(
  "name" => "Dream Challenge Ideas",
  "description" => "Displays a list of submitted DREAM Challenge ideas",
  "base" => "cd2h_dream_ideas_block",
  "category" => "Dream Challenges",
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
class WPBakeryShortCode_cd2h_dream_ideas_block extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/dream_list_ideas.php'));
    $output = ob_get_clean();
    return $output;
  }
}
