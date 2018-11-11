<?php

/**
 * CourseSubjectConfiguration form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectConfigurationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'course_subject_id'            => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'division_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
      'max_absence'                  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'CourseSubjectConfiguration', 'column' => 'id', 'required' => false)),
      'course_subject_id'            => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id', 'required' => false)),
      'division_id'                  => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id', 'required' => false)),
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'column' => 'id', 'required' => false)),
      'max_absence'                  => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('course_subject_configuration[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectConfiguration';
  }


}
