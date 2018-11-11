<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php include_partial('shared_course/show_form_actions', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                      <fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', 'curso') ?>">
                  <h2><?php echo __('Curso') ?></h2>
                          <?php slot('sf_admin.current_show_course_show_tabs') ?>
                      <?php echo get_partial('shared_course/course_show_tabs', array('type' => 'list', 'course' => $course)) ?>
                    <?php end_slot(); ?>
          <?php include_slot('sf_admin.current_show_course_show_tabs') ?>                </fieldset>
              <?php include_partial('shared_course/show_form_actions', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>

