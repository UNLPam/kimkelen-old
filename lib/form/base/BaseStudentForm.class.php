<?php

/**
 * Student form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'global_file_number'                  => new sfWidgetFormInput(),
      'order_of_merit'                      => new sfWidgetFormInput(),
      'year_income'                         => new sfWidgetFormDate(),
      'nationality'                         => new sfWidgetFormInput(),
      'folio_number'                        => new sfWidgetFormInput(),
      'person_id'                           => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'occupation_id'                       => new sfWidgetFormPropelChoice(array('model' => 'Occupation', 'add_empty' => true)),
      'busy_starts_at'                      => new sfWidgetFormTime(),
      'busy_ends_at'                        => new sfWidgetFormTime(),
      'blood_group'                         => new sfWidgetFormInput(),
      'blood_factor'                        => new sfWidgetFormInput(),
      'emergency_information'               => new sfWidgetFormTextarea(),
      'health_coverage_id'                  => new sfWidgetFormPropelChoice(array('model' => 'HealthCoverage', 'add_empty' => true)),
      'origin_school'                       => new sfWidgetFormInput(),
      'educational_dependency'              => new sfWidgetFormInput(),
      'student_tag_list'                    => new sfWidgetFormPropelChoiceMany(array('model' => 'Tag')),
      'student_career_subject_allowed_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'CareerSubject')),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id', 'required' => false)),
      'global_file_number'                  => new sfValidatorString(array('max_length' => 20)),
      'order_of_merit'                      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'year_income'                         => new sfValidatorDate(array('required' => false)),
      'nationality'                         => new sfValidatorInteger(array('required' => false)),
      'folio_number'                        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'person_id'                           => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'occupation_id'                       => new sfValidatorPropelChoice(array('model' => 'Occupation', 'column' => 'id', 'required' => false)),
      'busy_starts_at'                      => new sfValidatorTime(array('required' => false)),
      'busy_ends_at'                        => new sfValidatorTime(array('required' => false)),
      'blood_group'                         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'blood_factor'                        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'emergency_information'               => new sfValidatorString(array('required' => false)),
      'health_coverage_id'                  => new sfValidatorPropelChoice(array('model' => 'HealthCoverage', 'column' => 'id', 'required' => false)),
      'origin_school'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'educational_dependency'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'student_tag_list'                    => new sfValidatorPropelChoiceMany(array('model' => 'Tag', 'required' => false)),
      'student_career_subject_allowed_list' => new sfValidatorPropelChoiceMany(array('model' => 'CareerSubject', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Student';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['student_tag_list']))
    {
      $values = array();
      foreach ($this->object->getStudentTags() as $obj)
      {
        $values[] = $obj->getTagId();
      }

      $this->setDefault('student_tag_list', $values);
    }

    if (isset($this->widgetSchema['student_career_subject_allowed_list']))
    {
      $values = array();
      foreach ($this->object->getStudentCareerSubjectAlloweds() as $obj)
      {
        $values[] = $obj->getCareerSubjectId();
      }

      $this->setDefault('student_career_subject_allowed_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveStudentTagList($con);
    $this->saveStudentCareerSubjectAllowedList($con);
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
    $c->add(StudentTagPeer::STUDENT_ID, $this->object->getPrimaryKey());
    StudentTagPeer::doDelete($c, $con);

    $values = $this->getValue('student_tag_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new StudentTag();
        $obj->setStudentId($this->object->getPrimaryKey());
        $obj->setTagId($value);
        $obj->save();
      }
    }
  }

  public function saveStudentCareerSubjectAllowedList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['student_career_subject_allowed_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(StudentCareerSubjectAllowedPeer::STUDENT_ID, $this->object->getPrimaryKey());
    StudentCareerSubjectAllowedPeer::doDelete($c, $con);

    $values = $this->getValue('student_career_subject_allowed_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new StudentCareerSubjectAllowed();
        $obj->setStudentId($this->object->getPrimaryKey());
        $obj->setCareerSubjectId($value);
        $obj->save();
      }
    }
  }

}
