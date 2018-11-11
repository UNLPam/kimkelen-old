<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentApprovedCareerSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentApprovedCareerSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => true)),
      'student_id'        => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'school_year_id'    => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
      'mark'              => new sfWidgetFormFilterInput(),
      'is_equivalence'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'career_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubject', 'column' => 'id')),
      'student_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'school_year_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
      'mark'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_equivalence'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('student_approved_career_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentApprovedCareerSubject';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'career_subject_id' => 'ForeignKey',
      'student_id'        => 'ForeignKey',
      'school_year_id'    => 'ForeignKey',
      'mark'              => 'Number',
      'is_equivalence'    => 'Boolean',
    );
  }
}
