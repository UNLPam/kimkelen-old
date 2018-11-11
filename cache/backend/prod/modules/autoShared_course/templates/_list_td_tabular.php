<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($course->getId(), 'shared_course_edit', $course) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_starts_at">
  <?php echo false !== strtotime($course->getStartsAt()) ? format_date($course->getStartsAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $course->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_quota">
  <?php echo $course->getQuota() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_school_year_id">
  <?php echo $course->getSchoolYearId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_division_id">
  <?php echo $course->getDivisionId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_related_division_id">
  <?php echo $course->getRelatedDivisionId() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_closed">
  <?php echo get_partial('shared_course/list_field_boolean', array('value' => $course->getIsClosed())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_current_period">
  <?php echo $course->getCurrentPeriod() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_pathway">
  <?php echo get_partial('shared_course/list_field_boolean', array('value' => $course->getIsPathway())) ?>
</td>
