<?php

/**
 * sfGuardPasswordPolicyHistory form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class BasesfGuardPasswordPolicyHistoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'   => new sfWidgetFormInput(),
      'algorithm'  => new sfWidgetFormInput(),
      'salt'       => new sfWidgetFormInput(),
      'password'   => new sfWidgetFormInput(),
      'changed_at' => new sfWidgetFormDateTime(),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'username'   => new sfValidatorString(array('max_length' => 128)),
      'algorithm'  => new sfValidatorString(array('max_length' => 128)),
      'salt'       => new sfValidatorString(array('max_length' => 128)),
      'password'   => new sfValidatorString(array('max_length' => 128)),
      'changed_at' => new sfValidatorDateTime(),
      'id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardPasswordPolicyHistory', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'sfGuardPasswordPolicyHistory', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('sf_guard_password_policy_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardPasswordPolicyHistory';
  }


}
