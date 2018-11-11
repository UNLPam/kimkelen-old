<?php if ($sf_user->hasCredential(array(  0 => 'new_division',))): ?>
<?php echo $helper->linkToNew(array(  'credentials' =>   array(    0 => 'new_division',  ),  'label' => 'Nueva división',  'params' =>   array(  ),  'class_suffix' => 'new',)) ?>
<?php endif; ?>

<?php echo $helper->linkToUserExport(array(  'params' =>   array(  ),  'class_suffix' => 'user_export',  'label' => 'User export',)) ?>

