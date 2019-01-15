<?php if (!empty($lead)) {
  $person = get_post($lead);
  $person_title = $person->post_title;
  $person_email = get_post_meta($lead, 'email', true);
} ?>

<div class="lab-project-detailed">
  <header class="project-header mb-2">
    <h6 class="h4 d-inline-md-block pr-3 mb-1"><?php echo $title; ?></h6>
    <div class="row no-gutters">
      <?php if (!empty($lead)) { ?>
      <div class="col-md-6">
        <span class="project-lead">Project Lead: <strong><?php echo $person_title; ?></strong></span>
        <span class="d-block project-email"><a href="mailto:?php echo $person_email; ?>"><?php echo $person_email; ?></a></span>
      </div>
      <?php } ?>
      <?php if (!empty($cd2h_project)) { ?>
      <div class="col-md-4">
        <span class="cd2h-project"><i class="fas fa-check"></i> CD2H project</span>
      </div>
      <?php } ?>
    </div>
  </header>
  <div class="lab-project-content mb-2">
    <strong class="d-block mb-2"><?php echo $secondary; ?></strong>
    <?php echo $content; ?>
  </div>
  <?php if (!empty($acknowledgements)) { ?>
  <small class="project-acknowledgements"><strong>Acknowledgements:</strong> <?php echo $acknowledgements; ?></small>
  <?php } ?>
  <div class="project-footer mt-3">
    <?php if (!empty($test_prototype)) { ?>
      <a class="btn btn-primary d-block d-lg-inline-block mb-3 mb-lg-0" href="<?php echo $test_prototype; ?>">Test Prototype</a>
    <?php } if (!empty($form_id)) { ?>
      <button class="btn btn-primary d-block d-lg-inline-block mb-3 mb-lg-0" data-toggle="modal" data-target="#formModal-<?php echo $form_id; ?>">Submit Feedback</button>
    <?php } ?>
  </div>
</div>
