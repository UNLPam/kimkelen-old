<?php

/**
 * ExaminationSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseExaminationSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'examination_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Examination', 'add_empty' => false)),
      'career_subject_school_year_id'    => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => false)),
      'is_closed'                        => new sfWidgetFormInputCheckbox(),
      'examination_subject_teacher_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Teacher')),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'ExaminationSubject', 'column' => 'id', 'required' => false)),
      'examination_id'                   => new sfValidatorPropelChoice(array('model' => 'Examination', 'column' => 'id')),
      'career_subject_school_year_id'    => new sfValidatorPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
      'is_closed'                        => new sfValidatorBoolean(array('required' => false)),
      'examination_subject_teacher_list' => new sfValidatorPropelChoiceMany(array('model' => 'Teacher', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'ExaminationSubject', 'column' => array('examination_id', 'career_subject_school_year_id')))
    );

    $this->widgetSchema->setNameFormat('examination_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExaminationSubject';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['examination_subject_teacher_list']))
    {
      $values = array();
      foreach ($this->object->getExaminationSubjectTeachers() as $obj)
      {
        $values[] = $obj->getTeacherId();
      }

      $this->setDefault('examination_subject_teacher_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveExaminationSubjectTeacherList($con);
  }

  public function saveExaminationSubjectTeacherList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['examination_subject_teacher_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(ExaminationSubjectTeacherPeer::EXAMINATION_SUBJECT_ID, $this->object->getPrimaryKey());
    ExaminationSubjectTeacherPeer::doDelete($c, $con);

    $values = $this->getValue('examination_subject_teacher_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ExaminationSubjectTeacher();
        $obj->setExaminationSubjectId($this->object->getPrimaryKey());
        $obj->setTeacherId($value);
        $obj->save();
      }
    }
  }

}
