<?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<?php echo $helper->linkToNew(array(  'credentials' =>   array(    0 => 'edit_student',  ),  'label' => 'Nuevo alumno',  'params' =>   array(  ),  'class_suffix' => 'new',)) ?>
<?php endif; ?>

<?php echo $helper->linkToUserExport(array(  'params' =>   array(  ),  'class_suffix' => 'user_export',  'label' => 'User export',)) ?>

