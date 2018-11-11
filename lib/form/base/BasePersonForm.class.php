<?php

/**
 * Person form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BasePersonForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'lastname'              => new sfWidgetFormInput(),
      'firstname'             => new sfWidgetFormInput(),
      'identification_type'   => new sfWidgetFormInput(),
      'identification_number' => new sfWidgetFormInput(),
      'sex'                   => new sfWidgetFormInput(),
      'cuil'                  => new sfWidgetFormInput(),
      'is_active'             => new sfWidgetFormInputCheckbox(),
      'email'                 => new sfWidgetFormInput(),
      'phone'                 => new sfWidgetFormInput(),
      'birthdate'             => new sfWidgetFormDate(),
      'birth_country'         => new sfWidgetFormInput(),
      'birth_state'           => new sfWidgetFormInput(),
      'birth_city'            => new sfWidgetFormInput(),
      'observations'          => new sfWidgetFormTextarea(),
      'civil_status'          => new sfWidgetFormInput(),
      'address_id'            => new sfWidgetFormPropelChoice(array('model' => 'Address', 'add_empty' => true)),
      'user_id'               => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'photo'                 => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'lastname'              => new sfValidatorString(array('max_length' => 255)),
      'firstname'             => new sfValidatorString(array('max_length' => 255)),
      'identification_type'   => new sfValidatorInteger(array('required' => false)),
      'identification_number' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'sex'                   => new sfValidatorInteger(),
      'cuil'                  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'is_active'             => new sfValidatorBoolean(array('required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'birthdate'             => new sfValidatorDate(array('required' => false)),
      'birth_country'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'birth_state'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'birth_city'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observations'          => new sfValidatorString(array('required' => false)),
      'civil_status'          => new sfValidatorInteger(array('required' => false)),
      'address_id'            => new sfValidatorPropelChoice(array('model' => 'Address', 'column' => 'id', 'required' => false)),
      'user_id'               => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'photo'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }


}
