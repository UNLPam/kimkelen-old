<?php

/**
 * CareerSubjectSchoolYear form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerSubjectSchoolYearForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'career_school_year_id'               => new sfWidgetFormPropelChoice(array('model' => 'CareerSchoolYear', 'add_empty' => false)),
      'career_subject_id'                   => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => false)),
      'subject_configuration_id'            => new sfWidgetFormPropelChoice(array('model' => 'SubjectConfiguration', 'add_empty' => true)),
      'index_sort'                          => new sfWidgetFormInput(),
      'career_subject_school_year_tag_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Tag')),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'column' => 'id', 'required' => false)),
      'career_school_year_id'               => new sfValidatorPropelChoice(array('model' => 'CareerSchoolYear', 'column' => 'id')),
      'career_subject_id'                   => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'column' => 'id')),
      'subject_configuration_id'            => new sfValidatorPropelChoice(array('model' => 'SubjectConfiguration', 'column' => 'id', 'required' => false)),
      'index_sort'                          => new sfValidatorInteger(array('required' => false)),
      'career_subject_school_year_tag_list' => new sfValidatorPropelChoiceMany(array('model' => 'Tag', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CareerSubjectSchoolYear', 'column' => array('career_subject_id', 'career_school_year_id')))
    );

    $this->widgetSchema->setNameFormat('career_subject_school_year[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerSubjectSchoolYear';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['career_subject_school_year_tag_list']))
    {
      $values = array();
      foreach ($this->object->getCareerSubjectSchoolYearTags() as $obj)
      {
        $values[] = $obj->getTagId();
      }

      $this->setDefault('career_subject_school_year_tag_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCareerSubjectSchoolYearTagList($con);
  }

  public function saveCareerSubjectSchoolYearTagList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['career_subject_school_year_tag_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CareerSubjectSchoolYearTagPeer::CAREER_SUBJECT_SCHOOL_YEAR_ID, $this->object->getPrimaryKey());
    CareerSubjectSchoolYearTagPeer::doDelete($c, $con);

    $values = $this->getValue('career_subject_school_year_tag_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CareerSubjectSchoolYearTag();
        $obj->setCareerSubjectSchoolYearId($this->object->getPrimaryKey());
        $obj->setTagId($value);
        $obj->save();
      }
    }
  }

}
