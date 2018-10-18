<div id="sidebar" class="col-sm-3 p-0">
  <div id="sidebar-content">

    <?php //dynamic_sidebar('sidebar'); ?>
    <div id="collapse-archive">
    <?php

          //Get the current category and save it for jQuery
          $categories = get_the_category();
          $currCategory = $categories[0]->cat_ID;

          // specify the categories to use
          if (class_exists('acf')){
            $page_for_posts = get_option( 'page_for_posts' );
            $catstoinclude = get_field('categories_to_include', $page_for_posts);
            $cats = get_categories(array('id' => $catstoinclude));
          } else {
            $cats = get_categories();
          }

            // loop through the categries
            foreach ($cats as $cat) {
              // setup the cateogory ID
              $cat_id= $cat->term_id;
              // Make a header for the cateogry
              echo '<div id="category-box-'.$cat_id.'" class="category-box"><a href="'.get_category_link($cat_id).'"><h6 id="category-heading-'.$cat_id.'" class="text-uppercase font-weight-bold p-4 mb-0">'.$cat->name.' <i class="fas fa-chevron-down float-right"></i></h6></a>'; ?>

              <div class="years collapse pt-3 pb-0 mb-0 " id="collapse-<?php echo $cat_id; ?>">
              <?php
              $all_posts = get_posts(array(
                'posts_per_page' => -1, // to show all posts
                'category'    => $cat_id
              ));

              // this variable will contain all the posts in a associative array
              // with three levels, for every year, month and posts.
              $ordered_posts = array();

              foreach ($all_posts as $single) {

                $year  = mysql2date('Y', $single->post_date);
                $month = mysql2date('F', $single->post_date);

                // specifies the position of the current post
                $ordered_posts[$year][$month][] = $single;
              }

              // iterates the years
              echo '<div class="font-weight-bold pb-2 pl-3">ARCHIVE</div>';
              foreach ($ordered_posts as $year => $months) { ?>

                <div id="y-<?php echo $year ?>" class="year-heading pl-3 pb-1 pt-1">
                  <a class="font-weight-bold text-dark" href="#collapse-<?php echo $cat_id.'-'.$year ?>" data-toggle="collapse" aria-expanded="false">
                    <span class=""><i class="fas fa-plus fa-fw" data-fa-transform="shrink-8"></i></span> <?php echo $year ?>
                  </a>
                  <div class="months collapse  ml-4" id="collapse-<?php echo $cat_id.'-'.$year ?>">

                  <?php foreach ($months as $month => $entries ) { // iterates the moths ?>

                    <div id="m-<?php echo strtolower($month) ?>" class="month-heading">
                      <a class="font-weight-normal text-dark" href="#collapse-<?php echo $cat_id.'-'.$year.'-'.$month ?>" data-toggle="collapse" aria-expanded="false">
                        <span class=""><i class="fas fa-plus fa-fw" data-fa-transform="shrink-8"></i></span> <?php echo $month; ?>
                      </a>
                      <div class="posts collapse ml-4" id="collapse-<?php echo $cat_id.'-'.$year.'-'.$month ?>">

                        <?php foreach ($entries as $single ) { // iterates the posts ?>

                          <div id="p-<?php echo $single->ID ?>" class="post-heading post-item pl-3">
                             <a class="<?php if (is_single($single->ID)){echo 'current-item';}?> font-weight-normal" href="<?php echo get_permalink($single->ID); ?>"><?php echo mysql2date('m.d.Y', $single->post_date) ?></a>
                          </div>

                        <?php } // ends foreach $posts ?>

                      </div> <!-- ul.posts -->
                    </div>

                  <?php } // ends foreach for $months ?>

                </div> <!-- ul.months -->
              </div>

                <?php
              } // ends foreach for $ordered_posts
              ?>

            </div></div><!-- ul.years -->

            <? } // done the foreach statement ?>

            <script>
                jQuery( document ).ready(function() {
            <?php if (is_single()) : ?>
                jQuery("#collapse-<?php echo $currCategory ?>, #collapse-<?php echo $currCategory.'-'.get_the_date('Y')?>, #collapse-<?php echo $currCategory.'-'.get_the_date('Y').'-'.get_the_date('F')?>").collapse("show");
            <?php elseif (is_archive()) : ?>
                jQuery("#collapse-<?php echo $currCategory ?>").collapse("show");
            <?php endif; ?>
                jQuery("#category-box-<?php echo $currCategory ?>").addClass("current-item");
                jQuery("#category-box-<?php echo $currCategory ?> h6 i").removeClass("fa-chevron-down").addClass( "fa-chevron-up" );
                jQuery("a[aria-expanded='true'] i").removeClass('fa-plus').addClass('fa-minus');
              });
              jQuery("a[aria-expanded='false']").click(function(){
                jQuery(this).find('svg').toggleClass('fa-minus fa-plus')
              });
            </script>
      </div>
  </div>
</div>
