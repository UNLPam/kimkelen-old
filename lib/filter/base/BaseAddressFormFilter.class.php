<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Address filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseAddressFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'state_id' => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => true)),
      'city_id'  => new sfWidgetFormPropelChoice(array('model' => 'City', 'add_empty' => true)),
      'street'   => new sfWidgetFormFilterInput(),
      'number'   => new sfWidgetFormFilterInput(),
      'floor'    => new sfWidgetFormFilterInput(),
      'flat'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'state_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'State', 'column' => 'id')),
      'city_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'City', 'column' => 'id')),
      'street'   => new sfValidatorPass(array('required' => false)),
      'number'   => new sfValidatorPass(array('required' => false)),
      'floor'    => new sfValidatorPass(array('required' => false)),
      'flat'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('address_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Address';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'state_id' => 'ForeignKey',
      'city_id'  => 'ForeignKey',
      'street'   => 'Text',
      'number'   => 'Text',
      'floor'    => 'Text',
      'flat'     => 'Text',
    );
  }
}
