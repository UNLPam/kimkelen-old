<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubjectStudentPathway filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectStudentPathwayFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'         => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'course_subject_id'  => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'mark'               => new sfWidgetFormFilterInput(),
      'approval_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'pathway_student_id' => new sfWidgetFormPropelChoice(array('model' => 'PathwayStudent', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'student_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'course_subject_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'mark'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'approval_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'pathway_student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PathwayStudent', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('course_subject_student_pathway_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudentPathway';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'student_id'         => 'ForeignKey',
      'course_subject_id'  => 'ForeignKey',
      'mark'               => 'Number',
      'approval_date'      => 'Date',
      'pathway_student_id' => 'ForeignKey',
    );
  }
}
