<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_id">
  <?php if ('id' == $sort[0]): ?>
    <?php echo link_to(__('Id', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Id', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=id&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_starts_at">
  <?php if ('starts_at' == $sort[0]): ?>
    <?php echo link_to(__('Starts at', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=starts_at&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Starts at', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=starts_at&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_name">
  <?php if ('name' == $sort[0]): ?>
    <?php echo link_to(__('Name', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=name&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Name', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=name&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_quota">
  <?php if ('quota' == $sort[0]): ?>
    <?php echo link_to(__('Quota', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=quota&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Quota', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=quota&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_school_year_id">
  <?php if ('school_year_id' == $sort[0]): ?>
    <?php echo link_to(__('School year', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=school_year_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('School year', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=school_year_id&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_division_id">
  <?php if ('division_id' == $sort[0]): ?>
    <?php echo link_to(__('Division', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=division_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Division', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=division_id&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_related_division_id">
  <?php if ('related_division_id' == $sort[0]): ?>
    <?php echo link_to(__('Related division', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=related_division_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Related division', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=related_division_id&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_is_closed">
  <?php if ('is_closed' == $sort[0]): ?>
    <?php echo link_to(__('Is closed', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=is_closed&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Is closed', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=is_closed&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_current_period">
  <?php if ('current_period' == $sort[0]): ?>
    <?php echo link_to(__('Current period', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=current_period&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Current period', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=current_period&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_is_pathway">
  <?php if ('is_pathway' == $sort[0]): ?>
    <?php echo link_to(__('Is pathway', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=is_pathway&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Is pathway', array(), 'messages'), 'shared_course', array(), array('query_string' => 'sort=is_pathway&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>