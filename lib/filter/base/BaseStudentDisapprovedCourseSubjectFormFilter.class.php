<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentDisapprovedCourseSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentDisapprovedCourseSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'course_subject_student_id'          => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => true)),
      'examination_number'                 => new sfWidgetFormFilterInput(),
      'student_approved_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'course_subject_student_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubjectStudent', 'column' => 'id')),
      'examination_number'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'student_approved_career_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentApprovedCareerSubject', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_disapproved_course_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentDisapprovedCourseSubject';
  }

  public function getFields()
  {
    return array(
      'id'                                 => 'Number',
      'course_subject_student_id'          => 'ForeignKey',
      'examination_number'                 => 'Number',
      'student_approved_career_subject_id' => 'ForeignKey',
    );
  }
}
