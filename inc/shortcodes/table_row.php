<?php
/**
 * Display a container for the filter elements.
 *
 * @param string $row_heading
 * @param string $row_value_1
 * @param string $row_value_2
 * @param string $row_link
 */
 $size = count($values);
?>

<tr>
    <?php foreach($values as $index => $value){
        if($index == 2 && $index == $size - 1){?>
        <td colspan="2" class="border-right pl-4"><?php echo $value; ?></td>
        <?php } else {?>
        <td class="border-right pl-4"><?php echo $value; ?></td>
    <?php } } ?>
</tr>
