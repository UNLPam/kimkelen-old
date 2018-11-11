<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SubOrientation filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseSubOrientationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(),
      'orientation_id' => new sfWidgetFormPropelChoice(array('model' => 'Orientation', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'orientation_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Orientation', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sub_orientation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubOrientation';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'orientation_id' => 'ForeignKey',
    );
  }
}
