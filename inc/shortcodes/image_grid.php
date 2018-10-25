
<?php
/**
 * Display a grid of images
 *
 * @param string $caption
 * @param array $image1
 * @param array $image2
 * @param array $image3
 * @param array $image4
 * @param string $extra_classes
 */
?>

<div class="cd2h-image-grid image-grid-1 px-md-5 py-md-5 mb-5 mb-md-0">
  <div class="row no-gutters align-items-end mb-3">
    <div class="col-4">
      <div class="fsr-holder image-1">
        <img src="<?php echo $image1[0] ?>" alt="<?php echo $caption; ?> (Image 1 of 4)" class="sr-only image-full" />
      </div><!-- /.image -->
    </div>
    <div class="col-8">
      <div class="fsr-holder image-2 ml-3">
        <img src="<?php echo $image2[0] ?>" alt="<?php echo $caption; ?> (Image 2 of 4)" class="sr-only image-full" />
      </div><!-- /.image -->
    </div>
  </div>
  <div class="row no-gutters">
    <div class="col-7">
      <div class="fsr-holder image-3">
        <img src="<?php echo $image3[0] ?>" alt="<?php echo $caption; ?> (Image 3 of 4)" class="sr-only image-full" />
      </div><!-- /.image -->
    </div>
    <div class="col-5 col-md-4">
      <div class="fsr-holder image-4 ml-3">
        <img src="<?php echo $image4[0] ?>" alt="<?php echo $caption; ?> (Image 4 of 4)" class="sr-only image-full" />
      </div><!-- /.image -->
    </div>
  </div>
</div>
