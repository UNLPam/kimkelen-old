<?php

/**
 * StudentAttendanceJustification form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentAttendanceJustificationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'justification_type_id' => new sfWidgetFormPropelChoice(array('model' => 'JustificationType', 'add_empty' => false)),
      'observation'           => new sfWidgetFormTextarea(),
      'document'              => new sfWidgetFormInput(),
      'id'                    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'justification_type_id' => new sfValidatorPropelChoice(array('model' => 'JustificationType', 'column' => 'id')),
      'observation'           => new sfValidatorString(array('required' => false)),
      'document'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'                    => new sfValidatorPropelChoice(array('model' => 'StudentAttendanceJustification', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_attendance_justification[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentAttendanceJustification';
  }


}
