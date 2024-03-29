<?php
/**
* Load the Visual Composer Components
*/
add_action('vc_before_init', function() {
  require 'components/call-out.php';
  require 'components/button.php';
  require 'components/image.php';
  require 'components/hero.php';
  require 'components/headline.php';
  require 'components/media.php';
  require 'components/padding.php';
  require 'components/posts.php';
  require 'components/workgroup.php';
  require 'components/lab_project.php';
  require 'components/dream.php';
  require 'components/liaison.php';
  require 'components/table.php';
  require 'components/tools_resources.php';
  require 'components/twitter.php';
});
?>
