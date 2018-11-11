<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Correlative filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCorrelativeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'career_subject_id'             => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => true)),
      'correlative_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'career_subject_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubject', 'column' => 'id')),
      'correlative_career_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubject', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('correlative_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Correlative';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'created_at'                    => 'Date',
      'career_subject_id'             => 'ForeignKey',
      'correlative_career_subject_id' => 'ForeignKey',
    );
  }
}
