<?php

/**
 * JustificationType form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseJustificationTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormInput(),
      'id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorString(array('max_length' => 255)),
      'id'   => new sfValidatorPropelChoice(array('model' => 'JustificationType', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'JustificationType', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('justification_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'JustificationType';
  }


}
