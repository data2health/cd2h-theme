<?php
if(!empty($lead)){
  $person_name = get_the_title($lead);
  $person_email = get_post_meta($lead, 'email', true);
} else {
  $person_name = '';
  $person_email = '';
} ?>

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
        <?php if(!empty($lead)){ ?><h4 class="h4 mt-0"><?php echo $person_name; ?></h4><?php } ?>
        <?php if ($terms) { ?><h6 class="h6 mt-0"><?php foreach ($terms as $term) { echo $term->name; } ?></h6>
        <?php } else { if(!empty($person_email)){ echo '<h6 class="h6 mt-0">'. $person_email .'</h6>'; } } ?>
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
