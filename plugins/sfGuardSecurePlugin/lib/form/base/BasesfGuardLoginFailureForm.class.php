<?php

/**
 * sfGuardLoginFailure form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class BasesfGuardLoginFailureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'   => new sfWidgetFormInput(),
      'ip_address' => new sfWidgetFormInput(),
      'cookie_id'  => new sfWidgetFormInput(),
      'failed_at'  => new sfWidgetFormDateTime(),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'username'   => new sfValidatorString(array('max_length' => 128)),
      'ip_address' => new sfValidatorString(array('max_length' => 50)),
      'cookie_id'  => new sfValidatorString(array('max_length' => 255)),
      'failed_at'  => new sfValidatorDateTime(),
      'id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardLoginFailure', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_login_failure[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardLoginFailure';
  }


}
