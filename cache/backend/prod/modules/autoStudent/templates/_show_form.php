<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php include_partial('student/show_form_actions', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                      <fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', 'alumno') ?>">
                  <h2><?php echo __('Alumno') ?></h2>
                          <?php slot('sf_admin.current_show_student_show_tabs') ?>
                      <?php echo get_partial('student/student_show_tabs', array('type' => 'list', 'student' => $student)) ?>
                    <?php end_slot(); ?>
          <?php include_slot('sf_admin.current_show_student_show_tabs') ?>                </fieldset>
              <?php include_partial('student/show_form_actions', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>

