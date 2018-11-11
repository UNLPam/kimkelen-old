<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * License filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseLicenseFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'       => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'license_type_id' => new sfWidgetFormPropelChoice(array('model' => 'LicenseType', 'add_empty' => true)),
      'date_from'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_to'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'observation'     => new sfWidgetFormFilterInput(),
      'is_active'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'person_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'license_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'LicenseType', 'column' => 'id')),
      'date_from'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_to'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'observation'     => new sfValidatorPass(array('required' => false)),
      'is_active'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('license_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'License';
  }

  public function getFields()
  {
    return array(
      'person_id'       => 'ForeignKey',
      'license_type_id' => 'ForeignKey',
      'date_from'       => 'Date',
      'date_to'         => 'Date',
      'observation'     => 'Text',
      'is_active'       => 'Boolean',
      'id'              => 'Number',
    );
  }
}
