<?php

/**
 * CourseSubjectStudentMark form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectStudentMarkForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'created_at'                => new sfWidgetFormDateTime(),
      'course_subject_student_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => false)),
      'mark_number'               => new sfWidgetFormInput(),
      'mark'                      => new sfWidgetFormInput(),
      'is_closed'                 => new sfWidgetFormInputCheckbox(),
      'is_free'                   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudentMark', 'column' => 'id', 'required' => false)),
      'created_at'                => new sfValidatorDateTime(array('required' => false)),
      'course_subject_student_id' => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudent', 'column' => 'id')),
      'mark_number'               => new sfValidatorInteger(),
      'mark'                      => new sfValidatorNumber(array('required' => false)),
      'is_closed'                 => new sfValidatorBoolean(array('required' => false)),
      'is_free'                   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('course_subject_student_mark[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudentMark';
  }


}
