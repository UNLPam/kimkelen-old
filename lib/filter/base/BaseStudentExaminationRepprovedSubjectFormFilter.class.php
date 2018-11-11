<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentExaminationRepprovedSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentExaminationRepprovedSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_repproved_course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentRepprovedCourseSubject', 'add_empty' => true)),
      'examination_repproved_subject_id'    => new sfWidgetFormPropelChoice(array('model' => 'ExaminationRepprovedSubject', 'add_empty' => true)),
      'mark'                                => new sfWidgetFormFilterInput(),
      'is_absent'                           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date'                                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'folio_number'                        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'student_repproved_course_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentRepprovedCourseSubject', 'column' => 'id')),
      'examination_repproved_subject_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ExaminationRepprovedSubject', 'column' => 'id')),
      'mark'                                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_absent'                           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date'                                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'folio_number'                        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_examination_repproved_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentExaminationRepprovedSubject';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'student_repproved_course_subject_id' => 'ForeignKey',
      'examination_repproved_subject_id'    => 'ForeignKey',
      'mark'                                => 'Number',
      'is_absent'                           => 'Boolean',
      'date'                                => 'Date',
      'folio_number'                        => 'Text',
    );
  }
}
