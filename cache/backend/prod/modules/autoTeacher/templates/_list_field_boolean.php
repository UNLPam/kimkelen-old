<?php if ($value): ?>
  <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/tick.png', array('alt' => __('Checked', array(), 'sf_admin'), 'title' => __('Checked', array(), 'sf_admin'))) ?>
<?php else: ?>
  <?php echo image_tag('/sfPropelRevisitedGeneratorPlugin/images/cross-small.png', array('alt' => __('Not checked', array(), 'sf_admin'), 'title' => __('Not checked', array(), 'sf_admin'))) ?>
<?php endif; ?>
