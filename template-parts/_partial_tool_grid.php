<?php
/**
* Partial include for displaying the tools masonry grid.
* Imported by inc/shortcodes/tools_tab.php
*
* @param array $tools
*/
?>
<div class="tool-grid grid masonry-grid">
  <div class="grid-sizer col-md-4 col-6"></div>
<?php foreach($tools as $tool){
  $title = get_the_title($tool->ID);
  $background_image = get_the_post_thumbnail_url($tool->ID, 'medium');
  $icon_id = get_post_meta($tool->ID, 'tool-icon', true);
  $icon = '';
  if(!empty($icon_id)){
    $icon = wp_get_attachment_image_src($icon_id, 'full')[0];
  }
  $size = get_post_meta($tool->ID, 'size', true);
  if($size == ''){
    $size = "squared";
  }
  $url = get_post_meta($tool->ID, 'url', true);

  $col = "col-md-4 col-6";
  if($size == 'rectangle'){
    $col = "col-md-8 col-6";
  }
  ?>
  <div class="grid-item tool-item <?php echo $size; ?> <?php echo $col; ?>">
    <?php if(!empty($url)): ?>
    <a href="<?php echo $url; ?>">
    <?php endif; ?>
    <div class="item-wrapper d-flex flex-column <?php if(!empty($background_image)) { echo 'gradient'; } ?>" <?php if(!empty($background_image)) { ?>style="background-image:url(<?php echo $background_image; ?>)" <?php } ?> >
      <?php if(!empty($icon)){ ?>
      <div class="tool-icon" style="background-image:url(<?php echo $icon; ?>);"></div>
      <?php } ?>
      <h5 class="tool-title mt-auto mb-0"><?php echo $title; ?></h5>
    </div>
    <?php if(!empty($url)): ?>
    </a>
    <?php endif; ?>
  </div>
<?php } ?>
</div>
