<?php

/**
 * OptionalCareerSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseOptionalCareerSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                   => new sfWidgetFormInputHidden(),
      'career_subject_school_year_id'        => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => false)),
      'choice_career_subject_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                                   => new sfValidatorPropelChoice(array('model' => 'OptionalCareerSubject', 'column' => 'id', 'required' => false)),
      'career_subject_school_year_id'        => new sfValidatorPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
      'choice_career_subject_school_year_id' => new sfValidatorPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'OptionalCareerSubject', 'column' => array('career_subject_school_year_id', 'choice_career_subject_school_year_id')))
    );

    $this->widgetSchema->setNameFormat('optional_career_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'OptionalCareerSubject';
  }


}
