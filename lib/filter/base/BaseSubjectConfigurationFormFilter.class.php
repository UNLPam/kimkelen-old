<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SubjectConfiguration filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseSubjectConfigurationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                                                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'course_marks'                                               => new sfWidgetFormFilterInput(),
      'final_examination_required'                                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'course_required'                                            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'course_minimun_mark'                                        => new sfWidgetFormFilterInput(),
      'course_examination_count'                                   => new sfWidgetFormFilterInput(),
      'max_previous'                                               => new sfWidgetFormFilterInput(),
      'evaluation_method'                                          => new sfWidgetFormFilterInput(),
      'course_type'                                                => new sfWidgetFormFilterInput(),
      'attendance_type'                                            => new sfWidgetFormFilterInput(),
      'max_disciplinary_sanctions'                                 => new sfWidgetFormFilterInput(),
      'when_disapprove_show_string'                                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'necessary_student_approved_career_subject_to_show_prom_def' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'created_at'                                                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'course_marks'                                               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'final_examination_required'                                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'course_required'                                            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'course_minimun_mark'                                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'course_examination_count'                                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_previous'                                               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'evaluation_method'                                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'course_type'                                                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'attendance_type'                                            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_disciplinary_sanctions'                                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'when_disapprove_show_string'                                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'necessary_student_approved_career_subject_to_show_prom_def' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('subject_configuration_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubjectConfiguration';
  }

  public function getFields()
  {
    return array(
      'id'                                                         => 'Number',
      'created_at'                                                 => 'Date',
      'course_marks'                                               => 'Number',
      'final_examination_required'                                 => 'Boolean',
      'course_required'                                            => 'Boolean',
      'course_minimun_mark'                                        => 'Number',
      'course_examination_count'                                   => 'Number',
      'max_previous'                                               => 'Number',
      'evaluation_method'                                          => 'Number',
      'course_type'                                                => 'Number',
      'attendance_type'                                            => 'Number',
      'max_disciplinary_sanctions'                                 => 'Number',
      'when_disapprove_show_string'                                => 'Boolean',
      'necessary_student_approved_career_subject_to_show_prom_def' => 'Boolean',
    );
  }
}
