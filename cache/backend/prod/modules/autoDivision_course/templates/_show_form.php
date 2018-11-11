<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php include_partial('division_course/show_form_actions', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
              <?php foreach ($configuration->getFormFields($form, 'show') as $fieldset => $fields): ?>
        <?php include_partial('division_course/show_form_fieldset', array('course' => $course, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
      <?php endforeach; ?>
        <?php include_partial('division_course/show_form_actions', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>

