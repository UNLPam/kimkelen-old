<?php

/**
 * City form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCityForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'zip_code' => new sfWidgetFormInput(),
      'name'     => new sfWidgetFormInput(),
      'state_id' => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'City', 'column' => 'id', 'required' => false)),
      'zip_code' => new sfValidatorString(array('max_length' => 255)),
      'name'     => new sfValidatorString(array('max_length' => 255)),
      'state_id' => new sfValidatorPropelChoice(array('model' => 'State', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('city[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'City';
  }


}
