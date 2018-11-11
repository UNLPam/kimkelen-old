<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentRepprovedCourseSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentRepprovedCourseSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'course_subject_student_id'          => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => true)),
      'student_approved_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'course_subject_student_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubjectStudent', 'column' => 'id')),
      'student_approved_career_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentApprovedCareerSubject', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_repproved_course_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentRepprovedCourseSubject';
  }

  public function getFields()
  {
    return array(
      'id'                                 => 'Number',
      'created_at'                         => 'Date',
      'updated_at'                         => 'Date',
      'course_subject_student_id'          => 'ForeignKey',
      'student_approved_career_subject_id' => 'ForeignKey',
    );
  }
}
