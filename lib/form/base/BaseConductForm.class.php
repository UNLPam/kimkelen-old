<?php

/**
 * Conduct form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseConductForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'short_name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Conduct', 'column' => 'id', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'short_name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('conduct[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Conduct';
  }


}
