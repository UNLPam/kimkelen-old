<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@teacher', array('id' => 'sf_admin_edit_form', 'onsubmit' => "return disableFurtherSubmit(this)")) ?>
    <?php include_partial('teacher/form_actions', array('teacher' => $teacher, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  
    <?php echo $form->renderHiddenFields() ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('teacher/form_fieldset', array('teacher' => $teacher, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

    <?php include_partial('teacher/form_actions', array('teacher' => $teacher, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
