<?php

/**
 * CareerSubjectSchoolYearTag form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerSubjectSchoolYearTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'career_subject_school_year_id' => new sfWidgetFormInputHidden(),
      'tag_id'                        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'career_subject_school_year_id' => new sfValidatorPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'column' => 'id', 'required' => false)),
      'tag_id'                        => new sfValidatorPropelChoice(array('model' => 'Tag', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('career_subject_school_year_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerSubjectSchoolYearTag';
  }


}
