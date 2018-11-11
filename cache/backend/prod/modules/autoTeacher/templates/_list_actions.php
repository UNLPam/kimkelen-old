<?php if ($sf_user->hasCredential(array(  0 => 'edit_teacher',))): ?>
<?php echo $helper->linkToNew(array(  'label' => 'Nuevo docente',  'credentials' =>   array(    0 => 'edit_teacher',  ),  'params' =>   array(  ),  'class_suffix' => 'new',)) ?>
<?php endif; ?>

<?php echo $helper->linkToUserExport(array(  'params' =>   array(  ),  'class_suffix' => 'user_export',  'label' => 'User export',)) ?>

