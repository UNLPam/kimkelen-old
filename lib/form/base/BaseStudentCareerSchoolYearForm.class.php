<?php

/**
 * StudentCareerSchoolYear form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentCareerSchoolYearForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'created_at'            => new sfWidgetFormDateTime(),
      'career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => false)),
      'student_id'            => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'year'                  => new sfWidgetFormInput(),
      'status'                => new sfWidgetFormInput(),
      'is_processed'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'StudentCareerSchoolYear', 'column' => 'id', 'required' => false)),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
      'career_school_year_id' => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYear', 'column' => 'id')),
      'student_id'            => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'year'                  => new sfValidatorInteger(),
      'status'                => new sfValidatorInteger(array('required' => false)),
      'is_processed'          => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'StudentCareerSchoolYear', 'column' => array('career_school_year_id', 'student_id', 'year')))
    );

    $this->widgetSchema->setNameFormat('student_career_school_year[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentCareerSchoolYear';
  }


}
