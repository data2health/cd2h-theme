<?php
/**
 * Display a block to adjust spacing between objects
 *
 * @param string $padding
 * @param string $mt
 * @param array $mb
 * @param string $extra_class
 */
 $style = 'style="padding:'.$padding.' 0; margin-top:'.$mt.'; margin-bottom:'.$mb.';"';
?>
<div class="spacer <?php echo $extra_class; ?> d-none d-md-block" <?php echo $style; ?>></div>
