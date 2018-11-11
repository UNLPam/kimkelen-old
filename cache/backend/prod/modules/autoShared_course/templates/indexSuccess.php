<?php use_helper('I18N', 'Date', 'Javascript') ?>
<?php include_partial('shared_course/assets') ?>

<div id="sf_admin_container">
  
  <h1><?php echo __('Shared course List', array(), 'messages') ?></h1>

  <?php include_partial('shared_course/list_slot_actions', array('helper' => $helper)) ?>

  <div id="sf_admin_header">
    <?php include_partial('shared_course/list_header', array('pager' => $pager)) ?>
  </div>

  <?php if ($configuration->hasFilterForm()): ?>
  <div align="center">
    <div id="sf_admin_bar">
      <?php include_partial('shared_course/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
    </div>
  </div>
  <?php endif ?>

  <?php include_partial('shared_course/flashes') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('shared_course/allBatch', array('action' => 'batch')) ?>" method="post">
    <ul class="sf_admin_actions">
      <?php include_partial('shared_course/list_all_batch_actions', array('helper' => $helper)) ?>
    </ul>
    </form>

    <form action="<?php echo url_for('shared_course_collection', array('action' => 'batch')) ?>" method="post">
    <ul class="sf_admin_actions">
      <input type="hidden" id="batch_action" name="batch_action">
      <?php include_partial('shared_course/list_batch_actions', array('helper' => $helper, 'select_id' => 'top')) ?>
      <?php include_partial('shared_course/list_actions', array('helper' => $helper)) ?>
    </ul>
    <?php include_partial('shared_course/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('shared_course/list_batch_actions', array('helper' => $helper, 'select_id' => 'bottom')) ?>
      <?php include_partial('shared_course/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
    <form action="<?php echo url_for('shared_course/allBatch', array('action' => 'batch')) ?>" method="post">
    <ul class="sf_admin_actions">
      <?php include_partial('shared_course/list_all_batch_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('shared_course/list_footer', array('pager' => $pager)) ?>
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
