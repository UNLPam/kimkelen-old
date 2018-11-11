<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SchoolYearStudent filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseSchoolYearStudentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'     => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
      'shift_id'       => new sfWidgetFormPropelChoice(array('model' => 'Shift', 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'student_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'school_year_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
      'shift_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Shift', 'column' => 'id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('school_year_student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SchoolYearStudent';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'student_id'     => 'ForeignKey',
      'school_year_id' => 'ForeignKey',
      'shift_id'       => 'ForeignKey',
      'created_at'     => 'Date',
    );
  }
}
