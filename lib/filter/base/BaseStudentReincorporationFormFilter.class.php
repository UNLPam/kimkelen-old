<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentReincorporation filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentReincorporationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
      'student_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'reincorporation_days'         => new sfWidgetFormFilterInput(),
      'course_subject_id'            => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'observation'                  => new sfWidgetFormFilterInput(),
      'created_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYearPeriod', 'column' => 'id')),
      'student_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'reincorporation_days'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'course_subject_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'observation'                  => new sfValidatorPass(array('required' => false)),
      'created_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('student_reincorporation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentReincorporation';
  }

  public function getFields()
  {
    return array(
      'career_school_year_period_id' => 'ForeignKey',
      'student_id'                   => 'ForeignKey',
      'reincorporation_days'         => 'Number',
      'course_subject_id'            => 'ForeignKey',
      'observation'                  => 'Text',
      'created_at'                   => 'Date',
      'id'                           => 'Number',
    );
  }
}
