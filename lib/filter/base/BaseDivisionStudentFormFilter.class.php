<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DivisionStudent filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseDivisionStudentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'  => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'division_id' => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'student_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'division_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Division', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('division_student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DivisionStudent';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'student_id'  => 'ForeignKey',
      'division_id' => 'ForeignKey',
    );
  }
}
