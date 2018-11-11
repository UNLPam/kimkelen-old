<?php

/**
 * ExaminationRepprovedSubjectTeacher form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseExaminationRepprovedSubjectTeacherForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'examination_repproved_subject_id' => new sfWidgetFormInputHidden(),
      'teacher_id'                       => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'ExaminationRepprovedSubjectTeacher', 'column' => 'id', 'required' => false)),
      'examination_repproved_subject_id' => new sfValidatorPropelChoice(array('model' => 'ExaminationRepprovedSubject', 'column' => 'id', 'required' => false)),
      'teacher_id'                       => new sfValidatorPropelChoice(array('model' => 'Teacher', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('examination_repproved_subject_teacher[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExaminationRepprovedSubjectTeacher';
  }


}
