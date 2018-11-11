<?php

/**
 * CareerSchoolYearPeriod form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerSchoolYearPeriodForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'name'                         => new sfWidgetFormInput(),
      'short_name'                   => new sfWidgetFormInput(),
      'career_school_year_id'        => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => false)),
      'start_at'                     => new sfWidgetFormDate(),
      'end_at'                       => new sfWidgetFormDate(),
      'is_closed'                    => new sfWidgetFormInputCheckbox(),
      'course_type'                  => new sfWidgetFormInput(),
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
      'max_absences'                 => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'column' => 'id', 'required' => false)),
      'name'                         => new sfValidatorString(array('max_length' => 255)),
      'short_name'                   => new sfValidatorString(array('max_length' => 255)),
      'career_school_year_id'        => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYear', 'column' => 'id')),
      'start_at'                     => new sfValidatorDate(),
      'end_at'                       => new sfValidatorDate(),
      'is_closed'                    => new sfValidatorBoolean(array('required' => false)),
      'course_type'                  => new sfValidatorInteger(array('required' => false)),
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'column' => 'id', 'required' => false)),
      'max_absences'                 => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('career_school_year_period[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerSchoolYearPeriod';
  }


}
