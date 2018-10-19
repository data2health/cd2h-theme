<?php
/**
 * Display a block to adjust spacing between objects
 *
 * @param array $image
 * @param string $name
 * @param string $title
 * @param string $content
 * @param string $btn_text
 * @param string $btn_url
 * @param string $color
 * @param string $format
 * @param string $extra_class
 */
?>


<div class="media mediaPerson <?php echo $color; ?> <?php echo $format; ?>">
  <?php if(!empty($image)) { ?>
  <div class="media-picture my-3 mx-auto">
    <img class="mr-3" src="<?php echo $image[0] ?>" alt="<?php echo $name; ?>">
  </div>
  <?php } ?>
  <div class="media-body px-md-4">
    <h5 class="h3 mb-1"><?php echo $name; ?></h5>
    <h6 class="h6 mb-3"><?php echo $title; ?></h6>
    <div class="body-inner mb-4">
      <?php echo $content; ?>
    </div>
    <?php if(!empty($btn_text)) { ?>
      <a class="btn btn-<?php echo $color; ?>" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
    <?php } ?>
  </div>
</div>
