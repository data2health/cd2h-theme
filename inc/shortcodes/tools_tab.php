<?php
/**
* Tools category tab
*
* @param string $category
* @param bool $is_active
*/
$tab_id = "tools-" . $category;
$cat = get_term($category, 'tool_category');
$child_categories = get_terms( 'tool_category',
  array(
    'hide_empty' => true,
    'parent'  => $category,
  )
);

?>
<div class="tools-tab tab-pane fade <?php if($is_active){ echo 'show active'; } ?>" id="<?php echo $tab_id; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $tab_id; ?>">
  <div class="row justify-content-center">
    <?php if(!empty($child_categories)): ?>
    <div class="col-md-5">
      <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
        <?php foreach($child_categories as $idx => $child){
          $child_is_active = $idx == 0;
          $child_cat_id = $child->term_id;
          $child_tab_id = "tools-sub-" . $child_cat_id;
        ?>
        <a class="nav-link <?php if($child_is_active){ echo 'active'; }?>" id="tab-<?php echo $child_tab_id; ?>" data-toggle="tab" href="#<?php echo $child_tab_id; ?>" role="tab" aria-controls="<?php echo $child_tab_id; ?>" ><span><?php echo $child->name; ?></span></a>
        <?php } ?>
      </div>
    </div>
    <?php endif; ?>
    <div class="col-md-7">
      <?php if(!empty($child_categories)){ ?>
      <div class="tab-content child-content">
        <?php foreach($child_categories as $idx => $child){
          $child_is_active = $idx == 0;
          $child_cat_id = $child->term_id;
          $child_tab_id = "tools-sub-" . $child_cat_id;
          $tools = get_posts(array(
            'post_type' => 'tools-resources',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                  'taxonomy' => 'tool_category',
                  'terms' => $child_cat_id,
              ),
            ),
          ));
        ?>
        <div class="tools-tab tab-pane fade <?php if($child_is_active){ echo 'show active'; } ?>" id="<?php echo $child_tab_id; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $child_tab_id; ?>">
          <?php include(locate_template('template-parts/_partial_tool_grid.php')); ?>
        </div>
        <?php } ?>
      </div>
      <?php } else {
        $tools = get_posts(array(
          'post_type' => 'tools-resources',
          'posts_per_page' => -1,
          'orderby' => 'title',
          'order' => 'ASC',
          'tax_query' => array(
            array(
                'taxonomy' => 'tool_category',
                'terms' => $category,
            ),
          ),
        ));
        echo "<div class='child-content'>";
        include(locate_template('template-parts/_partial_tool_grid.php'));
        echo '</div>';
      }?>
    </div>
  </div>
</div>
