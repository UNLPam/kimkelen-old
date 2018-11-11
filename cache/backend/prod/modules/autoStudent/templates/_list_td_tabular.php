<td class="sf_admin_text sf_admin_list_td_person_lastname">
  <?php echo $student->getPersonLastname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_person_firstname">
  <?php echo $student->getPersonFirstname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_person_full_identification">
  <?php echo $student->getPersonFullIdentification() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_person_is_active">
  <?php echo get_partial('student/list_field_boolean', array('value' => $student->getPersonIsActive())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_person_sf_guard_user">
  <?php echo $student->getPersonSfGuardUser() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_is_registered">
  <?php echo get_partial('student/is_registered', array('type' => 'list', 'student' => $student)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_careers">
  <?php echo get_partial('student/careers', array('type' => 'list', 'student' => $student)) ?>
</td>
