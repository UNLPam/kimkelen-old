<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentApprovedCourseSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentApprovedCourseSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'course_subject_id'                  => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'student_id'                         => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'school_year_id'                     => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
      'student_approved_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'add_empty' => true)),
      'mark'                               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'course_subject_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'student_id'                         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'school_year_id'                     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
      'student_approved_career_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentApprovedCareerSubject', 'column' => 'id')),
      'mark'                               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('student_approved_course_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentApprovedCourseSubject';
  }

  public function getFields()
  {
    return array(
      'id'                                 => 'Number',
      'created_at'                         => 'Date',
      'updated_at'                         => 'Date',
      'course_subject_id'                  => 'ForeignKey',
      'student_id'                         => 'ForeignKey',
      'school_year_id'                     => 'ForeignKey',
      'student_approved_career_subject_id' => 'ForeignKey',
      'mark'                               => 'Number',
    );
  }
}
