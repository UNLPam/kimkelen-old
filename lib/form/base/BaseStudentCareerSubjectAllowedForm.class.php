<?php

/**
 * StudentCareerSubjectAllowed form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentCareerSubjectAllowedForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'career_subject_id' => new sfWidgetFormInputHidden(),
      'student_id'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'StudentCareerSubjectAllowed', 'column' => 'id', 'required' => false)),
      'career_subject_id' => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'column' => 'id', 'required' => false)),
      'student_id'        => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'StudentCareerSubjectAllowed', 'column' => array('career_subject_id', 'student_id')))
    );

    $this->widgetSchema->setNameFormat('student_career_subject_allowed[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentCareerSubjectAllowed';
  }


}
