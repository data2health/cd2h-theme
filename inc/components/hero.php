<?php
// Default Container Element
vc_map( array(
  "name" => "Hero Slider",
  "description" => "Hero Slider",
  "base" => "cd2h_hero_slider",
  "category" => "Hero",
  "content_element" => true,
  "show_settings_on_create" => false,
  "is_container" => true,
  "js_view" => 'VcColumnView',
  "as_parent" => array('only' => 'cd2h_hero_slide'),
  "as_child" => array('except' => 'cd2h_hero_slider'),
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Extra Classes"),
      "param_name" => "extra_classes",
      "value" => '',
    ),
  ),
) );
class WPBakeryShortCode_cd2h_hero_slider extends WPBakeryShortCodesContainer {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/hero-slider.php'));
    $output = ob_get_clean();
    return $output;
  }
}

// Hero Collection Slide
vc_map(array(
  "name" => "Hero Carousel Slide",
  "description" => "Slide for hero carousel",
  "base" => "cd2h_hero_slide",
  "category" => "Hero",
  //"as_child" => array('only' => 'cd2h_hero_slider'),
  "params" => array(
    array(
      "admin_label" => true,
      "type" => "attach_image",
      "heading" => __("Background Image"),
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
  )
));
class WPBakeryShortCode_cd2h_hero_slide extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "image" => '',
        "title" => '',
        "btn_text" => '',
        "btn_url" => '',
      ), $atts
    ));
    if ($image) { $image = wp_get_attachment_image_src($atts['image'], 'full'); }
    ob_start();
    include(locate_template('inc/shortcodes/hero-slide.php'));
    $output = ob_get_clean();
    return $output;
  }
}
