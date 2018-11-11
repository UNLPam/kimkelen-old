<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Career filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCareerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'file_number_sequence' => new sfWidgetFormFilterInput(),
      'plan_name'            => new sfWidgetFormFilterInput(),
      'quantity_years'       => new sfWidgetFormFilterInput(),
      'career_name'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'file_number_sequence' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'plan_name'            => new sfValidatorPass(array('required' => false)),
      'quantity_years'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'career_name'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('career_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Career';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'created_at'           => 'Date',
      'file_number_sequence' => 'Number',
      'plan_name'            => 'Text',
      'quantity_years'       => 'Number',
      'career_name'          => 'Text',
    );
  }
}
