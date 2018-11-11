<?php

/**
 * StudentTag form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id' => new sfWidgetFormInputHidden(),
      'tag_id'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'student_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id', 'required' => false)),
      'tag_id'     => new sfValidatorPropelChoice(array('model' => 'Tag', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentTag';
  }


}
