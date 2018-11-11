<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CareerSchoolYearPeriod filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCareerSchoolYearPeriodFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                         => new sfWidgetFormFilterInput(),
      'short_name'                   => new sfWidgetFormFilterInput(),
      'career_school_year_id'        => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => true)),
      'start_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'end_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'is_closed'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'course_type'                  => new sfWidgetFormFilterInput(),
      'career_school_year_period_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
      'max_absences'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                         => new sfValidatorPass(array('required' => false)),
      'short_name'                   => new sfValidatorPass(array('required' => false)),
      'career_school_year_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYear', 'column' => 'id')),
      'start_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'end_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_closed'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'course_type'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'career_school_year_period_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYearPeriod', 'column' => 'id')),
      'max_absences'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('career_school_year_period_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerSchoolYearPeriod';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Number',
      'name'                         => 'Text',
      'short_name'                   => 'Text',
      'career_school_year_id'        => 'ForeignKey',
      'start_at'                     => 'Date',
      'end_at'                       => 'Date',
      'is_closed'                    => 'Boolean',
      'course_type'                  => 'Number',
      'career_school_year_period_id' => 'ForeignKey',
      'max_absences'                 => 'Number',
    );
  }
}
