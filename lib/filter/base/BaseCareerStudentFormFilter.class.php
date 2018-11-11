<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CareerStudent filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCareerStudentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'career_id'                       => new sfWidgetFormPropelChoice(array('model' => 'Career', 'add_empty' => true)),
      'student_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'orientation_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Orientation', 'add_empty' => true)),
      'sub_orientation_id'              => new sfWidgetFormPropelChoice(array('model' => 'SubOrientation', 'add_empty' => true)),
      'orientation_change_observations' => new sfWidgetFormFilterInput(),
      'start_year'                      => new sfWidgetFormFilterInput(),
      'file_number'                     => new sfWidgetFormFilterInput(),
      'status'                          => new sfWidgetFormFilterInput(),
      'graduation_school_year_id'       => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'career_id'                       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Career', 'column' => 'id')),
      'student_id'                      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'orientation_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Orientation', 'column' => 'id')),
      'sub_orientation_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SubOrientation', 'column' => 'id')),
      'orientation_change_observations' => new sfValidatorPass(array('required' => false)),
      'start_year'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'file_number'                     => new sfValidatorPass(array('required' => false)),
      'status'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'graduation_school_year_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('career_student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerStudent';
  }

  public function getFields()
  {
    return array(
      'id'                              => 'Number',
      'created_at'                      => 'Date',
      'career_id'                       => 'ForeignKey',
      'student_id'                      => 'ForeignKey',
      'orientation_id'                  => 'ForeignKey',
      'sub_orientation_id'              => 'ForeignKey',
      'orientation_change_observations' => 'Text',
      'start_year'                      => 'Number',
      'file_number'                     => 'Text',
      'status'                          => 'Number',
      'graduation_school_year_id'       => 'ForeignKey',
    );
  }
}
