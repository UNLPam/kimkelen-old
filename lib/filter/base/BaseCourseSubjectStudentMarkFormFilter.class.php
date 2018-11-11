<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubjectStudentMark filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectStudentMarkFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'course_subject_student_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => true)),
      'mark_number'               => new sfWidgetFormFilterInput(),
      'mark'                      => new sfWidgetFormFilterInput(),
      'is_closed'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_free'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'course_subject_student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubjectStudent', 'column' => 'id')),
      'mark_number'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mark'                      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_closed'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_free'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('course_subject_student_mark_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudentMark';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'created_at'                => 'Date',
      'course_subject_student_id' => 'ForeignKey',
      'mark_number'               => 'Number',
      'mark'                      => 'Number',
      'is_closed'                 => 'Boolean',
      'is_free'                   => 'Boolean',
    );
  }
}
