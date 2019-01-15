<?php
/**
* Shared button html for button shortcode and hero shortcodes, among others.
*
* @param array $tools
*/

if (isset($extra_classes)) { $extra_classes = $extra_classes; } else {$extra_classes = '';}
if (isset($color)) { $color = $color; } else {$color = 'primary';}
?>

<?php if ($btn_text) {?>
  <?php if ($form_id) {?>
    <?php if ($extra_classes) {?><span class="<?php echo $extra_classes; ?>"><?php } ?>
    <button class="btn btn-<?php echo $color; ?> d-block d-lg-inline-block mb-2 mb-lg-0" data-toggle="modal" data-target="#formModal-<?php echo $form_id; ?>"><?php echo $btn_text; ?></button>
    <?php if ($extra_classes) {?></span><?php } ?>
    <div class="modal fade formModal" id="formModal-<?php echo $form_id; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $form_id; ?>-FormTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header pb-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body px-md-5">
            <h5 class="modal-title text-center mb-4" id="<?php echo $form_id; ?>-FormTitle"><?php echo get_the_title($form_id); ?></h5>
            <?php echo do_shortcode('[contact-form-7 id="' . $form_id . '"]')?>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <?php if ($extra_classes) {?><span class="<?php echo $extra_classes; ?>"><?php } ?>
    <a class="btn btn-<?php echo $color; ?> d-block d-lg-inline-block mb-2 mb-lg-0" href="<?php echo $btn_url; ?>"><?php echo $btn_text; ?></a>
    <?php if ($extra_classes) {?></span><?php } ?>
  <?php } ?>
<?php } ?>
