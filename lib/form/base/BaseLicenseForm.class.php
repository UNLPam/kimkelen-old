<?php

/**
 * License form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseLicenseForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'       => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'license_type_id' => new sfWidgetFormPropelChoice(array('model' => 'LicenseType', 'add_empty' => true)),
      'date_from'       => new sfWidgetFormDate(),
      'date_to'         => new sfWidgetFormDate(),
      'observation'     => new sfWidgetFormTextarea(),
      'is_active'       => new sfWidgetFormInputCheckbox(),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'person_id'       => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'license_type_id' => new sfValidatorPropelChoice(array('model' => 'LicenseType', 'column' => 'id', 'required' => false)),
      'date_from'       => new sfValidatorDate(),
      'date_to'         => new sfValidatorDate(array('required' => false)),
      'observation'     => new sfValidatorString(array('required' => false)),
      'is_active'       => new sfValidatorBoolean(array('required' => false)),
      'id'              => new sfValidatorPropelChoice(array('model' => 'License', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('license[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'License';
  }


}
