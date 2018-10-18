<?php
// Image Grid 1
vc_map(
  array(
    "name" => "Image Grid",
    "description" => "Image Grid with 4 images",
    "base" => "cd2h_image_grid",
    "category" => "Content",
    "params" => array(
      array(
        "admin_label" => true,
        "type" => "attach_image",
        "heading" => __("Image 1"),
        "param_name" => "image1",
        "value" => '',
      ),
      array(
        "admin_label" => true,
        "type" => "attach_image",
        "heading" => __("Image 2"),
        "param_name" => "image2",
        "value" => '',
      ),
      array(
        "admin_label" => true,
        "type" => "attach_image",
        "heading" => __("Image 3"),
        "param_name" => "image3",
        "value" => '',
      ),
      array(
        "admin_label" => true,
        "type" => "attach_image",
        "heading" => __("Image 4"),
        "param_name" => "image4",
        "value" => '',
      ),
      array(
        "admin_label" => true,
        "type" => "textfield",
        "heading" => __("Caption"),
        "param_name" => "caption",
        "value" => '',
      ),
    )
  )
);
class WPBakeryShortCode_cd2h_image_grid extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        'image1' => '', // Post IDs or URL to a full-sized image
        'image2' => '', // Post IDs or URL to a full-sized image
        'image3' => '', // Post IDs or URL to a full-sized image
        'image4' => '', // Post IDs or URL to a full-sized image
        'caption' => '',
      ), $atts
    ));
    $output = false;
    if ($image1) { $image1 = wp_get_attachment_image_src($image1, 'large');}
    if ($image2) { $image2 = wp_get_attachment_image_src($image2, 'large');}
    if ($image3) { $image3 = wp_get_attachment_image_src($image3, 'large');}
    if ($image4) { $image4 = wp_get_attachment_image_src($image4, 'large');}
    ob_start();
    include(locate_template('inc/shortcodes/image_grid.php'));
    $output = ob_get_clean();
    return $output;
  }
}
