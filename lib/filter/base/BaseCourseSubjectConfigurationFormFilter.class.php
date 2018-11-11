<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubjectConfiguration filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectConfigurationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'course_subject_id'            => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'division_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
      'max_absence'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'course_subject_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'division_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Division', 'column' => 'id')),
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYearPeriod', 'column' => 'id')),
      'max_absence'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('course_subject_configuration_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectConfiguration';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Number',
      'course_subject_id'            => 'ForeignKey',
      'division_id'                  => 'ForeignKey',
      'career_school_year_period_id' => 'ForeignKey',
      'max_absence'                  => 'Number',
    );
  }
}
