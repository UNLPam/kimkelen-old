<?php

/**
 * StudentTutor form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentTutorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'tutor_id'   => new sfWidgetFormPropelChoice(array('model' => 'Tutor', 'add_empty' => true)),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'StudentTutor', 'column' => 'id', 'required' => false)),
      'tutor_id'   => new sfValidatorPropelChoice(array('model' => 'Tutor', 'column' => 'id', 'required' => false)),
      'student_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_tutor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentTutor';
  }


}
