<div class="card cardDefault cardDream cardDream-sm">
  <div class="card-top d-md-flex align-items-center">
    <div class="media d-block d-md-flex text-center text-md-left">
      <div class="mx-auto mr-md-3 align-self-center card-icon fsr-holder">
        <?php if(!empty($icon)) { ?>
          <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>" class="image-full sr-only" />
        <?php } ?>
      </div>
      <div class="media-body">
        <h3 class="h3 mt-0"><?php echo $title; ?></h3>
        <h4 class="h4 mt-0"><?php echo $secondary; ?></h4>
        <h6 class="h6 mt-0"><?php echo $tertiary; ?></h6>
      </div>
    </div>
  </div><!-- /.card-top -->
  <div class="card-body text-center px-0 py-0">
    <div class="card-excerpt px-5">
      <p class="card-text"><?php echo $excerpt; ?></p>
    </div>
  </div>
</div>
