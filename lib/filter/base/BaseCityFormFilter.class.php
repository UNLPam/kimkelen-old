<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * City filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCityFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'zip_code' => new sfWidgetFormFilterInput(),
      'name'     => new sfWidgetFormFilterInput(),
      'state_id' => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'zip_code' => new sfValidatorPass(array('required' => false)),
      'name'     => new sfValidatorPass(array('required' => false)),
      'state_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'State', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('city_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'City';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'zip_code' => 'Text',
      'name'     => 'Text',
      'state_id' => 'ForeignKey',
    );
  }
}
