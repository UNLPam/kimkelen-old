<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * HeadPersonalPersonal filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseHeadPersonalPersonalFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'head_personal_id' => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => true)),
      'personal_id'      => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'head_personal_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Personal', 'column' => 'id')),
      'personal_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Personal', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('head_personal_personal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'HeadPersonalPersonal';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'head_personal_id' => 'ForeignKey',
      'personal_id'      => 'ForeignKey',
    );
  }
}
