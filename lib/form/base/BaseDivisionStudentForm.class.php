<?php

/**
 * DivisionStudent form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseDivisionStudentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'student_id'  => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'division_id' => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'DivisionStudent', 'column' => 'id', 'required' => false)),
      'student_id'  => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'division_id' => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DivisionStudent', 'column' => array('student_id', 'division_id')))
    );

    $this->widgetSchema->setNameFormat('division_student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DivisionStudent';
  }


}
