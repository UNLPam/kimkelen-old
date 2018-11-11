<?php use_helper('I18N', 'Date') ?>
<?php include_partial('student/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nuevo Alumno', array(), 'messages') ?></h1>

  <?php include_partial('student/flashes') ?>

  <?php include_partial('student/form_slot_actions', array('student' => $student, 'form' => $form, 'helper' => $helper)) ?>

  <div id="sf_admin_header">
    <?php include_partial('student/form_header', array('student' => $student, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('student/form', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('student/form_footer', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>
</div>
