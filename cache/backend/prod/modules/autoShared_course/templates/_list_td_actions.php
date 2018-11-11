<td>
  <ul class="sf_admin_td_actions">
  <?php $disabled_actions=array(); ?>
  <?php echo $helper->linkToEdit($course, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>  <?php echo $helper->linkToDelete($course, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>  <?php echo $helper->linkToShow($course, array(  'params' =>   array(  ),  'class_suffix' => 'show',  'label' => 'Show',)) ?>  </ul>
  <?php echo $helper->getDisabledActions($disabled_actions); ?>
</td>

