<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Personal filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BasePersonalFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'         => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'salary'            => new sfWidgetFormFilterInput(),
      'aging_institution' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'file_number'       => new sfWidgetFormFilterInput(),
      'personal_type'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'person_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'salary'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'aging_institution' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'file_number'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'personal_type'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('personal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Personal';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'person_id'         => 'ForeignKey',
      'salary'            => 'Number',
      'aging_institution' => 'Date',
      'file_number'       => 'Number',
      'personal_type'     => 'Number',
    );
  }
}
