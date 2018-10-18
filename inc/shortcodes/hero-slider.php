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
  <div class="carousel-controls d-block d-md-none">
    <span class="prev"><i class="arrow-ico"></i> Prev</span><span class="divider">/</span>
    <span class="next">Next <i class="arrow-ico"></i></span>
  </div>
  <span class="scroll d-none d-md-block"></span>
</div>
