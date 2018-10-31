<?php
// Basic Button
vc_map(array(
  "name" => "Button",
  "description" => "A link button",
  "base" => "cd2h_button",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Button Text"),
      "param_name" => "btn_text",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Button URL"),
      "param_name" => "btn_url",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "dropdown",
      "heading" => __("Button Color"),
      "param_name" => "color",
      "value" => array(
        'Primary' => '',
        'Secondary' => 'secondary',
      ),
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
class WPBakeryShortCode_cd2h_button extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "btn_text" => '',
        "btn_url" => '',
        "color" => 'primary',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/button.php'));
    $output = ob_get_clean();
    return $output;
  }
}

// Basic Button
vc_map(array(
  "name" => "Link",
  "description" => "A link",
  "base" => "cd2h_link",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Text"),
      "param_name" => "btn_text",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("URL"),
      "param_name" => "btn_url",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "dropdown",
      "heading" => __("Color"),
      "param_name" => "color",
      "value" => array(
        'Primary' => '',
        'Secondary' => 'secondary',
      ),
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
class WPBakeryShortCode_cd2h_link extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "btn_text" => '',
        "btn_url" => '',
        "color" => 'primary',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/link.php'));
    $output = ob_get_clean();
    return $output;
  }
}
