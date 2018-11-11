<ul class="sf_admin_actions">


  <?php if ($course->canBeEdited()): ?>
      <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php echo $helper->slotActionToEdit($form->getObject(), array(  'condition' => 'canBeEdited',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
<?php endif; ?>

    <?php endif; ?>
  
  <li class="sf_admin_action_manage_course_days">
<?php if (method_exists($helper, 'linkToManageCourseDays')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php echo $helper->linkToManageCourseDays($form->getObject(), array(  'action' => 'manageCourseDays',  'label' => 'Manage course days',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'manage_course_days',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_manage_course_days"><?php echo link_to(__('Manage course days'), 'shared_course/manageCourseDays?id='.$course->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <?php if ($course->canManageStudents()): ?>
  <li class="sf_admin_action_manage_students">
<?php if (method_exists($helper, 'linkToManageStudents')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php echo $helper->linkToManageStudents($form->getObject(), array(  'action' => 'courseSubjectStudent',  'credentials' =>   array(    0 => 'edit_course',  ),  'condition' => 'canManageStudents',  'params' =>   array(  ),  'class_suffix' => 'manage_students',  'label' => 'Manage students',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_manage_students"><?php echo link_to(__('Manage students'), 'shared_course/courseSubjectStudent?id='.$course->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <li class="sf_admin_action_teachers">
<?php if (method_exists($helper, 'linkToTeachers')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php echo $helper->linkToTeachers($form->getObject(), array(  'action' => 'courseTeachers',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'teachers',  'label' => 'Teachers',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_teachers"><?php echo link_to(__('Teachers'), 'shared_course/courseTeachers?id='.$course->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <?php if ($course->canBeClosed()): ?>
  <li class="sf_admin_action_close">
<?php if (method_exists($helper, 'linkToClose')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'close_course',))): ?>
<?php echo $helper->linkToClose($form->getObject(), array(  'label' => 'Close period',  'action' => 'close',  'credentials' =>   array(    0 => 'close_course',  ),  'condition' => 'canBeClosed',  'params' =>   array(  ),  'class_suffix' => 'close',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'close_course',))): ?>
<li class="sf_admin_action_close"><?php echo link_to(__('Close period'), 'shared_course/close?id='.$course->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($course->canBackPeriod()): ?>
  <li class="sf_admin_action_revert_period">
<?php if (method_exists($helper, 'linkToRevertPeriod')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'back_period_course',))): ?>
<?php echo $helper->linkToRevertPeriod($form->getObject(), array(  'label' => 'Back to period',  'action' => 'backPeriod',  'credentials' =>   array(    0 => 'back_period_course',  ),  'condition' => 'canBackPeriod',  'params' => 'confirm=\'Are you sure?\'',  'class_suffix' => 'revert_period',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'back_period_course',))): ?>
<li class="sf_admin_action_revert_period"><?php echo link_to(__('Back to period'), 'shared_course/backPeriod?id='.$course->getId(), array (
  'confirm' => __('Are you sure?'),
)) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($course->canBeDeleted()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'delete_division',))): ?>
<?php echo $helper->linkToDelete($form->getObject(), array(  'condition' => 'canBeDeleted',  'credentials' =>   array(    0 => 'delete_division',  ),  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>

    <?php endif; ?>
  </ul>
