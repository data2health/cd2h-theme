<?php
  $categories = get_the_category($post_ID);
  $category = get_the_category($post_ID);
  $category_parent_id = $category[0]->category_parent;
  if ( $category_parent_id != 0 ) {
    $category_parent = get_term( $category_parent_id, 'category' );
    $cat_slug = $category_parent->slug;
  } else {
    $cat_slug = $category[0]->slug;
  }
  $categories_tmp = $categories;
	foreach ( $categories_tmp as $child_cat ) {
		foreach ( $categories_tmp as $key => $parent_cat ) {
			if ( isset( $categories[ $key ] ) ) {
				if ( cat_is_ancestor_of( $parent_cat, $child_cat ) ) {
					unset( $categories[ $key ] );
				}
			}
		}
	}
  if ($cat_slug == 'event' || $cat_slug == 'events') {
    $color = 'secondary';
  } else {
    $color = 'primary';
  }
?>
<div class="media cardPost d-block d-md-flex mb-5 <?php echo $color; ?>">
  <div class="card-img-top fsr-holder">
  <?php if(!empty($image)) { ?>
    <img src="<?php echo $image[0] ?>" alt="<?php echo $title; ?>" class="sr-only image-full" />
  <?php } ?>
  </div><!-- /.image -->
  <div class="h-100 w-100">
    <div class="card-body text-left px-4 h-100">
      <h6 class="h6 mb-2"><?php echo $featured_category; ?></h6>
      <h3 class="card-title"><?php echo $title; ?></h3>
      <p class="card-text"><?php echo $excerpt; ?></p>
    </div>
    <?php if ($cat_slug == 'event' || $cat_slug == 'events') { ?>
      <a class="card-footer d-block text-center" href="#">Register Now</a>
    <?php } else { ?>
      <a class="card-footer d-block text-center" href="#">Continue Reading</a>
    <?php } ?>
  </div>
</div>
