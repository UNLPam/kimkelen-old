<ul class="sf_admin_actions">


  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Cancel',)) ?>
  </ul>
