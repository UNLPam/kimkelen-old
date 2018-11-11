<?php

/**
 * SchoolYearStudent form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseSchoolYearStudentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'student_id'     => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
      'shift_id'       => new sfWidgetFormPropelChoice(array('model' => 'Shift', 'add_empty' => false)),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'SchoolYearStudent', 'column' => 'id', 'required' => false)),
      'student_id'     => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'school_year_id' => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
      'shift_id'       => new sfValidatorPropelChoice(array('model' => 'Shift', 'column' => 'id')),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SchoolYearStudent', 'column' => array('student_id', 'school_year_id')))
    );

    $this->widgetSchema->setNameFormat('school_year_student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SchoolYearStudent';
  }


}
