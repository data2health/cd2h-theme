<?php
// Message displayed when a category is empty.
// Included from inc/shortcodes/lab_project_list.php
$content = base64_decode(get_option('empty_category_message'));
if(empty($content)){
  $content = "Phase 2 projects will be announced in early January. See what projects we are considering <a href='https://docs.google.com/spreadsheets/d/1SHVlnh8x6nYcl_BbIYVu1ziQOGYF3SLrtATvivpzaVU/edit#gid=1631632526'>here</a>. Please feel free to reach out if you are interested in collaborating on this work. Project lead contact information is listed.";
}
?>

<div class="lab-project-detailed">
  <div class="lab-project-content mb-2">
    <p><?php echo $content; ?></p>
  </div>
</div>
