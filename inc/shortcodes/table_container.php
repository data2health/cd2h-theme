
<?php
/**
* Display a container for the filter elements.
*
* @param string $title
* @param string $content
*/
$size = count($headings);
?>

<div class="cd2h-table-container">
    <table class="table table-borderless cd2h-table text-left">
      <thead>
        <tr>
          <?php foreach ($headings as $heading) { ?>
            <th scope="col" class="pl-4 border-right"><?php echo $heading; ?></th>
          <?php } ?>
          <?php if($size == 3){ ?>
            <th></th>
          <?php }?>
        </tr>
      </thead>
      <tbody>
        <?php echo wpb_js_remove_wpautop($content); ?>
      </tbody>
    </table>
</div>
