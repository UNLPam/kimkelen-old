<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DivisionPreceptor filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseDivisionPreceptorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'preceptor_id' => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => true)),
      'division_id'  => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'preceptor_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Personal', 'column' => 'id')),
      'division_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Division', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('division_preceptor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DivisionPreceptor';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'preceptor_id' => 'ForeignKey',
      'division_id'  => 'ForeignKey',
    );
  }
}
