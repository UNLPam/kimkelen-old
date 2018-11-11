<?php

/**
 * StudentRepprovedCourseSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentRepprovedCourseSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                 => new sfWidgetFormInputHidden(),
      'created_at'                         => new sfWidgetFormDateTime(),
      'updated_at'                         => new sfWidgetFormDateTime(),
      'course_subject_student_id'          => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => false)),
      'student_approved_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                                 => new sfValidatorPropelChoice(array('model' => 'StudentRepprovedCourseSubject', 'column' => 'id', 'required' => false)),
      'created_at'                         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                         => new sfValidatorDateTime(array('required' => false)),
      'course_subject_student_id'          => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudent', 'column' => 'id')),
      'student_approved_career_subject_id' => new sfValidatorPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_repproved_course_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentRepprovedCourseSubject';
  }


}
