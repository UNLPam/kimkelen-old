<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubjectStudentExamination filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectStudentExaminationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'course_subject_student_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubjectStudent', 'add_empty' => true)),
      'examination_subject_id'    => new sfWidgetFormPropelChoice(array('model' => 'ExaminationSubject', 'add_empty' => true)),
      'mark'                      => new sfWidgetFormFilterInput(),
      'is_absent'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'examination_number'        => new sfWidgetFormFilterInput(),
      'can_take_examination'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'folio_number'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'course_subject_student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubjectStudent', 'column' => 'id')),
      'examination_subject_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ExaminationSubject', 'column' => 'id')),
      'mark'                      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_absent'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'examination_number'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'can_take_examination'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'folio_number'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('course_subject_student_examination_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudentExamination';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'course_subject_student_id' => 'ForeignKey',
      'examination_subject_id'    => 'ForeignKey',
      'mark'                      => 'Number',
      'is_absent'                 => 'Boolean',
      'examination_number'        => 'Number',
      'can_take_examination'      => 'Boolean',
      'date'                      => 'Date',
      'folio_number'              => 'Text',
    );
  }
}
