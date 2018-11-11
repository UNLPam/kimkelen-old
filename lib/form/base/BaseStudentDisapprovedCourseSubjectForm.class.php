<?php

/**
 * StudentDisapprovedCourseSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentDisapprovedCourseSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                 => new sfWidgetFormInputHidden(),
      'course_subject_student_id'          => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => false)),
      'examination_number'                 => new sfWidgetFormInput(),
      'student_approved_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                                 => new sfValidatorPropelChoice(array('model' => 'StudentDisapprovedCourseSubject', 'column' => 'id', 'required' => false)),
      'course_subject_student_id'          => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudent', 'column' => 'id')),
      'examination_number'                 => new sfValidatorInteger(array('required' => false)),
      'student_approved_career_subject_id' => new sfValidatorPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_disapproved_course_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentDisapprovedCourseSubject';
  }


}
