<?php use_helper('I18N', 'Date') ?>
<?php include_partial('teacher/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Crear un nuevo docente', array(), 'messages') ?></h1>

  <?php include_partial('teacher/flashes') ?>

  <?php include_partial('teacher/form_slot_actions', array('teacher' => $teacher, 'form' => $form, 'helper' => $helper)) ?>

  <div id="sf_admin_header">
    <?php include_partial('teacher/form_header', array('teacher' => $teacher, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('teacher/form', array('teacher' => $teacher, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('teacher/form_footer', array('teacher' => $teacher, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>
</div>
