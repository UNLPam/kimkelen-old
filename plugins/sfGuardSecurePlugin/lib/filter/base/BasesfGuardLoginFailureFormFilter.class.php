<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * sfGuardLoginFailure filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
class BasesfGuardLoginFailureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'   => new sfWidgetFormFilterInput(),
      'ip_address' => new sfWidgetFormFilterInput(),
      'cookie_id'  => new sfWidgetFormFilterInput(),
      'failed_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'username'   => new sfValidatorPass(array('required' => false)),
      'ip_address' => new sfValidatorPass(array('required' => false)),
      'cookie_id'  => new sfValidatorPass(array('required' => false)),
      'failed_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_login_failure_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardLoginFailure';
  }

  public function getFields()
  {
    return array(
      'username'   => 'Text',
      'ip_address' => 'Text',
      'cookie_id'  => 'Text',
      'failed_at'  => 'Date',
      'id'         => 'Number',
    );
  }
}
