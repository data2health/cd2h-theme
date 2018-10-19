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
 *
 */
?>

<div class="cd2h-callout-wrapper fsr-holder <?php echo $color; ?>">
  <?php if(!empty($background)) { ?>
    <img src="<?php echo $background[0]; ?>" alt="<?php echo $title; ?>" class="image-full sr-only" />
  <?php } ?>
  <div class="callout-inner d-flex align-items-center">
    <div class="media mx-auto">
      <?php if(!empty($image)) { ?>
        <div class="media-img fsr-holder mr-5">
          <img class="image-full sr-only" src="<?php echo $image[0]; ?>" alt="<?php echo $title; ?>">
        </div>
      <?php } ?>
      <div class="media-body">
        <h5 class="headline h1 white mb-0"><?php echo $title; ?></h5>
        <div class="body-inner mb-4">
          <?php echo $content; ?>
        </div>
        <?php if(!empty($btn_text)) { ?>
          <a class="btn btn-<?php echo $color; ?> btn-white" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
