<?php

vc_map(array(
  "name" => "Twitter Embed",
  "description" => "Allows embed of twitter timeline code",
  "base" => "twitter_embed",
  "category" => "Content",
  "params" => array(
    array(
      "admin_label" => false,
      "type" => "textarea_raw_html",
      "heading" => __("Twitter Embed Code"),
      "param_name" => "embed_code",
      "value" => '',
    ),
    array(
      "admin_label" => true,
      "type" => "textfield",
      "heading" => __("Extra classes"),
      "param_name" => "extra_classes",
    ),
  )
));
class WPBakeryShortCode_twitter_embed extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    extract(shortcode_atts(
      array(
        "embed_code" => '',
        "extra_classes" => '',
      ), $atts
    ));
    ob_start();
    include(locate_template('inc/shortcodes/twitter_embed.php'));
    $output = ob_get_clean();
    return $output;
  }
}
