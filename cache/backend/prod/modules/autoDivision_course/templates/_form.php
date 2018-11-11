<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@division_course', array('id' => 'sf_admin_edit_form', 'onsubmit' => "return disableFurtherSubmit(this)")) ?>
    <?php include_partial('division_course/form_actions', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  
    <?php echo $form->renderHiddenFields() ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('division_course/form_fieldset', array('course' => $course, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>

    <?php include_partial('division_course/form_actions', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
