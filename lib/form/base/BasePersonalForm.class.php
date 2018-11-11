<?php

/**
 * Personal form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BasePersonalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'person_id'         => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'salary'            => new sfWidgetFormInput(),
      'aging_institution' => new sfWidgetFormDate(),
      'file_number'       => new sfWidgetFormInput(),
      'personal_type'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Personal', 'column' => 'id', 'required' => false)),
      'person_id'         => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'salary'            => new sfValidatorNumber(array('required' => false)),
      'aging_institution' => new sfValidatorDate(array('required' => false)),
      'file_number'       => new sfValidatorInteger(array('required' => false)),
      'personal_type'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('personal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Personal';
  }


}
