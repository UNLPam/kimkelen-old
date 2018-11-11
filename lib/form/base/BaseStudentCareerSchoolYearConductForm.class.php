<?php

/**
 * StudentCareerSchoolYearConduct form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentCareerSchoolYearConductForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'student_career_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentCareerSchoolYear', 'add_empty' => false)),
      'conduct_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Conduct', 'add_empty' => false)),
      'career_school_year_period_id'  => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'StudentCareerSchoolYearConduct', 'column' => 'id', 'required' => false)),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
      'student_career_school_year_id' => new sfValidatorPropelChoice(array('model' => 'StudentCareerSchoolYear', 'column' => 'id')),
      'conduct_id'                    => new sfValidatorPropelChoice(array('model' => 'Conduct', 'column' => 'id')),
      'career_school_year_period_id'  => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYearPeriod', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'StudentCareerSchoolYearConduct', 'column' => array('student_career_school_year_id', 'career_school_year_period_id')))
    );

    $this->widgetSchema->setNameFormat('student_career_school_year_conduct[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentCareerSchoolYearConduct';
  }


}
