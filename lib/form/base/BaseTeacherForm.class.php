<?php

/**
 * Teacher form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseTeacherForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                         => new sfWidgetFormInputHidden(),
      'person_id'                                  => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'salary'                                     => new sfWidgetFormInput(),
      'aging_institution'                          => new sfWidgetFormDate(),
      'file_number'                                => new sfWidgetFormInput(),
      'examination_repproved_subject_teacher_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'ExaminationRepprovedSubject')),
      'examination_subject_teacher_list'           => new sfWidgetFormPropelChoiceMany(array('model' => 'ExaminationSubject')),
    ));

    $this->setValidators(array(
      'id'                                         => new sfValidatorPropelChoice(array('model' => 'Teacher', 'column' => 'id', 'required' => false)),
      'person_id'                                  => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'salary'                                     => new sfValidatorNumber(array('required' => false)),
      'aging_institution'                          => new sfValidatorDate(array('required' => false)),
      'file_number'                                => new sfValidatorInteger(array('required' => false)),
      'examination_repproved_subject_teacher_list' => new sfValidatorPropelChoiceMany(array('model' => 'ExaminationRepprovedSubject', 'required' => false)),
      'examination_subject_teacher_list'           => new sfValidatorPropelChoiceMany(array('model' => 'ExaminationSubject', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('teacher[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Teacher';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['examination_repproved_subject_teacher_list']))
    {
      $values = array();
      foreach ($this->object->getExaminationRepprovedSubjectTeachers() as $obj)
      {
        $values[] = $obj->getExaminationRepprovedSubjectId();
      }

      $this->setDefault('examination_repproved_subject_teacher_list', $values);
    }

    if (isset($this->widgetSchema['examination_subject_teacher_list']))
    {
      $values = array();
      foreach ($this->object->getExaminationSubjectTeachers() as $obj)
      {
        $values[] = $obj->getExaminationSubjectId();
      }

      $this->setDefault('examination_subject_teacher_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveExaminationRepprovedSubjectTeacherList($con);
    $this->saveExaminationSubjectTeacherList($con);
  }

  public function saveExaminationRepprovedSubjectTeacherList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['examination_repproved_subject_teacher_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(ExaminationRepprovedSubjectTeacherPeer::TEACHER_ID, $this->object->getPrimaryKey());
    ExaminationRepprovedSubjectTeacherPeer::doDelete($c, $con);

    $values = $this->getValue('examination_repproved_subject_teacher_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ExaminationRepprovedSubjectTeacher();
        $obj->setTeacherId($this->object->getPrimaryKey());
        $obj->setExaminationRepprovedSubjectId($value);
        $obj->save();
      }
    }
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
    $c->add(ExaminationSubjectTeacherPeer::TEACHER_ID, $this->object->getPrimaryKey());
    ExaminationSubjectTeacherPeer::doDelete($c, $con);

    $values = $this->getValue('examination_subject_teacher_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ExaminationSubjectTeacher();
        $obj->setTeacherId($this->object->getPrimaryKey());
        $obj->setExaminationSubjectId($value);
        $obj->save();
      }
    }
  }

}
