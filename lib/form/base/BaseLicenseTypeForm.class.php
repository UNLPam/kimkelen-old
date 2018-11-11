<?php

/**
 * LicenseType form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseLicenseTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorPropelChoice(array('model' => 'LicenseType', 'column' => 'id', 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'LicenseType', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('license_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LicenseType';
  }


}
