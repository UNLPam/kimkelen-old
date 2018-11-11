<?php

/**
 * ClassroomResources form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseClassroomResourcesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'resource_id'  => new sfWidgetFormPropelChoice(array('model' => 'Resources', 'add_empty' => false)),
      'classroom_id' => new sfWidgetFormPropelChoice(array('model' => 'Classroom', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'ClassroomResources', 'column' => 'id', 'required' => false)),
      'resource_id'  => new sfValidatorPropelChoice(array('model' => 'Resources', 'column' => 'id')),
      'classroom_id' => new sfValidatorPropelChoice(array('model' => 'Classroom', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('classroom_resources[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClassroomResources';
  }


}
