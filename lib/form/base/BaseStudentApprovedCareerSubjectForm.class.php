<?php

/**
 * StudentApprovedCareerSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentApprovedCareerSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => false)),
      'student_id'        => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'school_year_id'    => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
      'mark'              => new sfWidgetFormInput(),
      'is_equivalence'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'StudentApprovedCareerSubject', 'column' => 'id', 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'career_subject_id' => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'column' => 'id')),
      'student_id'        => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'school_year_id'    => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
      'mark'              => new sfValidatorNumber(array('required' => false)),
      'is_equivalence'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'StudentApprovedCareerSubject', 'column' => array('career_subject_id', 'student_id', 'school_year_id')))
    );

    $this->widgetSchema->setNameFormat('student_approved_career_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentApprovedCareerSubject';
  }


}
