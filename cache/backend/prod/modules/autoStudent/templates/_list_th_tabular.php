<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_person_lastname">
  <?php if ('person_lastname' == $sort[0]): ?>
    <?php echo link_to(__('Lastname', array(), 'messages'), 'student', array(), array('query_string' => 'sort=person_lastname&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Lastname', array(), 'messages'), 'student', array(), array('query_string' => 'sort=person_lastname&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_person_firstname">
  <?php if ('person_firstname' == $sort[0]): ?>
    <?php echo link_to(__('Firstname', array(), 'messages'), 'student', array(), array('query_string' => 'sort=person_firstname&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Firstname', array(), 'messages'), 'student', array(), array('query_string' => 'sort=person_firstname&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_person_full_identification">
  <?php if ('person_full_identification' == $sort[0]): ?>
    <?php echo link_to(__('Identification number', array(), 'messages'), 'student', array(), array('query_string' => 'sort=person_full_identification&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), 'title' => __('Sort by this field', array(), 'messages'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Identification number', array(), 'messages'), 'student', array(), array('query_string' => 'sort=person_full_identification&sort_type=asc', 'title' => __('Sort by this field', array(), 'messages'))) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_person_is_active">
  <?php echo __('Is Active?', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_person_sf_guard_user">
  <?php echo __('Username', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_is_registered">
  <?php echo __('School year registered?', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_careers">
  <?php echo __('Careers', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>