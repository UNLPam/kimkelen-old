<?php

/**
 * Situation_R form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseSituation_RForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorPropelChoice(array('model' => 'Situation_R', 'column' => 'id', 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 256)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Situation_R', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('situation_r[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Situation_R';
  }


}
