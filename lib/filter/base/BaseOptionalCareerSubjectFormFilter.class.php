<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * OptionalCareerSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseOptionalCareerSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'career_subject_school_year_id'        => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => true)),
      'choice_career_subject_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'career_subject_school_year_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
      'choice_career_subject_school_year_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('optional_career_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'OptionalCareerSubject';
  }

  public function getFields()
  {
    return array(
      'id'                                   => 'Number',
      'career_subject_school_year_id'        => 'ForeignKey',
      'choice_career_subject_school_year_id' => 'ForeignKey',
    );
  }
}
