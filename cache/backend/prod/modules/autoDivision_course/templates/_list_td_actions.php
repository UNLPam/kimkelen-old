<td>
  <ul class="sf_admin_td_actions">
  <?php $disabled_actions=array(); ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php echo $helper->linkToShow($course, array(  'credentials' =>   array(    0 => 'show_course',  ),  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Show',)) ?>
<?php endif; ?>
  <?php if ($course->canBeEdited()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php echo $helper->linkToEdit($course, array(  'condition' => 'canBeEdited',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'condition' => 'canBeEdited',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canListStudents()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<li class="sf_admin_action_students"><?php echo link_to(__('Listado de estudiantes'), 'division_course/students?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'label' => 'Listado de estudiantes',  'action' => 'students',  'condition' => 'canListStudents',  'credentials' =>   array(    0 => 'show_course',  ),  'params' =>   array(  ),  'class_suffix' => 'students',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canManageCourseDays()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course_day',))): ?>
<li class="sf_admin_action_manage_course_days"><?php echo link_to(__('Manage course days'), 'division_course/manageCourseDays?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course_day',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'action' => 'manageCourseDays',  'label' => 'Manage course days',  'condition' => 'canManageCourseDays',  'credentials' =>   array(    0 => 'edit_course_day',  ),  'params' =>   array(  ),  'class_suffix' => 'manage_course_days',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canManageStudents()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_manage_students"><?php echo link_to(__('Manage students'), 'division_course/courseSubjectStudent?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'action' => 'courseSubjectStudent',  'credentials' =>   array(    0 => 'edit_course',  ),  'condition' => 'canManageStudents',  'params' =>   array(  ),  'class_suffix' => 'manage_students',  'label' => 'Manage students',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canCalificate()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_course_califications',))): ?>
<li class="sf_admin_action_califications"><?php echo link_to(__('Califications'), 'division_course/califications?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_course_califications',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'action' => 'califications',  'credentials' =>   array(    0 => 'edit_division_course_califications',  ),  'condition' => 'canCalificate',  'params' =>   array(  ),  'class_suffix' => 'califications',  'label' => 'Califications',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canTeachers()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_teachers"><?php echo link_to(__('Teachers'), 'division_course/courseTeachers?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'action' => 'courseTeachers',  'condition' => 'canTeachers',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'teachers',  'label' => 'Teachers',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canCopyStudentsFromDivision()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_division_students"><?php echo link_to(__('Add division students'), 'division_course/copyStudentsFromDivision?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'action' => 'copyStudentsFromDivision',  'label' => 'Add division students',  'credentials' =>   array(    0 => 'edit_course',  ),  'condition' => 'canCopyStudentsFromDivision',  'params' =>   array(  ),  'class_suffix' => 'division_students',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_course_califications',))): ?>
<li class="sf_admin_action_print_calification"><?php echo link_to(__('Print califications'), 'division_course/printCalification?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php if ($course->canBeClosed()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'close_course',))): ?>
<li class="sf_admin_action_close"><?php echo link_to(__('Close period'), 'division_course/close?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'close_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'label' => 'Close period',  'action' => 'close',  'credentials' =>   array(    0 => 'close_course',  ),  'condition' => 'canBeClosed',  'params' =>   array(  ),  'class_suffix' => 'close',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canBackPeriod()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'back_period_course',))): ?>
<li class="sf_admin_action_revert_period"><?php echo link_to(__('Back to period'), 'division_course/backPeriod?id='.$course->getId(), array (
  'confirm' => __('Are you sure?'),
)) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'back_period_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'label' => 'Back to period',  'action' => 'backPeriod',  'credentials' =>   array(    0 => 'back_period_course',  ),  'condition' => 'canBackPeriod',  'params' => 'confirm=\'Are you sure?\'',  'class_suffix' => 'revert_period',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canConfigurate()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'course_configuration',))): ?>
<li class="sf_admin_action_configuration"><?php echo link_to(__('Configuration course'), 'division_course/courseConfiguration?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'course_configuration',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'label' => 'Configuration course',  'action' => 'courseConfiguration',  'credentials' =>   array(    0 => 'course_configuration',  ),  'condition' => 'canConfigurate',  'params' =>   array(  ),  'class_suffix' => 'configuration',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canSeeAttendanceSheet()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<li class="sf_admin_action_see_attendance_sheet"><?php echo link_to(__('Show attendance sheet'), 'division_course/attendanceSheetByCourseSubject?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'label' => 'Show attendance sheet',  'action' => 'attendanceSheetByCourseSubject',  'credentials' =>   array(    0 => 'show_course',  ),  'condition' => 'canSeeAttendanceSheet',  'params' =>   array(  ),  'class_suffix' => 'seeattendancesheet',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->hasAttendanceForSubject()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_absense_per_subject',))): ?>
<li class="sf_admin_action_attendance_subject"><?php echo link_to(__('Load Attendances'), 'division_course/attendanceSubject?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_absense_per_subject',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'label' => 'Load Attendances',  'action' => 'attendanceSubject',  'condition' => 'hasAttendanceForSubject',  'credentials' =>   array(    0 => 'edit_absense_per_subject',  ),  'params' =>   array(  ),  'class_suffix' => 'attendancesubject',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canCalificate()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_course_califications',))): ?>
<li class="sf_admin_action_calificate_non_numerical_mark"><?php echo link_to(__('Calificate non numerical mark'), 'division_course/calificateNonNumericalMark?id='.$course->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_course_califications',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'label' => 'Calificate non numerical mark',  'action' => 'calificateNonNumericalMark',  'credentials' =>   array(    0 => 'edit_division_course_califications',  ),  'condition' => 'canCalificate',  'params' =>   array(  ),  'class_suffix' => 'calificatenonnumericalmark',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($course->canBeDeleted()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'delete_division',))): ?>
<?php echo $helper->linkToDelete($course, array(  'condition' => 'canBeDeleted',  'credentials' =>   array(    0 => 'delete_division',  ),  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'delete_division',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($course, array(  'condition' => 'canBeDeleted',  'credentials' =>   array(    0 => 'delete_division',  ),  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>
  <?php endif; ?>
  </ul>
  <?php echo $helper->getDisabledActions($disabled_actions); ?>
</td>

