<?php

/**
 * State form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'country_id' => new sfWidgetFormPropelChoice(array('model' => 'Country', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'State', 'column' => 'id', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'country_id' => new sfValidatorPropelChoice(array('model' => 'Country', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('state[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'State';
  }


}
