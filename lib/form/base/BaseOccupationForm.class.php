<?php

/**
 * Occupation form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseOccupationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorPropelChoice(array('model' => 'Occupation', 'column' => 'id', 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 256)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Occupation', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('occupation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Occupation';
  }


}
