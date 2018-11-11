<?php

/**
 * HeadPersonalPersonal form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseHeadPersonalPersonalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'head_personal_id' => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => true)),
      'personal_id'      => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'HeadPersonalPersonal', 'column' => 'id', 'required' => false)),
      'head_personal_id' => new sfValidatorPropelChoice(array('model' => 'Personal', 'column' => 'id', 'required' => false)),
      'personal_id'      => new sfValidatorPropelChoice(array('model' => 'Personal', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'HeadPersonalPersonal', 'column' => array('head_personal_id', 'personal_id')))
    );

    $this->widgetSchema->setNameFormat('head_personal_personal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'HeadPersonalPersonal';
  }


}
