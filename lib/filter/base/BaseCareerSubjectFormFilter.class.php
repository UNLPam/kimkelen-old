<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CareerSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCareerSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'career_id'                           => new sfWidgetFormPropelChoice(array('model' => 'Career', 'add_empty' => true)),
      'subject_id'                          => new sfWidgetFormPropelChoice(array('model' => 'Subject', 'add_empty' => true)),
      'year'                                => new sfWidgetFormFilterInput(),
      'has_options'                         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_option'                           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'orientation_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Orientation', 'add_empty' => true)),
      'sub_orientation_id'                  => new sfWidgetFormPropelChoice(array('model' => 'SubOrientation', 'add_empty' => true)),
      'has_correlative_previous_year'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'student_career_subject_allowed_list' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'career_id'                           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Career', 'column' => 'id')),
      'subject_id'                          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Subject', 'column' => 'id')),
      'year'                                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'has_options'                         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_option'                           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'orientation_id'                      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Orientation', 'column' => 'id')),
      'sub_orientation_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SubOrientation', 'column' => 'id')),
      'has_correlative_previous_year'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'student_career_subject_allowed_list' => new sfValidatorPropelChoice(array('model' => 'Student', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('career_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(StudentCareerSubjectAllowedPeer::CAREER_SUBJECT_ID, CareerSubjectPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(StudentCareerSubjectAllowedPeer::STUDENT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(StudentCareerSubjectAllowedPeer::STUDENT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'CareerSubject';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'created_at'                          => 'Date',
      'career_id'                           => 'ForeignKey',
      'subject_id'                          => 'ForeignKey',
      'year'                                => 'Number',
      'has_options'                         => 'Boolean',
      'is_option'                           => 'Boolean',
      'orientation_id'                      => 'ForeignKey',
      'sub_orientation_id'                  => 'ForeignKey',
      'has_correlative_previous_year'       => 'Boolean',
      'student_career_subject_allowed_list' => 'ManyKey',
    );
  }
}
