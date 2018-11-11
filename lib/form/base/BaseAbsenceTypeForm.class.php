<?php

/**
 * AbsenceType form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseAbsenceTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormInput(),
      'value'       => new sfWidgetFormInput(),
      'method'      => new sfWidgetFormInput(),
      'order'       => new sfWidgetFormInput(),
      'description' => new sfWidgetFormTextarea(),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'value'       => new sfValidatorNumber(),
      'method'      => new sfValidatorInteger(),
      'order'       => new sfValidatorInteger(),
      'description' => new sfValidatorString(array('required' => false)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'AbsenceType', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('absence_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AbsenceType';
  }


}
