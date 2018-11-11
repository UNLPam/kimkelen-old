<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CareerSchoolYear filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCareerSchoolYearFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'school_year_id'           => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
      'career_id'                => new sfWidgetFormPropelChoice(array('model' => 'Career', 'add_empty' => true)),
      'subject_configuration_id' => new sfWidgetFormPropelChoice(array('model' => 'SubjectConfiguration', 'add_empty' => true)),
      'is_processed'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'school_year_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
      'career_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Career', 'column' => 'id')),
      'subject_configuration_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SubjectConfiguration', 'column' => 'id')),
      'is_processed'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('career_school_year_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerSchoolYear';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'school_year_id'           => 'ForeignKey',
      'career_id'                => 'ForeignKey',
      'subject_configuration_id' => 'ForeignKey',
      'is_processed'             => 'Boolean',
    );
  }
}
