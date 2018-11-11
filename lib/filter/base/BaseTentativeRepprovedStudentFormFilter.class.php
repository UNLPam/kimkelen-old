<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * TentativeRepprovedStudent filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseTentativeRepprovedStudentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'student_career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentCareerSchoolYear', 'add_empty' => true)),
      'is_deleted'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'student_career_school_year_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'StudentCareerSchoolYear', 'column' => 'id')),
      'is_deleted'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('tentative_repproved_student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TentativeRepprovedStudent';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'created_at'                    => 'Date',
      'student_career_school_year_id' => 'ForeignKey',
      'is_deleted'                    => 'Boolean',
    );
  }
}
