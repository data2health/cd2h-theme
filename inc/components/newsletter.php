<?php
// Callout Heading for the footer to display a link to the newsletter
vc_map(array(
  "name" => "Newsletter Callout",
  "description" => "Text with button to the newsletter",
  "base" => "cd2h_newsletter",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Title"),
      "param_name" => "title",
      "value" => '',
    ),
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
      "type" => "textfield",
      "heading" => __("Extra classes"),
      "param_name" => "extra_classes",
      "value" => '',
    ),
  )
));
class WPBakeryShortCode_cd2h_newsletter extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "title" => 'Stay Up to date with new research and programs through CD2H',
        "btn_text" => 'Subsribe to Our Newsletter',
        "btn_url" => '#',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/newsletter_bar.php'));
    $output = ob_get_clean();
    return $output;
  }
}
