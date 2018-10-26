<div class="card cardPost mb-md-5">
  <div class="card-img-top fsr-holder">
  <?php if(!empty($image)) { ?>
    <img src="<?php echo $image[0] ?>" alt="<?php echo $title; ?>" class="sr-only image-full" />
  <?php } ?>
  </div><!-- /.image -->
  <div class="card-body text-center px-4">
    <h6 class="h6 mb-4">Blog</h6>
    <h3 class="card-title"><?php echo $title; ?></h3>
    <p class="card-text"><?php echo $excerpt; ?></p>
  </div>
  <a class="card-footer d-block text-center" href="#">Continue Reading</a>
</div>
