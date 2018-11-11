<?php if ($form->isNew()): ?>
  <?php slot('"actions"') ?>
      <?php end_slot() ?>
<?php else: ?>
  <?php slot('"actions"') ?>
      <?php end_slot() ?>
<?php endif ?>
