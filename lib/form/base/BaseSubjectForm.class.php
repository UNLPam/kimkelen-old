<?php

/**
 * Subject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'created_at'   => new sfWidgetFormDateTime(),
      'name'         => new sfWidgetFormInput(),
      'fantasy_name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Subject', 'column' => 'id', 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'fantasy_name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Subject', 'column' => array('name', 'fantasy_name')))
    );

    $this->widgetSchema->setNameFormat('subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subject';
  }


}
