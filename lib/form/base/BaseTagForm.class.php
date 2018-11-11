<?php

/**
 * Tag form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'name'                                => new sfWidgetFormInput(),
      'student_tag_list'                    => new sfWidgetFormPropelChoiceMany(array('model' => 'Student')),
      'career_subject_school_year_tag_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'CareerSubjectSchoolYear')),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorPropelChoice(array('model' => 'Tag', 'column' => 'id', 'required' => false)),
      'name'                                => new sfValidatorString(array('max_length' => 255)),
      'student_tag_list'                    => new sfValidatorPropelChoiceMany(array('model' => 'Student', 'required' => false)),
      'career_subject_school_year_tag_list' => new sfValidatorPropelChoiceMany(array('model' => 'CareerSubjectSchoolYear', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tag', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tag';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['student_tag_list']))
    {
      $values = array();
      foreach ($this->object->getStudentTags() as $obj)
      {
        $values[] = $obj->getStudentId();
      }

      $this->setDefault('student_tag_list', $values);
    }

    if (isset($this->widgetSchema['career_subject_school_year_tag_list']))
    {
      $values = array();
      foreach ($this->object->getCareerSubjectSchoolYearTags() as $obj)
      {
        $values[] = $obj->getCareerSubjectSchoolYearId();
      }

      $this->setDefault('career_subject_school_year_tag_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveStudentTagList($con);
    $this->saveCareerSubjectSchoolYearTagList($con);
  }

  public function saveStudentTagList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['student_tag_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(StudentTagPeer::TAG_ID, $this->object->getPrimaryKey());
    StudentTagPeer::doDelete($c, $con);

    $values = $this->getValue('student_tag_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new StudentTag();
        $obj->setTagId($this->object->getPrimaryKey());
        $obj->setStudentId($value);
        $obj->save();
      }
    }
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
    $c->add(CareerSubjectSchoolYearTagPeer::TAG_ID, $this->object->getPrimaryKey());
    CareerSubjectSchoolYearTagPeer::doDelete($c, $con);

    $values = $this->getValue('career_subject_school_year_tag_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CareerSubjectSchoolYearTag();
        $obj->setTagId($this->object->getPrimaryKey());
        $obj->setCareerSubjectSchoolYearId($value);
        $obj->save();
      }
    }
  }

}
