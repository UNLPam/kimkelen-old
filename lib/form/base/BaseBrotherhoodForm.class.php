<?php

/**
 * Brotherhood form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseBrotherhoodForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'brother_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Brotherhood', 'column' => 'id', 'required' => false)),
      'student_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id', 'required' => false)),
      'brother_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('brotherhood[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Brotherhood';
  }


}
