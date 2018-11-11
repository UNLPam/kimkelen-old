<td colspan="1">
  <?php echo __('<div class=\'info_div\'><strong>%%name%%</strong><div class=\'info_div\'><em><strong>Año lectivo:</strong> %%school_year%% </em></div><div class=\'info_div\'><em><strong>Carrera:</strong> %%career_school_year%%</em></div><div class=\'info_div\'>%%division_info%%</div>', array('%%name%%' => $division->getName(), '%%school_year%%' => $division->getSchoolYear(), '%%career_school_year%%' => $division->getCareerSchoolYear(), '%%division_info%%' => get_partial('division/division_info', array('type' => 'list', 'division' => $division))), 'messages') ?>
</td>
