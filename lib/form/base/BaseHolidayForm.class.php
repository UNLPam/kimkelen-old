<?php

/**
 * Holiday form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseHolidayForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'day'         => new sfWidgetFormDate(),
      'description' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Holiday', 'column' => 'id', 'required' => false)),
      'day'         => new sfValidatorDate(),
      'description' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('holiday[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Holiday';
  }


}
