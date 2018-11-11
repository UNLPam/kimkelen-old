<?php

/**
 * StudentFree form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentFreeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
      'career_school_year_id'        => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => true)),
      'course_subject_id'            => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'is_free'                      => new sfWidgetFormInputCheckbox(),
      'id'                           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'student_id'                   => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'column' => 'id', 'required' => false)),
      'career_school_year_id'        => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYear', 'column' => 'id', 'required' => false)),
      'course_subject_id'            => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id', 'required' => false)),
      'is_free'                      => new sfValidatorBoolean(array('required' => false)),
      'id'                           => new sfValidatorPropelChoice(array('model' => 'StudentFree', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_free[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentFree';
  }


}
