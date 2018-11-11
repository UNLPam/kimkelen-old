<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BasesfGuardUserProfileForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'user_id'               => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'first_name'            => new sfWidgetFormInput(),
      'last_name'             => new sfWidgetFormInput(),
      'identification_type'   => new sfWidgetFormInput(),
      'identification_number' => new sfWidgetFormInput(),
      'email'                 => new sfWidgetFormInput(),
      'phone'                 => new sfWidgetFormInput(),
      'observations'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'sfGuardUserProfile', 'column' => 'id', 'required' => false)),
      'user_id'               => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'first_name'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'identification_type'   => new sfValidatorInteger(),
      'identification_number' => new sfValidatorString(array('max_length' => 20)),
      'email'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observations'          => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }


}
