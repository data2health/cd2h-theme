<div class="card cardDefault cardProject cardPrimary mb-4 mx-md-4">
  <div class="card-top d-md-flex align-items-center">
    <div class="media d-block d-md-flex text-center text-md-left">
      <div class="mx-auto mr-md-3 align-self-center card-icon fsr-holder">
        <?php if(!empty($icon)) { ?>
          <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>" class="image-full sr-only" />
        <?php } ?>
      </div>
      <div class="media-body">
        <h3 class="h3 mb-0"><?php echo $title; ?></h3>
        <h4 class="h4 mt-0"><?php foreach ($terms as $term) { echo $term->name; } ?></h4>
        <h6 class="h6 mt-0"><?php echo $tertiary; ?></h6>
      </div>
    </div>
  </div><!-- /.card-top -->
  <div class="card-body text-center px-0 py-0">
    <div class="card-excerpt px-4">
      <p class="card-text"><?php echo $excerpt; ?></p>
    </div>
  </div>
  <?php if (!empty($url)) {?>
  <a class="card-footer d-block text-center primary" href="<?php echo $url; ?>">Read The Full Proposal</a>
  <?php } ?>
</div>
