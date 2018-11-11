<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentAttendanceJustification filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentAttendanceJustificationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'justification_type_id' => new sfWidgetFormPropelChoice(array('model' => 'JustificationType', 'add_empty' => true)),
      'observation'           => new sfWidgetFormFilterInput(),
      'document'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'justification_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'JustificationType', 'column' => 'id')),
      'observation'           => new sfValidatorPass(array('required' => false)),
      'document'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_attendance_justification_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentAttendanceJustification';
  }

  public function getFields()
  {
    return array(
      'justification_type_id' => 'ForeignKey',
      'observation'           => 'Text',
      'document'              => 'Text',
      'id'                    => 'Number',
    );
  }
}
