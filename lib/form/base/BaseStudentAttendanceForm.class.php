<?php

/**
 * StudentAttendance form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentAttendanceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'career_school_year_id'               => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => false)),
      'student_id'                          => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'day'                                 => new sfWidgetFormDate(),
      'absence_type_id'                     => new sfWidgetFormPropelChoice(array('model' => 'AbsenceType', 'add_empty' => true)),
      'value'                               => new sfWidgetFormInput(),
      'course_subject_id'                   => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'student_attendance_justification_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentAttendanceJustification', 'add_empty' => true)),
      'id'                                  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'career_school_year_id'               => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYear', 'column' => 'id')),
      'student_id'                          => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'day'                                 => new sfValidatorDate(),
      'absence_type_id'                     => new sfValidatorPropelChoice(array('model' => 'AbsenceType', 'column' => 'id', 'required' => false)),
      'value'                               => new sfValidatorNumber(array('required' => false)),
      'course_subject_id'                   => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id', 'required' => false)),
      'student_attendance_justification_id' => new sfValidatorPropelChoice(array('model' => 'StudentAttendanceJustification', 'column' => 'id', 'required' => false)),
      'id'                                  => new sfValidatorPropelChoice(array('model' => 'StudentAttendance', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'StudentAttendance', 'column' => array('student_id', 'day', 'course_subject_id')))
    );

    $this->widgetSchema->setNameFormat('student_attendance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentAttendance';
  }


}
