<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Division filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseDivisionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'division_title_id'     => new sfWidgetFormPropelChoice(array('model' => 'DivisionTitle', 'add_empty' => true)),
      'career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => true)),
      'shift_id'              => new sfWidgetFormPropelChoice(array('model' => 'Shift', 'add_empty' => true)),
      'year'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'division_title_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DivisionTitle', 'column' => 'id')),
      'career_school_year_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYear', 'column' => 'id')),
      'shift_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Shift', 'column' => 'id')),
      'year'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('division_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Division';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'division_title_id'     => 'ForeignKey',
      'career_school_year_id' => 'ForeignKey',
      'shift_id'              => 'ForeignKey',
      'year'                  => 'Number',
    );
  }
}
