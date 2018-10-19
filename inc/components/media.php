<?php

// Hero Collection Slide
vc_map(array(
  "name" => "Media Object",
  "description" => "Layout for a individual",
  "base" => "cd2h_media",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "attach_image",
      "heading" => __("Image"),
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
      "heading" => __("Accent Color"),
      "param_name" => "color",
      "value" => array(
        'Primary (default)' => '',
        'Secondary' => 'secondary',
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
class WPBakeryShortCode_cd2h_media extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "image" => '',
        "title" => '',
        "btn_text" => '',
        "btn_url" => '',
        "color" => 'primary',
        "extra_classes" => '',
      ), $atts
    ));
    if ($image) { $image = wp_get_attachment_image_src($atts['image'], 'full'); }
    ob_start();
    include(locate_template('inc/shortcodes/media.php'));
    $output = ob_get_clean();
    return $output;
  }
}

// Person Media component
vc_map(array(
  "name" => "Person",
  "description" => "Layout for a individual",
  "base" => "cd2h_media_person",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "attach_image",
      "heading" => __("Image"),
      "param_name" => "image",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Name"),
      "param_name" => "name",
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
      "heading" => __("Layout"),
      "description" => "Styling",
      "param_name" => "format",
      "value" => array(
        'Portrait' => 'portrait',
        'Landscape' => 'landscape',
      ),
    ),
    array(
      "admin_label" => true,
      "type" => "dropdown",
      "heading" => __("Accent Color"),
      "param_name" => "color",
      "value" => array(
        'Primary (default)' => '',
        'Secondary' => 'secondary',
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
class WPBakeryShortCode_cd2h_media_person extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "image" => '',
        "name" => '',
        "title" => '',
        "btn_text" => '',
        "btn_url" => '#',
        "format" => 'portrait',
        "color" => 'primary',
        "extra_classes" => '',
      ), $atts
    ));
    if ($image) { $image = wp_get_attachment_image_src($atts['image'], 'full'); }
    ob_start();
    include(locate_template('inc/shortcodes/media_person.php'));
    $output = ob_get_clean();
    return $output;
  }
}
