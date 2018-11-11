<?php

/**
 * DisciplinarySanctionType form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseDisciplinarySanctionTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorPropelChoice(array('model' => 'DisciplinarySanctionType', 'column' => 'id', 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DisciplinarySanctionType', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('disciplinary_sanction_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DisciplinarySanctionType';
  }


}
