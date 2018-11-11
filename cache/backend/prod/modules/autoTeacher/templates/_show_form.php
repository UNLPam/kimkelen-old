<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php include_partial('teacher/show_form_actions', array('teacher' => $teacher, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                      <fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', 'datos personales') ?>">
                  <h2><?php echo __('Datos personales') ?></h2>
                          <?php slot('sf_admin.current_show_person') ?>
                      <?php echo get_partial('teacher/person', array('type' => 'list', 'teacher' => $teacher)) ?>
                    <?php end_slot(); ?>
          <?php include_slot('sf_admin.current_show_person') ?>                </fieldset>
              <?php include_partial('teacher/show_form_actions', array('teacher' => $teacher, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>

