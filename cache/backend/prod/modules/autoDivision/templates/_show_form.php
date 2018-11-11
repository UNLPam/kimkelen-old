<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php include_partial('division/show_form_actions', array('division' => $division, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                      <fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', 'none') ?>">
                          <?php slot('sf_admin.current_show_division_show_tabs') ?>
                      <?php echo get_partial('division/division_show_tabs', array('type' => 'list', 'division' => $division)) ?>
                    <?php end_slot(); ?>
          <?php include_slot('sf_admin.current_show_division_show_tabs') ?>                </fieldset>
              <?php include_partial('division/show_form_actions', array('division' => $division, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>

