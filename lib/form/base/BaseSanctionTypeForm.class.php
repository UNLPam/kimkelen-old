<?php

/**
 * SanctionType form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseSanctionTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'name'                      => new sfWidgetFormInput(),
      'considered_in_report_card' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorPropelChoice(array('model' => 'SanctionType', 'column' => 'id', 'required' => false)),
      'name'                      => new sfValidatorString(array('max_length' => 255)),
      'considered_in_report_card' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SanctionType', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('sanction_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SanctionType';
  }


}
