<?php
/**
 * Display a block for twitter timeline embed code
 *
 * @param string $embed_code
 * @param string $extra_classes
 *
 */
 $code = rawurldecode(base64_decode($embed_code));
?>

<div class="twitter-embed-wrapper <?php echo $extra_classes; ?>">
  <div class="twitter-embed-inner">
      <?php echo $code; ?>
  </div>
</div>
