<?php

/**
 * Address form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseAddressForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'state_id' => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => true)),
      'city_id'  => new sfWidgetFormPropelChoice(array('model' => 'City', 'add_empty' => true)),
      'street'   => new sfWidgetFormInput(),
      'number'   => new sfWidgetFormInput(),
      'floor'    => new sfWidgetFormInput(),
      'flat'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'Address', 'column' => 'id', 'required' => false)),
      'state_id' => new sfValidatorPropelChoice(array('model' => 'State', 'column' => 'id', 'required' => false)),
      'city_id'  => new sfValidatorPropelChoice(array('model' => 'City', 'column' => 'id', 'required' => false)),
      'street'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'number'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'floor'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'flat'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('address[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Address';
  }


}
