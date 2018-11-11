<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentCareerSchoolYearConduct filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentCareerSchoolYearConductFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'student_career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentCareerSchoolYear', 'add_empty' => true)),
      'conduct_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Conduct', 'add_empty' => true)),
      'career_school_year_period_id'  => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'student_career_school_year_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentCareerSchoolYear', 'column' => 'id')),
      'conduct_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Conduct', 'column' => 'id')),
      'career_school_year_period_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYearPeriod', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_career_school_year_conduct_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentCareerSchoolYearConduct';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'created_at'                    => 'Date',
      'student_career_school_year_id' => 'ForeignKey',
      'conduct_id'                    => 'ForeignKey',
      'career_school_year_period_id'  => 'ForeignKey',
    );
  }
}
