<td>
  <ul class="sf_admin_td_actions">
  <?php $disabled_actions=array(); ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_student',))): ?>
<?php echo $helper->linkToShow($student, array(  'credentials' =>   array(    0 => 'show_student',  ),  'label' => 'Ver Legajo Completo',  'params' =>   array(  ),  'class_suffix' => 'show',)) ?>
<?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToEdit($student, array(  'credentials' =>   array(    0 => 'edit_student',  ),  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
<?php endif; ?>
  <?php if ($student->canBeDeleted()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToDelete($student, array(  'credentials' =>   array(    0 => 'edit_student',  ),  'condition' => 'canBeDeleted',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'credentials' =>   array(    0 => 'edit_student',  ),  'condition' => 'canBeDeleted',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_regiter_for_careers"><?php echo link_to(__('Career register'), 'student/registerForCareer?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_register_for_current_school_year"><?php echo link_to(__('School year register'), 'student/registerForCurrentSchoolYear?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php if ($student->isInscriptedInCareer()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_manage_orientation"><?php echo link_to(__('Cambiar orientacion'), 'student/changeOrientation?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Cambiar orientacion',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'changeOrientation',  'condition' => 'isInscriptedInCareer',  'params' =>   array(  ),  'class_suffix' => 'manage_orientation',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($student->canBeManagedForCareerSubjectAllowed()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_manage_allowed_subjects"><?php echo link_to(__('Subjects to be coursed'), 'student/manageCareerSubjectAllowed?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Subjects to be coursed',  'credentials' =>   array(    0 => 'edit_student',  ),  'condition' => 'canBeManagedForCareerSubjectAllowed',  'action' => 'manageCareerSubjectAllowed',  'params' =>   array(  ),  'class_suffix' => 'manage_allowed_subjects',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_equivalence',))): ?>
<li class="sf_admin_action_analytical"><?php echo link_to(__('Analytical'), 'student/analytical?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php if ($student->canPersonBeActivated()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_activate"><?php echo link_to(__('Set active'), 'student/personActivation?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Set active',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'personActivation',  'condition' => 'canPersonBeActivated',  'params' =>   array(  ),  'class_suffix' => 'activate',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($student->canBeDeactivated()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_deactivate"><?php echo link_to(__('Set inactive'), 'student/deactivate?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Set inactive',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'deactivate',  'condition' => 'canBeDeactivated',  'params' =>   array(  ),  'class_suffix' => 'deactivate',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'show_student_disciplinary_sanction',))): ?>
<li class="sf_admin_action_sanctions"><?php echo link_to(__('Sanctions'), 'student/sanctions?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php if ($student->canBeFree()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'set_free',))): ?>
<li class="sf_admin_action_free"><?php echo link_to(__('Student free'), 'student/free?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'set_free',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'credentials' =>   array(    0 => 'set_free',  ),  'label' => 'Student free',  'action' => 'free',  'condition' => 'canBeFree',  'params' =>   array(  ),  'class_suffix' => 'free',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($student->canPrintReportCard()): ?>
  <li class="sf_admin_action_print_report_card"><?php echo link_to(__('Print report card'), 'student/printReportCard?id='.$student->getId()) ?></li>
  <?php else: ?>
    <?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Print report card',  'action' => 'printReportCard',  'condition' => 'canPrintReportCard',  'params' =>   array(  ),  'class_suffix' => 'print_report_card',)) ?>  <?php endif; ?>
  <?php if ($student->canBeReincorporated()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'student_reincorporation_student',))): ?>
<li class="sf_admin_action_student_reincorporation"><?php echo link_to(__('Student reincorporation'), 'student/reincorporation?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'student_reincorporation_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'credentials' =>   array(    0 => 'student_reincorporation_student',  ),  'label' => 'Student reincorporation',  'action' => 'reincorporation',  'condition' => 'canBeReincorporated',  'params' =>   array(  ),  'class_suffix' => 'student_reincorporation',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($student->canGenerateReport()): ?>
  <li class="sf_admin_action_student_assistance_sanction_report"><?php echo link_to(__('Student assistance and sanction report'), 'student/showAssistanceAndSanctionReport?id='.$student->getId()) ?></li>
  <?php else: ?>
    <?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Student assistance and sanction report',  'action' => 'showAssistanceAndSanctionReport',  'condition' => 'canGenerateReport',  'params' =>   array(  ),  'class_suffix' => 'student_assistance_sanction_report',)) ?>  <?php endif; ?>
  <li class="sf_admin_action_print_details"><?php echo link_to(__('Print details of student'), 'student/printDetails?id='.$student->getId()) ?></li>
  <?php if ($student->canBeWithdrawn()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_withdraw"><?php echo link_to(__('Withdraw student'), 'student/withdrawStudent?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Withdraw student',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'withdrawStudent',  'condition' => 'canBeWithdrawn',  'params' =>   array(  ),  'class_suffix' => 'withdraw',)) ?>
<?php endif; ?>
  <?php endif; ?>
  <?php if ($student->canUndoWithdrawn()): ?>
  <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<li class="sf_admin_action_undo_withdraw"><?php echo link_to(__('Undo withdraw student'), 'student/undoWithdrawStudent?id='.$student->getId()) ?></li>

<?php endif; ?>
  <?php else: ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php $disabled_actions[]= $helper->getDisabledAction($student, array(  'label' => 'Undo withdraw student',  'credentials' =>   array(    0 => 'edit_student',  ),  'action' => 'undoWithdrawStudent',  'condition' => 'canUndoWithdrawn',  'params' =>   array(  ),  'class_suffix' => 'undo_withdraw',)) ?>
<?php endif; ?>
  <?php endif; ?>
  </ul>
  <?php echo $helper->getDisabledActions($disabled_actions); ?>
</td>

