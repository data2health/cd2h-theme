<?php
/*
* Tools tabs container
*
*/
$content_array = array();
$content_array = the_shortcodes($content_array, $content);
?>
<div class="tools-tabs-container">
  <ul id="tools-tabs" class="nav nav-tabs" role="tablist">
    <?php foreach($content_array as $idx => $c_arr){
      $cat_id = $c_arr['atts']['category'];
      $cat = get_term($cat_id, 'tool_category');
      $tab_id = "tools-" . $cat_id;
      $is_active = $idx == 0;
    ?>
    <li class="nav-item">
      <a class="nav-link <?php if($is_active){ echo 'active'; }?>" id="tab-<?php echo $tab_id; ?>" data-toggle="tab" href="#<?php echo $tab_id; ?>" role="tab" aria-controls="<?php echo $tab_id; ?>" ><?php echo $cat->name; ?></a>
    </li>
    <?php } ?>
  </ul>
  <div class="tab-content main-content">
    <?php foreach($content_array as $idx => $c_arr){
      $category = $c_arr['atts']['category'];
      $is_active = $idx == 0;
      include(locate_template('/inc/shortcodes/tools_tab.php', false, false));
    }?>
  </div>
</div>
