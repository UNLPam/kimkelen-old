<ul class="sf_admin_actions">


  <?php echo $helper->linkToList(array(  'label' => 'Volver al listado de alumnos',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  
      <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->slotActionToEdit($form->getObject(), array(  'credentials' =>   array(    0 => 'edit_student',  ),  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
<?php endif; ?>

  
  <?php if ($student->canBeDeleted()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToDelete($form->getObject(), array(  'credentials' =>   array(    0 => 'edit_student',  ),  'condition' => 'canBeDeleted',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>

    <?php endif; ?>
  
  <li class="sf_admin_action_regiter_for_careers">
<?php if (method_exists($helper, 'linkToRegiterForCareers')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToRegiterForCareers($form->getObject(), array(  'label' => 'Career register',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'registerForCareer',  'params' =>   array(  ),  'class_suffix' => 'regiter_for_careers',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_regiter_for_careers"><?php echo link_to(__('Career register'), 'student/registerForCareer?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <li class="sf_admin_action_register_for_current_school_year">
<?php if (method_exists($helper, 'linkToRegisterForCurrentSchoolYear')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToRegisterForCurrentSchoolYear($form->getObject(), array(  'label' => 'School year register',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'registerForCurrentSchoolYear',  'params' =>   array(  ),  'class_suffix' => 'register_for_current_school_year',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_register_for_current_school_year"><?php echo link_to(__('School year register'), 'student/registerForCurrentSchoolYear?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <?php if ($student->isInscriptedInCareer()): ?>
  <li class="sf_admin_action_manage_orientation">
<?php if (method_exists($helper, 'linkToManageOrientation')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToManageOrientation($form->getObject(), array(  'label' => 'Cambiar orientacion',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'changeOrientation',  'condition' => 'isInscriptedInCareer',  'params' =>   array(  ),  'class_suffix' => 'manage_orientation',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_manage_orientation"><?php echo link_to(__('Cambiar orientacion'), 'student/changeOrientation?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($student->canBeManagedForCareerSubjectAllowed()): ?>
  <li class="sf_admin_action_manage_allowed_subjects">
<?php if (method_exists($helper, 'linkToManageAllowedSubjects')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToManageAllowedSubjects($form->getObject(), array(  'label' => 'Subjects to be coursed',  'credentials' =>   array(    0 => 'edit_student',  ),  'condition' => 'canBeManagedForCareerSubjectAllowed',  'action' => 'manageCareerSubjectAllowed',  'params' =>   array(  ),  'class_suffix' => 'manage_allowed_subjects',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_manage_allowed_subjects"><?php echo link_to(__('Subjects to be coursed'), 'student/manageCareerSubjectAllowed?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($student->canManageEquivalence()): ?>
  <li class="sf_admin_action_equivalence">
<?php if (method_exists($helper, 'linkToEquivalence')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_equivalence',))): ?>
<?php echo $helper->linkToEquivalence($form->getObject(), array(  'credentials' =>   array(    0 => 'show_equivalence',  ),  'condition' => 'canManageEquivalence',  'action' => 'equivalence',  'params' =>   array(  ),  'class_suffix' => 'equivalence',  'label' => 'Equivalence',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_equivalence',))): ?>
<li class="sf_admin_action_equivalence"><?php echo link_to(__('Equivalence'), 'student/equivalence?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($student->canPersonBeActivated()): ?>
  <li class="sf_admin_action_activate">
<?php if (method_exists($helper, 'linkToActivate')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToActivate($form->getObject(), array(  'label' => 'Set active',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'personActivation',  'condition' => 'canPersonBeActivated',  'params' =>   array(  ),  'class_suffix' => 'activate',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_activate"><?php echo link_to(__('Set active'), 'student/personActivation?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($student->canPersonBeDeactivated()): ?>
  <li class="sf_admin_action_deactivate">
<?php if (method_exists($helper, 'linkToDeactivate')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToDeactivate($form->getObject(), array(  'label' => 'Set inactive',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'personDeactivation',  'condition' => 'canPersonBeDeactivated',  'params' =>   array(  ),  'class_suffix' => 'deactivate',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_deactivate"><?php echo link_to(__('Set inactive'), 'student/personDeactivation?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($student->canPrintReportCard()): ?>
  <li class="sf_admin_action_print_report_card">
<?php if (method_exists($helper, 'linkToPrintReportCard')): ?>
  <?php echo $helper->linkToPrintReportCard($form->getObject(), array(  'label' => 'Print report card',  'action' => 'printReportCard',  'condition' => 'canPrintReportCard',  'params' =>   array(  ),  'class_suffix' => 'print_report_card',)) ?>
<?php else: ?>
  <li class="sf_admin_action_print_report_card"><?php echo link_to(__('Print report card'), 'student/printReportCard?id='.$student->getId()) ?></li>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <li class="sf_admin_action_brothers">
<?php if (method_exists($helper, 'linkToBrothers')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToBrothers($form->getObject(), array(  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'manageBrothers',  'params' =>   array(  ),  'class_suffix' => 'brothers',  'label' => 'Brothers',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_brothers"><?php echo link_to(__('Brothers'), 'student/manageBrothers?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <li class="sf_admin_action_tutors">
<?php if (method_exists($helper, 'linkToTutors')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToTutors($form->getObject(), array(  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'tutors',  'params' =>   array(  ),  'class_suffix' => 'tutors',  'label' => 'Tutors',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_tutors"><?php echo link_to(__('Tutors'), 'student/tutors?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <li class="sf_admin_action_sanctions">
<?php if (method_exists($helper, 'linkToSanctions')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_student_disciplinary_sanction',))): ?>
<?php echo $helper->linkToSanctions($form->getObject(), array(  'credentials' =>   array(    0 => 'show_student_disciplinary_sanction',  ),  'label' => 'Sanctions',  'action' => 'sanctions',  'params' =>   array(  ),  'class_suffix' => 'sanctions',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_student_disciplinary_sanction',))): ?>
<li class="sf_admin_action_sanctions"><?php echo link_to(__('Sanctions'), 'student/sanctions?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
  
  <?php if ($student->canBeFree()): ?>
  <li class="sf_admin_action_free">
<?php if (method_exists($helper, 'linkToFree')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'set_free',))): ?>
<?php echo $helper->linkToFree($form->getObject(), array(  'credentials' =>   array(    0 => 'set_free',  ),  'label' => 'Student free',  'action' => 'free',  'condition' => 'canBeFree',  'params' =>   array(  ),  'class_suffix' => 'free',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'set_free',))): ?>
<li class="sf_admin_action_free"><?php echo link_to(__('Student free'), 'student/free?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  
  <?php if ($student->canBeReincorporated()): ?>
  <li class="sf_admin_action_student_reincorporation">
<?php if (method_exists($helper, 'linkToStudentReincorporation')): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'student_reincorporation_student',))): ?>
<?php echo $helper->linkToStudentReincorporation($form->getObject(), array(  'credentials' =>   array(    0 => 'student_reincorporation_student',  ),  'label' => 'Student reincorporation',  'action' => 'reincorporation',  'condition' => 'canBeReincorporated',  'params' =>   array(  ),  'class_suffix' => 'student_reincorporation',)) ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'student_reincorporation_student',))): ?>
<li class="sf_admin_action_student_reincorporation"><?php echo link_to(__('Student reincorporation'), 'student/reincorporation?id='.$student->getId()) ?></li>

<?php endif; ?>

<?php endif; ?>
  </li>
    <?php endif; ?>
  </ul>
