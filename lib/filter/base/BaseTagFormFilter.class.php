<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Tag filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseTagFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                                => new sfWidgetFormFilterInput(),
      'student_tag_list'                    => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'career_subject_school_year_tag_list' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                                => new sfValidatorPass(array('required' => false)),
      'student_tag_list'                    => new sfValidatorPropelChoice(array('model' => 'Student', 'required' => false)),
      'career_subject_school_year_tag_list' => new sfValidatorPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addStudentTagListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(StudentTagPeer::TAG_ID, TagPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(StudentTagPeer::STUDENT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(StudentTagPeer::STUDENT_ID, $value));
    }

    $criteria->add($criterion);
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

    $criteria->addJoin(CareerSubjectSchoolYearTagPeer::TAG_ID, TagPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CareerSubjectSchoolYearTagPeer::CAREER_SUBJECT_SCHOOL_YEAR_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CareerSubjectSchoolYearTagPeer::CAREER_SUBJECT_SCHOOL_YEAR_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Tag';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'name'                                => 'Text',
      'student_tag_list'                    => 'ManyKey',
      'career_subject_school_year_tag_list' => 'ManyKey',
    );
  }
}
