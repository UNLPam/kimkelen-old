<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * sfGuardPasswordPolicyHistory filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
class BasesfGuardPasswordPolicyHistoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'   => new sfWidgetFormFilterInput(),
      'algorithm'  => new sfWidgetFormFilterInput(),
      'salt'       => new sfWidgetFormFilterInput(),
      'password'   => new sfWidgetFormFilterInput(),
      'changed_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'username'   => new sfValidatorPass(array('required' => false)),
      'algorithm'  => new sfValidatorPass(array('required' => false)),
      'salt'       => new sfValidatorPass(array('required' => false)),
      'password'   => new sfValidatorPass(array('required' => false)),
      'changed_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_password_policy_history_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardPasswordPolicyHistory';
  }

  public function getFields()
  {
    return array(
      'username'   => 'Text',
      'algorithm'  => 'Text',
      'salt'       => 'Text',
      'password'   => 'Text',
      'changed_at' => 'Date',
      'id'         => 'Number',
    );
  }
}
