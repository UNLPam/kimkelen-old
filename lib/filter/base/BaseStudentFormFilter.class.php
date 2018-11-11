<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Student filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'global_file_number'                  => new sfWidgetFormFilterInput(),
      'order_of_merit'                      => new sfWidgetFormFilterInput(),
      'year_income'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'nationality'                         => new sfWidgetFormFilterInput(),
      'folio_number'                        => new sfWidgetFormFilterInput(),
      'person_id'                           => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'occupation_id'                       => new sfWidgetFormPropelChoice(array('model' => 'Occupation', 'add_empty' => true)),
      'busy_starts_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'busy_ends_at'                        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'blood_group'                         => new sfWidgetFormFilterInput(),
      'blood_factor'                        => new sfWidgetFormFilterInput(),
      'emergency_information'               => new sfWidgetFormFilterInput(),
      'health_coverage_id'                  => new sfWidgetFormPropelChoice(array('model' => 'HealthCoverage', 'add_empty' => true)),
      'origin_school'                       => new sfWidgetFormFilterInput(),
      'educational_dependency'              => new sfWidgetFormFilterInput(),
      'student_tag_list'                    => new sfWidgetFormPropelChoice(array('model' => 'Tag', 'add_empty' => true)),
      'student_career_subject_allowed_list' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'global_file_number'                  => new sfValidatorPass(array('required' => false)),
      'order_of_merit'                      => new sfValidatorPass(array('required' => false)),
      'year_income'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'nationality'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'folio_number'                        => new sfValidatorPass(array('required' => false)),
      'person_id'                           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'occupation_id'                       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Occupation', 'column' => 'id')),
      'busy_starts_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'busy_ends_at'                        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'blood_group'                         => new sfValidatorPass(array('required' => false)),
      'blood_factor'                        => new sfValidatorPass(array('required' => false)),
      'emergency_information'               => new sfValidatorPass(array('required' => false)),
      'health_coverage_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'HealthCoverage', 'column' => 'id')),
      'origin_school'                       => new sfValidatorPass(array('required' => false)),
      'educational_dependency'              => new sfValidatorPass(array('required' => false)),
      'student_tag_list'                    => new sfValidatorPropelChoice(array('model' => 'Tag', 'required' => false)),
      'student_career_subject_allowed_list' => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addStudentTagListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(StudentTagPeer::STUDENT_ID, StudentPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(StudentTagPeer::TAG_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(StudentTagPeer::TAG_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addStudentCareerSubjectAllowedListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(StudentCareerSubjectAllowedPeer::STUDENT_ID, StudentPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(StudentCareerSubjectAllowedPeer::CAREER_SUBJECT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(StudentCareerSubjectAllowedPeer::CAREER_SUBJECT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Student';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'global_file_number'                  => 'Text',
      'order_of_merit'                      => 'Text',
      'year_income'                         => 'Date',
      'nationality'                         => 'Number',
      'folio_number'                        => 'Text',
      'person_id'                           => 'ForeignKey',
      'occupation_id'                       => 'ForeignKey',
      'busy_starts_at'                      => 'Date',
      'busy_ends_at'                        => 'Date',
      'blood_group'                         => 'Text',
      'blood_factor'                        => 'Text',
      'emergency_information'               => 'Text',
      'health_coverage_id'                  => 'ForeignKey',
      'origin_school'                       => 'Text',
      'educational_dependency'              => 'Text',
      'student_tag_list'                    => 'ManyKey',
      'student_career_subject_allowed_list' => 'ManyKey',
    );
  }
}
