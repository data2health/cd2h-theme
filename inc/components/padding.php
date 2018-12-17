<?php
// Basic shortcode for adding additional padding for desktop devices.
vc_map(array(
  "name" => "Spacing",
  "description" => "Block to adjust spacing",
  "base" => "cd2h_padding_block",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Padding (vertical)"),
      "param_name" => "padding",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Top Margin"),
      "param_name" => "mt",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Bottom Margin"),
      "param_name" => "mb",
      "value" => '',
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra CSS Classes"),
      "param_name" => "extra_class",
      "value" => '',
    ),
  )
));
class WPBakeryShortCode_cd2h_padding_block extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "padding" => '15px',
        "mt" => '0px',
        "mb" => '0px',
        "extra_class" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/padding.php'));
    $output = ob_get_clean();
    return $output;
  }
}
