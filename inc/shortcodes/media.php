<?php
/**
 * Display a block to adjust spacing between objects
 *
 * @param array $image
 * @param string $title
 * @param string $content
 * @param string $btn_text
 * @param string $btn_url
 * @param string $color
 * @param string $extra_class
 */
?>


<div class="media mediaObj <?php echo $color; ?> <?php echo $extra_classes; ?>">
  <?php if(!empty($image)) { ?>
  <div class="media-picture mx-auto">
    <img class="mr-3" src="<?php echo $image[0] ?>" alt="<?php echo $title; ?>">
  </div>
  <?php } ?>
  <div class="media-body">
    <h3 class="h3 mt-4 mb-3"><?php echo $title; ?></h3>
    <div class="body-inner mb-4 px-md-4">
      <?php echo $content; ?>
    </div>
    <?php if(!empty($btn_text)) { ?>
      <a class="btn btn-<?php echo $color; ?>" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
    <?php } ?>
  </div>
</div>
