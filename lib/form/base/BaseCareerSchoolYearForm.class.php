<?php

/**
 * CareerSchoolYear form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerSchoolYearForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'school_year_id'           => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
      'career_id'                => new sfWidgetFormPropelChoice(array('model' => 'Career', 'add_empty' => false)),
      'subject_configuration_id' => new sfWidgetFormPropelChoice(array('model' => 'SubjectConfiguration', 'add_empty' => false)),
      'is_processed'             => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYear', 'column' => 'id', 'required' => false)),
      'school_year_id'           => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
      'career_id'                => new sfValidatorPropelChoice(array('model' => 'Career', 'column' => 'id')),
      'subject_configuration_id' => new sfValidatorPropelChoice(array('model' => 'SubjectConfiguration', 'column' => 'id')),
      'is_processed'             => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CareerSchoolYear', 'column' => array('school_year_id', 'career_id')))
    );

    $this->widgetSchema->setNameFormat('career_school_year[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerSchoolYear';
  }


}
