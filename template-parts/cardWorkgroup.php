<div class="card cardWorkgroup mb-5">
  <div class="card-top">
    <div class="media">
      <div class="mr-3 align-self-center workgroup-icon fsr-holder">
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
    <div class="card-members px-5">
      <h6 class="h6 mb-4">Members Involved</h6>
    </div>
  </div>
  <a class="card-footer d-block text-center secondary" href="#">Register Interest</a>
</div>
