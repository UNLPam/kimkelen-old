<?php

/**
 * StudentApprovedCourseSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentApprovedCourseSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                 => new sfWidgetFormInputHidden(),
      'created_at'                         => new sfWidgetFormDateTime(),
      'updated_at'                         => new sfWidgetFormDateTime(),
      'course_subject_id'                  => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => false)),
      'student_id'                         => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'school_year_id'                     => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
      'student_approved_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'add_empty' => true)),
      'mark'                               => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                                 => new sfValidatorPropelChoice(array('model' => 'StudentApprovedCourseSubject', 'column' => 'id', 'required' => false)),
      'created_at'                         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                         => new sfValidatorDateTime(array('required' => false)),
      'course_subject_id'                  => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id')),
      'student_id'                         => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'school_year_id'                     => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
      'student_approved_career_subject_id' => new sfValidatorPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'column' => 'id', 'required' => false)),
      'mark'                               => new sfValidatorNumber(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'StudentApprovedCourseSubject', 'column' => array('course_subject_id', 'student_id', 'school_year_id')))
    );

    $this->widgetSchema->setNameFormat('student_approved_course_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentApprovedCourseSubject';
  }


}
