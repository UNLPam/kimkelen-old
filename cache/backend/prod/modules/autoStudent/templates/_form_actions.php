<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
    <?php echo $helper->linkToList(array(  'label' => 'Volver al listado de alumnos',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
      <?php echo $helper->linkToSaveAndList($form->getObject(), array(  'label' => 'Guardar y volver al listado de alumnos',  'params' =>   array(  ),  'class_suffix' => 'save_and_list',)) ?>
      <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'Guardar y agregar otro alumno',  'params' =>   array(  ),  'class_suffix' => 'save_and_add',)) ?>
  <?php else: ?>
    <?php echo $helper->linkToList(array(  'label' => 'Volver al listado de alumnos',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
      <?php echo $helper->linkToSaveAndList($form->getObject(), array(  'label' => 'Guardar y volver al listado de alumnos',  'params' =>   array(  ),  'class_suffix' => 'save_and_list',)) ?>
  <?php endif; ?>
</ul>
