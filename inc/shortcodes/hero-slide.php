<?php
/**
 * Display aslide for a hero section
 *
 * @param array $image
 * @param string $title
 * @param string $content
 * @param string $btn_text
 * @param string $btn_url
 *
 */
?>
<div class="item">
  <div class="hero-slide fsr-holder d-flex align-items-center">
    <?php if(!empty($image)) { ?>
      <img src="<?php echo $image[0]; ?>" alt="<?php echo $title; ?>" class="image-full sr-only" />
    <?php } ?>
    <div class="slider-content col-md-6">
      <h2 class="headline h1 mb-0"><?php echo $title; ?></h2>
      <?php if(!empty($content)): ?>
      <span class="slide-body d-block mb-3"><?php echo $content; ?></span>
      <?php endif; ?>
      <?php if(!empty($btn_text)) { ?>
        <a class="btn btn-primary" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
      <?php } ?>
    </div>
  </div>
</div>
