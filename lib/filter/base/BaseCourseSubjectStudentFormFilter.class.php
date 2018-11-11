<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubjectStudent filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectStudentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'course_subject_id'                  => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'student_id'                         => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'student_approved_course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCourseSubject', 'add_empty' => true)),
      'is_not_averageable'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'created_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'course_subject_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'student_id'                         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'student_approved_course_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentApprovedCourseSubject', 'column' => 'id')),
      'is_not_averageable'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('course_subject_student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudent';
  }

  public function getFields()
  {
    return array(
      'id'                                 => 'Number',
      'created_at'                         => 'Date',
      'course_subject_id'                  => 'ForeignKey',
      'student_id'                         => 'ForeignKey',
      'student_approved_course_subject_id' => 'ForeignKey',
      'is_not_averageable'                 => 'Boolean',
    );
  }
}
