<?php

/**
 * CareerYearConfiguration form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerYearConfigurationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'subject_configuration_id'  => new sfWidgetFormPropelChoice(array('model' => 'SubjectConfiguration', 'add_empty' => false)),
      'course_type'               => new sfWidgetFormInput(),
      'year'                      => new sfWidgetFormInput(),
      'has_max_absence_by_period' => new sfWidgetFormInputCheckbox(),
      'max_absences'              => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorPropelChoice(array('model' => 'CareerYearConfiguration', 'column' => 'id', 'required' => false)),
      'subject_configuration_id'  => new sfValidatorPropelChoice(array('model' => 'SubjectConfiguration', 'column' => 'id')),
      'course_type'               => new sfValidatorInteger(array('required' => false)),
      'year'                      => new sfValidatorInteger(),
      'has_max_absence_by_period' => new sfValidatorBoolean(array('required' => false)),
      'max_absences'              => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('career_year_configuration[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerYearConfiguration';
  }


}
