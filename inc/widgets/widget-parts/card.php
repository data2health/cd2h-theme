<?php
/**
 * Display a card of a post
 *
 * @param array $image
 * @param string $date
 * @param string $title
 * @param string $url
 */
?>

<a class="d-block card card-widget widget-post mb-4" href="<?php echo $url ?>">
  <div class="card-body px-0 pb-0">
    <h6 class="h6 mt-0"><?php echo $date ?></h6>
    <h5 class="h5 card-title"><?php echo $title ?></h5>
  </div>

  <div class="fsr-holder card-img-top mb-4">
    <img class="sr-only image-full" src="<?php echo $image[0] ?>" alt="<?php echo $title ?>">
  </div>
</a>
