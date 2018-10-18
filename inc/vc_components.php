<?php
/**
* Load the Visual Composer Components
*/
add_action('vc_before_init', function() {
  require 'components/button.php';
  require 'components/image.php';
  require 'components/hero.php';
  require 'components/headline.php';
  require 'components/padding.php';
});
?>
