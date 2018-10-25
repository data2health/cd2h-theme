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
  <div class="hero-slide fsr-holder d-block d-md-flex align-items-center mb-5 mb-md-0">
    <?php if(!empty($image)) { ?>
      <img src="<?php echo $image[0]; ?>" alt="<?php echo $title; ?>" class="image-full sr-only" />
    <?php } ?>
    <div class="slider-content mt-md-0">
      <div class="text-center text-md-left">
        <h2 class="headline h1 mb-0 "><?php echo $title; ?></h2>
      </div>
      <?php if(!empty($content)): ?>
      <span class="slide-body d-block mb-3"><?php echo $content; ?></span>
      <?php endif; ?>
      <?php if(!empty($btn_text)) { ?>
        <a class="btn btn-primary d-block d-md-inline-block mb-2 mr-md-2" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
      <?php } ?>
      <?php if(!empty($btn_text_2)) { ?>
        <a class="btn btn-primary d-block d-md-inline-block mb-2" href="<?php echo $btn_url_2; ?>"><?php echo $btn_text_2; ?></a>
      <?php } ?>
    </div>
  </div>
</div>
