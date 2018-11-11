<?php

/**
 * StudentStudy form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentStudyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'study_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'StudentStudy', 'column' => 'id', 'required' => false)),
      'student_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'study_id'   => new sfValidatorPropelChoice(array('model' => 'Study', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_study[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentStudy';
  }


}
