<?php
/**
 * Display aslide for a hero section
 *
 * @param array $image
 * @param array $background
 * @param string $color
 * @param string $title
 * @param string $content
 * @param string $btn_text
 * @param string $btn_url
 * @param string $extra_classes
 *
 */
?>

<div class="cd2h-callout-wrapper fsr-holder <?php echo $format; ?> mb-3 mb-md-0 <?php echo $color; ?>">
  <?php if(!empty($background)) { ?>
    <img src="<?php echo $background[0]; ?>" alt="<?php echo $title; ?>" class="image-full sr-only" />
  <?php } ?>
  <div class="callout-inner d-flex align-items-center <?php echo $extra_classes; ?>">
    <div class="media mx-auto d-block d-md-flex px-3 px-md-0">
      <?php if(!empty($image)) { ?>
        <div class="media-img fsr-holder mx-auto ml-md-0 mr-md-5 my-3">
          <img class="image-full sr-only" src="<?php echo $image[0]; ?>" alt="<?php echo $title; ?>">
        </div>
      <?php } ?>
      <div class="media-body">
        <h5 class="headline h1 white mb-0"><?php echo $title; ?></h5>
        <div class="body-inner mb-4">
          <?php echo $content; ?>
        </div>
        <?php if(!empty($btn_text)) { ?>
          <a class="btn btn-<?php echo $color; ?> btn-white d-block d-md-inline-block" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
