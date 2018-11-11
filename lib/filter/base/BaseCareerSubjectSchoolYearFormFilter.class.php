<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CareerSubjectSchoolYear filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCareerSubjectSchoolYearFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'career_school_year_id'               => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => true)),
      'career_subject_id'                   => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => true)),
      'subject_configuration_id'            => new sfWidgetFormPropelChoice(array('model' => 'SubjectConfiguration', 'add_empty' => true)),
      'index_sort'                          => new sfWidgetFormFilterInput(),
      'career_subject_school_year_tag_list' => new sfWidgetFormPropelChoice(array('model' => 'Tag', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'career_school_year_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSchoolYear', 'column' => 'id')),
      'career_subject_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubject', 'column' => 'id')),
      'subject_configuration_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SubjectConfiguration', 'column' => 'id')),
      'index_sort'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'career_subject_school_year_tag_list' => new sfValidatorPropelChoice(array('model' => 'Tag', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('career_subject_school_year_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCareerSubjectSchoolYearTagListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CareerSubjectSchoolYearTagPeer::CAREER_SUBJECT_SCHOOL_YEAR_ID, CareerSubjectSchoolYearPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CareerSubjectSchoolYearTagPeer::TAG_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CareerSubjectSchoolYearTagPeer::TAG_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'CareerSubjectSchoolYear';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'career_school_year_id'               => 'ForeignKey',
      'career_subject_id'                   => 'ForeignKey',
      'subject_configuration_id'            => 'ForeignKey',
      'index_sort'                          => 'Number',
      'career_subject_school_year_tag_list' => 'ManyKey',
    );
  }
}
