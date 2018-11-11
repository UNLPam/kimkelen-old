<?php use_helper('I18N', 'Date') ?>
<?php include_partial('division/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nueva división', array(), 'messages') ?></h1>

  <?php include_partial('division/flashes') ?>

  <?php include_partial('division/form_slot_actions', array('division' => $division, 'form' => $form, 'helper' => $helper)) ?>

  <div id="sf_admin_header">
    <?php include_partial('division/form_header', array('division' => $division, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('division/form', array('division' => $division, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('division/form_footer', array('division' => $division, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>
</div>
