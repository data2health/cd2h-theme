<?php
/**
 * Display a button
 *
 * @param string $btn_txt
 * @param string $btn_url
 * @param string $color
 * @param string $extra_classes
 *
 */
?>

<?php if ($btn_text) {?>
  <?php if ($extra_classes) {?><span class="<?php echo $extra_classes; ?>"><?php } ?>
  <a class="btn btn-<?php echo $color; ?> py-2" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
  <?php if ($extra_classes) {?></span><?php } ?>
<?php } ?>