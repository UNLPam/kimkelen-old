<?php

/**
 * ExaminationSubjectTeacher form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseExaminationSubjectTeacherForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'examination_subject_id' => new sfWidgetFormInputHidden(),
      'teacher_id'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'ExaminationSubjectTeacher', 'column' => 'id', 'required' => false)),
      'examination_subject_id' => new sfValidatorPropelChoice(array('model' => 'ExaminationSubject', 'column' => 'id', 'required' => false)),
      'teacher_id'             => new sfValidatorPropelChoice(array('model' => 'Teacher', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('examination_subject_teacher[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExaminationSubjectTeacher';
  }


}
