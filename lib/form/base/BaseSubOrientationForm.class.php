<?php

/**
 * SubOrientation form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseSubOrientationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInput(),
      'orientation_id' => new sfWidgetFormPropelChoice(array('model' => 'Orientation', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'SubOrientation', 'column' => 'id', 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 255)),
      'orientation_id' => new sfValidatorPropelChoice(array('model' => 'Orientation', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sub_orientation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubOrientation';
  }


}
