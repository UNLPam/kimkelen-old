<?php use_helper('I18N', 'Date') ?>
<?php include_partial('division_course/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Division course', array(), 'messages') ?></h1>

  <?php include_partial('division_course/flashes') ?>

  <?php include_partial('division_course/form_slot_actions', array('course' => $course, 'form' => $form, 'helper' => $helper)) ?>

  <div id="sf_admin_header">
    <?php include_partial('division_course/form_header', array('course' => $course, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('division_course/form', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('division_course/form_footer', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>
</div>
