<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ExaminationRepproved filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseExaminationRepprovedFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'               => new sfWidgetFormFilterInput(),
      'date_from'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_to'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'examination_number' => new sfWidgetFormFilterInput(),
      'examination_type'   => new sfWidgetFormFilterInput(),
      'school_year_id'     => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'               => new sfValidatorPass(array('required' => false)),
      'date_from'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_to'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'examination_number' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'examination_type'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'school_year_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('examination_repproved_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExaminationRepproved';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'name'               => 'Text',
      'date_from'          => 'Date',
      'date_to'            => 'Date',
      'examination_number' => 'Number',
      'examination_type'   => 'Number',
      'school_year_id'     => 'ForeignKey',
    );
  }
}
