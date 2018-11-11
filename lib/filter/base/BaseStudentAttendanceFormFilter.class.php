<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentAttendance filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentAttendanceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'career_school_year_id'               => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => true)),
      'student_id'                          => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'day'                                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'absence_type_id'                     => new sfWidgetFormPropelChoice(array('model' => 'AbsenceType', 'add_empty' => true)),
      'value'                               => new sfWidgetFormFilterInput(),
      'course_subject_id'                   => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'student_attendance_justification_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentAttendanceJustification', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'career_school_year_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYear', 'column' => 'id')),
      'student_id'                          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'day'                                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'absence_type_id'                     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AbsenceType', 'column' => 'id')),
      'value'                               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'course_subject_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'student_attendance_justification_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentAttendanceJustification', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_attendance_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentAttendance';
  }

  public function getFields()
  {
    return array(
      'career_school_year_id'               => 'ForeignKey',
      'student_id'                          => 'ForeignKey',
      'day'                                 => 'Date',
      'absence_type_id'                     => 'ForeignKey',
      'value'                               => 'Number',
      'course_subject_id'                   => 'ForeignKey',
      'student_attendance_justification_id' => 'ForeignKey',
      'id'                                  => 'Number',
    );
  }
}
