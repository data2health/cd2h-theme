<?php if (!empty($lead)) {
  $person = get_post($lead);
  $person_title = $person->post_title;
  $person_email = get_post_meta($lead, 'email', true);
} ?>

<div class="lab-project-detailed">
  <header class="project-header mb-2">
    <h6 class="h4 d-inline-block pr-3 mb-1"><?php echo $title; ?></h6>
    <?php if (!empty($lead)) { ?><span class="project-lead pr-3">Project Lead: <strong><?php echo $person_title; ?></strong></span><?php } ?>
    <span class="cd2h-project"><i class="fas fa-check"></i> CD2H project</span>
    <?php if (!empty($lead)) { ?><span class="d-block project-email"><a href="mailto:?php echo $person_email; ?>"><?php echo $person_email; ?></a></span><?php } ?>
  </header>
  <div class="lab-probect-content mb-2">
  <?php echo $content; ?>
  </div>
  <small class="project-acknowledgements"><strong>Acknowledgements:</strong> <?php echo $acknowledgements; ?></small>

  <div class="project-footer mt-3">
    <?php if (!empty($test_prototype)) { ?>
      <a class="btn btn-primary" href="<?php echo $test_prototype; ?>">Test Prototype</a>
    <?php } ?>

    <?php if (!empty($submit_feedback)) { ?>
      <a class="btn btn-primary" href="<?php echo $submit_feedback; ?>">Submit Feedback</a>
    <?php } ?>
  </div>
</div>