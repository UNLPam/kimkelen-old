<?php

/**
 * StudentReincorporation form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentReincorporationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => false)),
      'student_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'reincorporation_days'         => new sfWidgetFormInput(),
      'course_subject_id'            => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'observation'                  => new sfWidgetFormTextarea(),
      'created_at'                   => new sfWidgetFormDateTime(),
      'id'                           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'column' => 'id')),
      'student_id'                   => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'reincorporation_days'         => new sfValidatorInteger(),
      'course_subject_id'            => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id', 'required' => false)),
      'observation'                  => new sfValidatorString(array('required' => false)),
      'created_at'                   => new sfValidatorDateTime(array('required' => false)),
      'id'                           => new sfValidatorPropelChoice(array('model' => 'StudentReincorporation', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_reincorporation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentReincorporation';
  }


}
