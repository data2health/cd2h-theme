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

<a class="media media-widget widget-post mb-4 pb-4" href="<?php echo $url ?>">
  <div class="media-body">
    <h6 class="mt-0 h6"><?php echo $date ?></h6>
    <h5 class="mt-0 h5"><?php echo $title ?></h5>
  </div>
</a>
