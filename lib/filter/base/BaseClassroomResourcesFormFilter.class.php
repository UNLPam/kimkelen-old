<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ClassroomResources filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseClassroomResourcesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'resource_id'  => new sfWidgetFormPropelChoice(array('model' => 'Resources', 'add_empty' => true)),
      'classroom_id' => new sfWidgetFormPropelChoice(array('model' => 'Classroom', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'resource_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Resources', 'column' => 'id')),
      'classroom_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Classroom', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('classroom_resources_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClassroomResources';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'resource_id'  => 'ForeignKey',
      'classroom_id' => 'ForeignKey',
    );
  }
}
