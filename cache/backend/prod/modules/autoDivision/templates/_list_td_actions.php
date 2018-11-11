<td>
  <ul class="sf_admin_td_actions">
  <?php $disabled_actions=array(); ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php echo $helper->linkToShow($division, array(  'credentials' =>   array(    0 => 'show_course',  ),  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Show',)) ?>
<?php endif; ?>
  <?php if ($division->canListStudents()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<li class="sf_admin_action_students"><?php echo link_to(__('Listado de estudiantes'), 'division/students?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'label' => 'Listado de estudiantes',  'action' => 'students',  'condition' => 'canListStudents',  'credentials' =>   array(    0 => 'show_course',  ),  'params' =>   array(  ),  'class_suffix' => 'students',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<li class="sf_admin_action_show_calendar"><?php echo link_to(__('Show calendar'), 'division/showCalendar?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'course_configuration',))): ?>
<li class="sf_admin_action_division_configure"><?php echo link_to(__('Division configure'), 'division/courseConfiguration?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php if ($division->canDivisionPreceptors()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_preceptors',))): ?>
<li class="sf_admin_action_division_preceptors"><?php echo link_to(__('Preceptors'), 'division/divisionPreceptors?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_preceptors',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'action' => 'divisionPreceptors',  'label' => 'Preceptors',  'condition' => 'canDivisionPreceptors',  'credentials' =>   array(    0 => 'edit_division_preceptors',  ),  'params' =>   array(  ),  'class_suffix' => 'division_preceptors',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($division->canDivisionStudents()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_division_students"><?php echo link_to(__('Students'), 'division/divisionStudents?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'action' => 'divisionStudents',  'label' => 'Students',  'condition' => 'canDivisionStudents',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'division_students',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($division->canManageConduct()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_preceptors',))): ?>
<li class="sf_admin_action_student_conduct"><?php echo link_to(__('Student conduct'), 'division/studentConduct?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_preceptors',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'action' => 'studentConduct',  'label' => 'Student conduct',  'condition' => 'canManageConduct',  'credentials' =>   array(    0 => 'edit_division_preceptors',  ),  'params' =>   array(  ),  'class_suffix' => 'student_conduct',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <li class="sf_admin_action_division_courses"><?php echo link_to(__('Division courses'), 'division/divisionCourses?id='.$division->getId()) ?></li>
  <?php if ($division->canManageAttendance()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<li class="sf_admin_action_see_attendance_sheet"><?php echo link_to(__('Show attendance sheet'), 'division/attendanceSheetByDay?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'label' => 'Show attendance sheet',  'action' => 'attendanceSheetByDay',  'credentials' =>   array(    0 => 'show_course',  ),  'condition' => 'canManageAttendance',  'params' =>   array(  ),  'class_suffix' => 'seeattendancesheet',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($division->canPrintReportCards()): ?>
  <?php if ($sf_user->hasCredential(array(  0 =>   array(    0 => 'report_card',    1 => 'edit_division_preceptors',    2 => 'show_division_course_califications',  ),))): ?>
<li class="sf_admin_action_boletines"><?php echo link_to(__('Imprimir boletines division'), 'division/printReportCard?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 =>   array(    0 => 'report_card',    1 => 'edit_division_preceptors',    2 => 'show_division_course_califications',  ),))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'action' => 'printReportCard',  'label' => 'Imprimir boletines division',  'credentials' =>   array(    0 =>     array(      0 => 'report_card',      1 => 'edit_division_preceptors',      2 => 'show_division_course_califications',    ),  ),  'condition' => 'canPrintReportCards',  'params' =>   array(  ),  'class_suffix' => 'boletines',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <li class="sf_admin_action_show_disciplinary_sanction_report"><?php echo link_to(__('Student disciplinary sanction report'), 'division/showDisciplinarySanctionReport?id='.$division->getId()) ?></li>
  <li class="sf_admin_action_show_assistance_report"><?php echo link_to(__('Student assistance report'), 'division/showAssistanceReport?id='.$division->getId()) ?></li>
  <?php if ($division->canPrintCalification()): ?>
  <?php if ($sf_user->hasCredential(array(  0 =>   array(    0 => 'edit_division_course_califications',    1 => 'show_division_course_califications',  ),))): ?>
<li class="sf_admin_action_print_calification"><?php echo link_to(__('Print califications'), 'division/printCalification?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 =>   array(    0 => 'edit_division_course_califications',    1 => 'show_division_course_califications',  ),))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'label' => 'Print califications',  'action' => 'printCalification',  'credentials' =>   array(    0 =>     array(      0 => 'edit_division_course_califications',      1 => 'show_division_course_califications',    ),  ),  'condition' => 'canPrintCalification',  'params' =>   array(  ),  'class_suffix' => 'printcalification',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($division->canLoadAttendances()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_attendance_day"><?php echo link_to(__('Load Attendances'), 'division/attendanceDay?id='.$division->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'label' => 'Load Attendances',  'action' => 'attendanceDay',  'credentials' =>   array(    0 => 'edit_course',  ),  'condition' => 'canLoadAttendances',  'params' =>   array(  ),  'class_suffix' => 'attendanceday',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($division->canBeDeleted()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'delete_division',))): ?>
<?php echo $helper->linkToDelete($division, array(  'credentials' =>   array(    0 => 'delete_division',  ),  'condition' => 'canBeDeleted',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'delete_division',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($division, array(  'credentials' =>   array(    0 => 'delete_division',  ),  'condition' => 'canBeDeleted',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>
  <?php endif; ?>
  </ul>
  <?php echo $helper->getDisabledActions($disabled_actions); ?>
</td>

