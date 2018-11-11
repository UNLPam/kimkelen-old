<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SchoolYear filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseSchoolYearFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'year'      => new sfWidgetFormFilterInput(),
      'is_active' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_closed' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'year'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_closed' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('school_year_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SchoolYear';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'year'      => 'Number',
      'is_active' => 'Boolean',
      'is_closed' => 'Boolean',
    );
  }
}
