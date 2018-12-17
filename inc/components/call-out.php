<?php
// Callout section. Usually has a background image with a colorn overlay.
vc_map(array(
  "name" => "Call Out",
  "description" => "Call out that appears usually near the bottom of the page.",
  "base" => "cd2h_call_out",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "attach_image",
      "heading" => __("Background Image"),
      "param_name" => "background",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "attach_image",
      "heading" => __("Optional Image"),
      "param_name" => "image",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Title"),
      "param_name" => "title",
      "value" => '',
    ),
    array(
      "admin_label" => false,
      "type" => "textarea_html",
      "holder" => "div",
      "class" => "",
      "heading" => __("Content"),
      "param_name" => "content",
      "value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "cd2h" ),
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
      "type" => "dropdown",
      "heading" => __("Layout"),
      "param_name" => "format",
      "value" => array(
        'Default' => '',
        'Centered' => 'text-center',
      ),
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Extra Classes"),
      "param_name" => "extra_classes",
      "value" => '',
    ),
  )
));
class WPBakeryShortCode_cd2h_call_out extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "image" => '',
        "background" => '',
        "title" => '',
        "btn_text" => '',
        "btn_url" => '',
        "color" => 'primary',
        "extra_classes" => '',
        "format" => 'text-center text-md-left',
      ), $atts
    ));
    if ($image) { $image = wp_get_attachment_image_src($atts['image'], 'full'); }
    if ($background) { $background = wp_get_attachment_image_src($atts['background'], 'full'); }
    ob_start();
    include(locate_template('inc/shortcodes/call-out.php'));
    $output = ob_get_clean();
    return $output;
  }
}
