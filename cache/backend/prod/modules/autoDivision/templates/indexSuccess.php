<?php use_helper('I18N', 'Date', 'Javascript') ?>
<?php include_partial('division/assets') ?>

<div id="sf_admin_container">
      <?php include_partial('exportation', array('configuration' => $configuration)) ?>
  
  <h1><?php echo __('Listado de divisiones', array(), 'messages') ?></h1>

  <?php include_partial('division/list_slot_actions', array('helper' => $helper)) ?>

  <div id="sf_admin_header">
    <?php include_partial('division/list_header', array('pager' => $pager)) ?>
  </div>

  <?php if ($configuration->hasFilterForm()): ?>
  <div align="center">
    <div id="sf_admin_bar">
      <?php include_partial('division/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
    </div>
  </div>
  <?php endif ?>

  <?php include_partial('division/flashes') ?>

  <div id="sf_admin_content">
    <ul class="sf_admin_actions">
      <?php include_partial('division/list_all_batch_actions', array('helper' => $helper)) ?>
    </ul>

    <ul class="sf_admin_actions">
      <?php include_partial('division/list_batch_actions', array('helper' => $helper, 'select_id' => 'top')) ?>
      <?php include_partial('division/list_actions', array('helper' => $helper)) ?>
    </ul>
    <?php include_partial('division/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('division/list_batch_actions', array('helper' => $helper, 'select_id' => 'bottom')) ?>
      <?php include_partial('division/list_actions', array('helper' => $helper)) ?>
    </ul>
    <ul class="sf_admin_actions">
      <?php include_partial('division/list_all_batch_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('division/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
<?php if ($configuration->isExportationEnabled()): ?>
  <?php javascript_tag() ?>
    jQuery(window).bind('resize', function() {
      jQuery('#sf_admin_exportation').centerHorizontally();
      jQuery('#sf_admin_exportation_resizable_area').ensureVisibleHeight();
    });
  <?php end_javascript_tag() ?>
<?php endif ?>
