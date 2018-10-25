<?php
/**
 * Headline for various parts of the site
 *
 * @param string $title
 * @param string $color
 * @param string $format
 * @param string $extra_classes
 *
 */

 $title = str_replace(' | ', '<br />', $title);
?>

<?php if ($extra_classes) {?><div class="<?php echo $extra_classes; ?>"><?php } ?>
<h2 class="<?php echo $format; ?> <?php echo $color; ?> mb-0"><?php echo $title; ?></h2>
<?php if ($extra_classes) {?></div><?php } ?>
