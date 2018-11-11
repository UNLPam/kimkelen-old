<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * AbsenceType filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseAbsenceTypeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'value'       => new sfWidgetFormFilterInput(),
      'method'      => new sfWidgetFormFilterInput(),
      'order'       => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'value'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'method'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'order'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('absence_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AbsenceType';
  }

  public function getFields()
  {
    return array(
      'name'        => 'Text',
      'value'       => 'Number',
      'method'      => 'Number',
      'order'       => 'Number',
      'description' => 'Text',
      'id'          => 'Number',
    );
  }
}
