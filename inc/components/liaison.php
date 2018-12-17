<?php

//Displays a table for the Liaison post type.
vc_map(array(
  "name" => "Liaison Table",
  "description" => "Table that displays CD2H Liaisons",
  "base" => "cd2h_liaison_table",
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
class WPBakeryShortCode_cd2h_liaison_table extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/liaison_table.php'));
    $output = ob_get_clean();
    return $output;
  }
}
