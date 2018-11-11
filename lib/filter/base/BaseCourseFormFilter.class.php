<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Course filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'starts_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'name'                => new sfWidgetFormFilterInput(),
      'quota'               => new sfWidgetFormFilterInput(),
      'school_year_id'      => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
      'division_id'         => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'related_division_id' => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'is_closed'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'current_period'      => new sfWidgetFormFilterInput(),
      'is_pathway'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'starts_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'name'                => new sfValidatorPass(array('required' => false)),
      'quota'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'school_year_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
      'division_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Division', 'column' => 'id')),
      'related_division_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Division', 'column' => 'id')),
      'is_closed'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'current_period'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_pathway'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('course_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Course';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'starts_at'           => 'Date',
      'name'                => 'Text',
      'quota'               => 'Number',
      'school_year_id'      => 'ForeignKey',
      'division_id'         => 'ForeignKey',
      'related_division_id' => 'ForeignKey',
      'is_closed'           => 'Boolean',
      'current_period'      => 'Number',
      'is_pathway'          => 'Boolean',
    );
  }
}
