<td>
  <ul class="sf_admin_td_actions">
  <?php $disabled_actions=array(); ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_teacher',))): ?>
<?php echo $helper->linkToShow($teacher, array(  'credentials' =>   array(    0 => 'show_teacher',  ),  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Show',)) ?>
<?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_teacher',))): ?>
<li class="sf_admin_action_show_calendar"><?php echo link_to(__('Show calendar'), 'teacher/showCalendar?id='.$teacher->getId()) ?></li>

<?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<?php echo $helper->linkToEdit($teacher, array(  'credentials' =>   array(    0 => 'edit_teacher',  ),  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
<?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<?php echo $helper->linkToDelete($teacher, array(  'credentials' =>   array(    0 => 'edit_teacher',  ),  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>
  <?php if ($teacher->canAddPreceptor()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<li class="sf_admin_action_aggregate_preceptor"><?php echo link_to(__('Aggregate as a preceptor'), 'teacher/aggregateAsPreceptor?id='.$teacher->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($teacher, array(  'label' => 'Aggregate as a preceptor',  'action' => 'aggregateAsPreceptor',  'condition' => 'canAddPreceptor',  'credentials' =>   array(    0 => 'edit_teacher',  ),  'params' =>   array(  ),  'class_suffix' => 'aggregate_preceptor',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<li class="sf_admin_action_licenses"><?php echo link_to(__('Licenses'), 'teacher/licenses?id='.$teacher->getId()) ?></li>

<?php endif; ?>
  <?php if ($teacher->haveCourses()): ?>
  <li class="sf_admin_action_course"><?php echo link_to(__('Courses'), 'teacher/courses?id='.$teacher->getId()) ?></li>
  <?php else: ?>
    <?php $disabled_actions[]= $helper->getDisabledAction($teacher, array(  'label' => 'Courses',  'action' => 'courses',  'condition' => 'haveCourses',  'params' =>   array(  ),  'class_suffix' => 'course',)) ?>  <?php endif; ?>
  <?php if ($teacher->canPersonBeActivated()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<li class="sf_admin_action_activate"><?php echo link_to(__('Set active'), 'teacher/personActivation?id='.$teacher->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($teacher, array(  'label' => 'Set active',  'credentials' =>   array(    0 => 'edit_teacher',  ),  'action' => 'personActivation',  'condition' => 'canPersonBeActivated',  'params' =>   array(  ),  'class_suffix' => 'activate',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($teacher->canPersonBeDeactivated()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<li class="sf_admin_action_deactivate"><?php echo link_to(__('Set inactive'), 'teacher/personActivation?id='.$teacher->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($teacher, array(  'label' => 'Set inactive',  'credentials' =>   array(    0 => 'edit_teacher',  ),  'action' => 'personActivation',  'condition' => 'canPersonBeDeactivated',  'params' =>   array(  ),  'class_suffix' => 'deactivate',)) ?>
<?php endif; ?>
  <?php endif; ?>
  </ul>
  <?php echo $helper->getDisabledActions($disabled_actions); ?>
</td>

