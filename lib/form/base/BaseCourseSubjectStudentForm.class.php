<?php

/**
 * CourseSubjectStudent form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectStudentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                 => new sfWidgetFormInputHidden(),
      'created_at'                         => new sfWidgetFormDateTime(),
      'course_subject_id'                  => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => false)),
      'student_id'                         => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'student_approved_course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCourseSubject', 'add_empty' => true)),
      'is_not_averageable'                 => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                                 => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudent', 'column' => 'id', 'required' => false)),
      'created_at'                         => new sfValidatorDateTime(array('required' => false)),
      'course_subject_id'                  => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id')),
      'student_id'                         => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'student_approved_course_subject_id' => new sfValidatorPropelChoice(array('model' => 'StudentApprovedCourseSubject', 'column' => 'id', 'required' => false)),
      'is_not_averageable'                 => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CourseSubjectStudent', 'column' => array('course_subject_id', 'student_id')))
    );

    $this->widgetSchema->setNameFormat('course_subject_student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudent';
  }


}
