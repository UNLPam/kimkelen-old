<?php

/**
 * TentativeRepprovedStudent form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseTentativeRepprovedStudentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'student_career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentCareerSchoolYear', 'add_empty' => false)),
      'is_deleted'                    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'TentativeRepprovedStudent', 'column' => 'id', 'required' => false)),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
      'student_career_school_year_id' => new sfValidatorPropelChoice(array('model' => 'StudentCareerSchoolYear', 'column' => 'id')),
      'is_deleted'                    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tentative_repproved_student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TentativeRepprovedStudent';
  }


}
