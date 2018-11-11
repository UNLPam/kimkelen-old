<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Subject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(),
      'fantasy_name' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'name'         => new sfValidatorPass(array('required' => false)),
      'fantasy_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subject';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'created_at'   => 'Date',
      'name'         => 'Text',
      'fantasy_name' => 'Text',
    );
  }
}
