<?php

/**
 * Pathway form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BasePathwayForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInput(),
      'school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Pathway', 'column' => 'id', 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'school_year_id' => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pathway[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pathway';
  }


}
