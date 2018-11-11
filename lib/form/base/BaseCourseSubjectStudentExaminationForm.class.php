<?php

/**
 * CourseSubjectStudentExamination form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectStudentExaminationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'course_subject_student_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => false)),
      'examination_subject_id'    => new sfWidgetFormPropelChoice(array('model' => 'ExaminationSubject', 'add_empty' => true)),
      'mark'                      => new sfWidgetFormInput(),
      'is_absent'                 => new sfWidgetFormInputCheckbox(),
      'examination_number'        => new sfWidgetFormInput(),
      'can_take_examination'      => new sfWidgetFormInputCheckbox(),
      'date'                      => new sfWidgetFormDate(),
      'folio_number'              => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudentExamination', 'column' => 'id', 'required' => false)),
      'course_subject_student_id' => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudent', 'column' => 'id')),
      'examination_subject_id'    => new sfValidatorPropelChoice(array('model' => 'ExaminationSubject', 'column' => 'id', 'required' => false)),
      'mark'                      => new sfValidatorNumber(array('required' => false)),
      'is_absent'                 => new sfValidatorBoolean(array('required' => false)),
      'examination_number'        => new sfValidatorInteger(),
      'can_take_examination'      => new sfValidatorBoolean(array('required' => false)),
      'date'                      => new sfValidatorDate(array('required' => false)),
      'folio_number'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CourseSubjectStudentExamination', 'column' => array('course_subject_student_id', 'examination_subject_id', 'examination_number')))
    );

    $this->widgetSchema->setNameFormat('course_subject_student_examination[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudentExamination';
  }


}
