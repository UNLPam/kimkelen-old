<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
    <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Cancel',)) ?>
      <?php if ($course->canBeDeleted()): ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_course',))): ?>
<?php echo $helper->linkToDelete($form->getObject(), array(  'condition' => 'canBeDeleted',  'credentials' =>   array(    0 => 'edit_course',  ),  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
<?php endif; ?>

    <?php endif; ?>
  <?php else: ?>
    <?php echo $helper->linkToList(array(  'label' => 'Volver al listado de cursos',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
      <?php echo $helper->linkToSaveAndList($form->getObject(), array(  'label' => 'Guardar y volver al listado de cursos',  'params' =>   array(  ),  'class_suffix' => 'save_and_list',)) ?>
  <?php endif; ?>
</ul>
