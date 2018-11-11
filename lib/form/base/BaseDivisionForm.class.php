<?php

/**
 * Division form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseDivisionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'division_title_id'     => new sfWidgetFormPropelChoice(array('model' => 'DivisionTitle', 'add_empty' => false)),
      'career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => false)),
      'shift_id'              => new sfWidgetFormPropelChoice(array('model' => 'Shift', 'add_empty' => false)),
      'year'                  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id', 'required' => false)),
      'division_title_id'     => new sfValidatorPropelChoice(array('model' => 'DivisionTitle', 'column' => 'id')),
      'career_school_year_id' => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYear', 'column' => 'id')),
      'shift_id'              => new sfValidatorPropelChoice(array('model' => 'Shift', 'column' => 'id')),
      'year'                  => new sfValidatorInteger(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Division', 'column' => array('division_title_id', 'career_school_year_id', 'year')))
    );

    $this->widgetSchema->setNameFormat('division[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Division';
  }


}
