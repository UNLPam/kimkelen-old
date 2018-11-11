<td class="sf_admin_text sf_admin_list_td_person_lastname">
  <?php echo $teacher->getPersonLastname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_person_firstname">
  <?php echo $teacher->getPersonFirstname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_person_full_identification">
  <?php echo $teacher->getPersonFullIdentification() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_person_is_active">
  <?php echo get_partial('teacher/list_field_boolean', array('value' => $teacher->getPersonIsActive())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_person_is_in_license">
  <?php echo get_partial('teacher/list_field_boolean', array('value' => $teacher->getPersonIsInLicense())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_person_sf_guard_user">
  <?php echo $teacher->getPersonSfGuardUser() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_subjects">
  <?php echo get_partial('teacher/subjects', array('type' => 'list', 'teacher' => $teacher)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_phone">
  <?php echo $teacher->getPhone() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $teacher->getEmail() ?>
</td>
