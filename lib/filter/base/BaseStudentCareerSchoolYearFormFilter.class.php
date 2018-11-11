<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentCareerSchoolYear filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentCareerSchoolYearFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => true)),
      'student_id'            => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'year'                  => new sfWidgetFormFilterInput(),
      'status'                => new sfWidgetFormFilterInput(),
      'is_processed'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'career_school_year_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYear', 'column' => 'id')),
      'student_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'year'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_processed'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('student_career_school_year_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentCareerSchoolYear';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'created_at'            => 'Date',
      'career_school_year_id' => 'ForeignKey',
      'student_id'            => 'ForeignKey',
      'year'                  => 'Number',
      'status'                => 'Number',
      'is_processed'          => 'Boolean',
    );
  }
}
