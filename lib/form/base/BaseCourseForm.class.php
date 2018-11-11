<?php

/**
 * Course form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'starts_at'           => new sfWidgetFormDate(),
      'name'                => new sfWidgetFormInput(),
      'quota'               => new sfWidgetFormInput(),
      'school_year_id'      => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
      'division_id'         => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'related_division_id' => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'is_closed'           => new sfWidgetFormInputCheckbox(),
      'current_period'      => new sfWidgetFormInput(),
      'is_pathway'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'Course', 'column' => 'id', 'required' => false)),
      'starts_at'           => new sfValidatorDate(array('required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 255)),
      'quota'               => new sfValidatorInteger(array('required' => false)),
      'school_year_id'      => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
      'division_id'         => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id', 'required' => false)),
      'related_division_id' => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id', 'required' => false)),
      'is_closed'           => new sfValidatorBoolean(array('required' => false)),
      'current_period'      => new sfValidatorInteger(array('required' => false)),
      'is_pathway'          => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('course[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Course';
  }


}
