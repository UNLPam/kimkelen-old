<li class="sf_admin_batch_actions_choice">
  <select id="<?php echo isset($select_id)?$select_id.'_':'' ?>batch_action" name="<?php echo isset($select_id)?$select_id.'_':'' ?>batch_action" onchange="$('batch_action').value = $('<?php echo isset($select_id)?$select_id.'_':'' ?>batch_action').options[$('<?php echo isset($select_id)?$select_id.'_':'' ?>batch_action').selectedIndex].value;">
    <option value=""><?php echo __('Choose an action', array(), 'sf_admin') ?></option>
    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<option value="batchRegisterForCareer"><?php echo __('Career inscriptions', array(), 'sf_admin') ?></option>
<?php endif; ?>

    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<option value="batchRegisterForCurrentSchoolYear"><?php echo __('Administrar matrícula', array(), 'sf_admin') ?></option>
<?php endif; ?>

    <?php if ($sf_user->hasCredential(array(  0 => 'edit_student',))): ?>
<option value="batchDelete"><?php echo __('Delete', array(), 'sf_admin') ?></option>
<?php endif; ?>

  </select>
  <?php $form = new sfForm(); if ($form->isCSRFProtected()): ?>
    <input type="hidden" name="<?php echo $form->getCSRFFieldName() ?>" value="<?php echo $form->getCSRFToken() ?>" />
  <?php endif; ?>
  <input type="submit" name="_<?php echo (isset($select_id)?$select_id.'_':'').'batch_action' ?>" value="<?php echo __('go', array(), 'sf_admin') ?>" onclick="if (!$('<?php echo isset($select_id)?$select_id.'_':'' ?>batch_action').getValue()) return false;"  />
</li>
