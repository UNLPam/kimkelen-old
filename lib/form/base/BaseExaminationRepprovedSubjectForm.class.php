<?php

/**
 * ExaminationRepprovedSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseExaminationRepprovedSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                         => new sfWidgetFormInputHidden(),
      'examination_repproved_id'                   => new sfWidgetFormPropelChoice(array('model' => 'ExaminationRepproved', 'add_empty' => false)),
      'career_subject_id'                          => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => false)),
      'is_closed'                                  => new sfWidgetFormInputCheckbox(),
      'examination_repproved_subject_teacher_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Teacher')),
    ));

    $this->setValidators(array(
      'id'                                         => new sfValidatorPropelChoice(array('model' => 'ExaminationRepprovedSubject', 'column' => 'id', 'required' => false)),
      'examination_repproved_id'                   => new sfValidatorPropelChoice(array('model' => 'ExaminationRepproved', 'column' => 'id')),
      'career_subject_id'                          => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'column' => 'id')),
      'is_closed'                                  => new sfValidatorBoolean(array('required' => false)),
      'examination_repproved_subject_teacher_list' => new sfValidatorPropelChoiceMany(array('model' => 'Teacher', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('examination_repproved_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExaminationRepprovedSubject';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['examination_repproved_subject_teacher_list']))
    {
      $values = array();
      foreach ($this->object->getExaminationRepprovedSubjectTeachers() as $obj)
      {
        $values[] = $obj->getTeacherId();
      }

      $this->setDefault('examination_repproved_subject_teacher_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveExaminationRepprovedSubjectTeacherList($con);
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
    $c->add(ExaminationRepprovedSubjectTeacherPeer::EXAMINATION_REPPROVED_SUBJECT_ID, $this->object->getPrimaryKey());
    ExaminationRepprovedSubjectTeacherPeer::doDelete($c, $con);

    $values = $this->getValue('examination_repproved_subject_teacher_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ExaminationRepprovedSubjectTeacher();
        $obj->setExaminationRepprovedSubjectId($this->object->getPrimaryKey());
        $obj->setTeacherId($value);
        $obj->save();
      }
    }
  }

}
