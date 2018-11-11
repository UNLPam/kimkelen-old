<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * sfGuardUserProfile filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BasesfGuardUserProfileFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'               => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'first_name'            => new sfWidgetFormFilterInput(),
      'last_name'             => new sfWidgetFormFilterInput(),
      'identification_type'   => new sfWidgetFormFilterInput(),
      'identification_number' => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'phone'                 => new sfWidgetFormFilterInput(),
      'observations'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'first_name'            => new sfValidatorPass(array('required' => false)),
      'last_name'             => new sfValidatorPass(array('required' => false)),
      'identification_type'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'identification_number' => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'phone'                 => new sfValidatorPass(array('required' => false)),
      'observations'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'user_id'               => 'ForeignKey',
      'first_name'            => 'Text',
      'last_name'             => 'Text',
      'identification_type'   => 'Number',
      'identification_number' => 'Text',
      'email'                 => 'Text',
      'phone'                 => 'Text',
      'observations'          => 'Text',
    );
  }
}
