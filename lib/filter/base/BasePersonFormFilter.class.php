<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Person filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BasePersonFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'lastname'              => new sfWidgetFormFilterInput(),
      'firstname'             => new sfWidgetFormFilterInput(),
      'identification_type'   => new sfWidgetFormFilterInput(),
      'identification_number' => new sfWidgetFormFilterInput(),
      'sex'                   => new sfWidgetFormFilterInput(),
      'cuil'                  => new sfWidgetFormFilterInput(),
      'is_active'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'email'                 => new sfWidgetFormFilterInput(),
      'phone'                 => new sfWidgetFormFilterInput(),
      'birthdate'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'birth_country'         => new sfWidgetFormFilterInput(),
      'birth_state'           => new sfWidgetFormFilterInput(),
      'birth_city'            => new sfWidgetFormFilterInput(),
      'observations'          => new sfWidgetFormFilterInput(),
      'civil_status'          => new sfWidgetFormFilterInput(),
      'address_id'            => new sfWidgetFormPropelChoice(array('model' => 'Address', 'add_empty' => true)),
      'user_id'               => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'photo'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'lastname'              => new sfValidatorPass(array('required' => false)),
      'firstname'             => new sfValidatorPass(array('required' => false)),
      'identification_type'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'identification_number' => new sfValidatorPass(array('required' => false)),
      'sex'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cuil'                  => new sfValidatorPass(array('required' => false)),
      'is_active'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'phone'                 => new sfValidatorPass(array('required' => false)),
      'birthdate'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'birth_country'         => new sfValidatorPass(array('required' => false)),
      'birth_state'           => new sfValidatorPass(array('required' => false)),
      'birth_city'            => new sfValidatorPass(array('required' => false)),
      'observations'          => new sfValidatorPass(array('required' => false)),
      'civil_status'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Address', 'column' => 'id')),
      'user_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'photo'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('person_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'lastname'              => 'Text',
      'firstname'             => 'Text',
      'identification_type'   => 'Number',
      'identification_number' => 'Text',
      'sex'                   => 'Number',
      'cuil'                  => 'Text',
      'is_active'             => 'Boolean',
      'email'                 => 'Text',
      'phone'                 => 'Text',
      'birthdate'             => 'Date',
      'birth_country'         => 'Text',
      'birth_state'           => 'Text',
      'birth_city'            => 'Text',
      'observations'          => 'Text',
      'civil_status'          => 'Number',
      'address_id'            => 'ForeignKey',
      'user_id'               => 'ForeignKey',
      'photo'                 => 'Text',
    );
  }
}
