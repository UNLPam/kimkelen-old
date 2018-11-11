<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CareerYearConfiguration filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCareerYearConfigurationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'subject_configuration_id'  => new sfWidgetFormPropelChoice(array('model' => 'SubjectConfiguration', 'add_empty' => true)),
      'course_type'               => new sfWidgetFormFilterInput(),
      'year'                      => new sfWidgetFormFilterInput(),
      'has_max_absence_by_period' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'max_absences'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'subject_configuration_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SubjectConfiguration', 'column' => 'id')),
      'course_type'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'has_max_absence_by_period' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'max_absences'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('career_year_configuration_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerYearConfiguration';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'subject_configuration_id'  => 'ForeignKey',
      'course_type'               => 'Number',
      'year'                      => 'Number',
      'has_max_absence_by_period' => 'Boolean',
      'max_absences'              => 'Number',
    );
  }
}
