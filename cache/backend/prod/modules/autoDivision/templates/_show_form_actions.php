<ul class="sf_admin_actions">


  <?php echo $helper->linkToList(array(  'label' => 'Volver al listado de divisiones',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  
  <?php if ($division->canListStudents()): ?>
  <li class="sf_admin_action_students">
<?php if (method_exists($helper, 'linkToStudents')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php echo $helper->linkToStudents($form->getObject(), array(  'label' => 'Listado de estudiantes',  'action' => 'students',  'condition' => 'canListStudents',  'credentials' =>   array(    0 => 'show_course',  ),  'params' =>   array(  ),  'class_suffix' => 'students',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<li class="sf_admin_action_students"><?php echo link_to(__('Listado de estudiantes'), 'division/students?id='.$division->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <li class="sf_admin_action_show_calendar">
<?php if (method_exists($helper, 'linkToShowCalendar')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<?php echo $helper->linkToShowCalendar($form->getObject(), array(  'action' => 'showCalendar',  'credentials' =>   array(    0 => 'show_course',  ),  'params' =>   array(  ),  'class_suffix' => 'show_calendar',  'label' => 'Show calendar',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_course',))): ?>
<li class="sf_admin_action_show_calendar"><?php echo link_to(__('Show calendar'), 'division/showCalendar?id='.$division->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <li class="sf_admin_action_division_preceptors">
<?php if (method_exists($helper, 'linkToDivisionPreceptors')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_preceptors',))): ?>
<?php echo $helper->linkToDivisionPreceptors($form->getObject(), array(  'action' => 'divisionPreceptors',  'label' => 'Preceptors',  'credentials' =>   array(    0 => 'edit_division_preceptors',  ),  'params' =>   array(  ),  'class_suffix' => 'division_preceptors',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_division_preceptors',))): ?>
<li class="sf_admin_action_division_preceptors"><?php echo link_to(__('Preceptors'), 'division/divisionPreceptors?id='.$division->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <li class="sf_admin_action_division_students">
<?php if (method_exists($helper, 'linkToDivisionStudents')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php echo $helper->linkToDivisionStudents($form->getObject(), array(  'action' => 'divisionStudents',  'label' => 'Students',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'class_suffix' => 'division_students',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<li class="sf_admin_action_division_students"><?php echo link_to(__('Students'), 'division/divisionStudents?id='.$division->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <li class="sf_admin_action_division_courses">
<?php if (method_exists($helper, 'linkToDivisionCourses')): ?>
  <?php echo $helper->linkToDivisionCourses($form->getObject(), array(  'action' => 'divisionCourses',  'label' => 'Cursos',  'credentils' =>   array(    0 => 'show_course',  ),  'params' =>   array(  ),  'class_suffix' => 'division_courses',)) ?>
<?php else: ?>
  <li class="sf_admin_action_division_courses"><?php echo link_to(__('Cursos'), 'division/divisionCourses?id='.$division->getId()) ?></li>

<?php endif; ?>
  </li>
  
  <?php if ($division->canBeDeleted()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'delete_division',))): ?>
<?php echo $helper->linkToDelete($form->getObject(), array(  'credentials' =>   array(    0 => 'delete_division',  ),  'condition' => 'canBeDeleted',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>

    <?php endif; ?>
  </ul>
