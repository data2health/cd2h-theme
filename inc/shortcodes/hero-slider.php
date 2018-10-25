<?php
/**
 * Hero slider container
 *
 * @param string $content
 * @param string $extra_classes
 */
?>

<div class="hero-slider hero-container mb-4 <?php echo $extra_classes; ?>">
  <div class="hero-owl-carousel owl-carousel">
    <?php echo wpb_js_remove_wpautop($content); ?>
  </div>
</div>
