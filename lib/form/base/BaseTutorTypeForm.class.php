<?php

/**
 * TutorType form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseTutorTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorPropelChoice(array('model' => 'TutorType', 'column' => 'id', 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TutorType', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('tutor_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TutorType';
  }


}
