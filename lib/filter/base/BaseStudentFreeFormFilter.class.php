<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentFree filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentFreeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
      'career_school_year_id'        => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => true)),
      'course_subject_id'            => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'is_free'                      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'student_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYearPeriod', 'column' => 'id')),
      'career_school_year_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYear', 'column' => 'id')),
      'course_subject_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'is_free'                      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('student_free_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentFree';
  }

  public function getFields()
  {
    return array(
      'student_id'                   => 'ForeignKey',
      'career_school_year_period_id' => 'ForeignKey',
      'career_school_year_id'        => 'ForeignKey',
      'course_subject_id'            => 'ForeignKey',
      'is_free'                      => 'Boolean',
      'id'                           => 'Number',
    );
  }
}
