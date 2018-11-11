<li class="sf_admin_all_batch_actions_choice">
  <select id="all_batch_action" name="all_batch_action">
    <option value=""><?php echo __('Choose an action to be applied to all results', array(), 'sf_admin') ?></option>
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
  <input type="submit" value="<?php echo __('go', array(), 'sf_admin') ?>" onclick="confirm('<?php echo __("This could take a while. Are you sure?", array(), 'sf_admin') ?>')"/>
</li>
