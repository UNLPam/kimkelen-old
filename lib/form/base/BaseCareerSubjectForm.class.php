<?php

/**
 * CareerSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'created_at'                          => new sfWidgetFormDateTime(),
      'career_id'                           => new sfWidgetFormPropelChoice(array('model' => 'Career', 'add_empty' => false)),
      'subject_id'                          => new sfWidgetFormPropelChoice(array('model' => 'Subject', 'add_empty' => false)),
      'year'                                => new sfWidgetFormInput(),
      'has_options'                         => new sfWidgetFormInputCheckbox(),
      'is_option'                           => new sfWidgetFormInputCheckbox(),
      'orientation_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Orientation', 'add_empty' => true)),
      'sub_orientation_id'                  => new sfWidgetFormPropelChoice(array('model' => 'SubOrientation', 'add_empty' => true)),
      'has_correlative_previous_year'       => new sfWidgetFormInputCheckbox(),
      'student_career_subject_allowed_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Student')),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'column' => 'id', 'required' => false)),
      'created_at'                          => new sfValidatorDateTime(array('required' => false)),
      'career_id'                           => new sfValidatorPropelChoice(array('model' => 'Career', 'column' => 'id')),
      'subject_id'                          => new sfValidatorPropelChoice(array('model' => 'Subject', 'column' => 'id')),
      'year'                                => new sfValidatorInteger(),
      'has_options'                         => new sfValidatorBoolean(array('required' => false)),
      'is_option'                           => new sfValidatorBoolean(array('required' => false)),
      'orientation_id'                      => new sfValidatorPropelChoice(array('model' => 'Orientation', 'column' => 'id', 'required' => false)),
      'sub_orientation_id'                  => new sfValidatorPropelChoice(array('model' => 'SubOrientation', 'column' => 'id', 'required' => false)),
      'has_correlative_previous_year'       => new sfValidatorBoolean(array('required' => false)),
      'student_career_subject_allowed_list' => new sfValidatorPropelChoiceMany(array('model' => 'Student', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CareerSubject', 'column' => array('career_id', 'subject_id', 'year', 'orientation_id', 'sub_orientation_id')))
    );

    $this->widgetSchema->setNameFormat('career_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerSubject';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['student_career_subject_allowed_list']))
    {
      $values = array();
      foreach ($this->object->getStudentCareerSubjectAlloweds() as $obj)
      {
        $values[] = $obj->getStudentId();
      }

      $this->setDefault('student_career_subject_allowed_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveStudentCareerSubjectAllowedList($con);
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
    $c->add(StudentCareerSubjectAllowedPeer::CAREER_SUBJECT_ID, $this->object->getPrimaryKey());
    StudentCareerSubjectAllowedPeer::doDelete($c, $con);

    $values = $this->getValue('student_career_subject_allowed_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new StudentCareerSubjectAllowed();
        $obj->setCareerSubjectId($this->object->getPrimaryKey());
        $obj->setStudentId($value);
        $obj->save();
      }
    }
  }

}
