<?php
// Various headline styles
vc_map(array(
  "name" => "Headline",
  "description" => "Heading for a Content Section",
  "base" => "cd2h_headline",
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
      "type" => "dropdown",
      "heading" => __("Formatting"),
      "description" => "Styling",
      "param_name" => "format",
      "value" => array(
        'Headline 1' => 'headline h1',
        'Headline 2' => 'headline h2',
        'Title' => 'title h1',
        'Title 2' => 'title h2',
        'Title 3' => 'title h3',
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
class WPBakeryShortCode_cd2h_headline extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "title" => 'Default Heading',
        "color" => 'primary',
        "format" => 'headline h1',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/headline.php'));
    $output = ob_get_clean();
    return $output;
  }
}
