<div class="card cardDefault cardWorkgroup">
  <div class="card-top d-md-flex align-items-center">
    <div class="media d-block d-md-flex text-center text-md-left">
      <div class="mx-auto mr-md-3 align-self-center card-icon fsr-holder">
        <?php if(!empty($icon_id)) { ?>
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
    <?php if(!empty($people_array)) { ?>
    <div class="card-members px-5">
      <h6 class="h6 mb-2">Members Involved</h6>
      <div class="person-list">
        <?php foreach ($people_array as $person) {
            $person_name = get_the_title($person);
            echo '<span class="person">' . $person_name .'</span>';
          } ?>
      </div>
    </div>
    <?php } ?>
  </div>
  <a class="card-footer d-block text-center secondary" href="#">Register Interest</a>
</div>
