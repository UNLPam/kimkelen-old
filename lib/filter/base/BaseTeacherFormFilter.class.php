<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Teacher filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseTeacherFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'                                  => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'salary'                                     => new sfWidgetFormFilterInput(),
      'aging_institution'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'file_number'                                => new sfWidgetFormFilterInput(),
      'examination_repproved_subject_teacher_list' => new sfWidgetFormPropelChoice(array('model' => 'ExaminationRepprovedSubject', 'add_empty' => true)),
      'examination_subject_teacher_list'           => new sfWidgetFormPropelChoice(array('model' => 'ExaminationSubject', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'person_id'                                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'salary'                                     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'aging_institution'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'file_number'                                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'examination_repproved_subject_teacher_list' => new sfValidatorPropelChoice(array('model' => 'ExaminationRepprovedSubject', 'required' => false)),
      'examination_subject_teacher_list'           => new sfValidatorPropelChoice(array('model' => 'ExaminationSubject', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('teacher_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addExaminationRepprovedSubjectTeacherListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(ExaminationRepprovedSubjectTeacherPeer::TEACHER_ID, TeacherPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ExaminationRepprovedSubjectTeacherPeer::EXAMINATION_REPPROVED_SUBJECT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ExaminationRepprovedSubjectTeacherPeer::EXAMINATION_REPPROVED_SUBJECT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addExaminationSubjectTeacherListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(ExaminationSubjectTeacherPeer::TEACHER_ID, TeacherPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ExaminationSubjectTeacherPeer::EXAMINATION_SUBJECT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ExaminationSubjectTeacherPeer::EXAMINATION_SUBJECT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Teacher';
  }

  public function getFields()
  {
    return array(
      'id'                                         => 'Number',
      'person_id'                                  => 'ForeignKey',
      'salary'                                     => 'Number',
      'aging_institution'                          => 'Date',
      'file_number'                                => 'Number',
      'examination_repproved_subject_teacher_list' => 'ManyKey',
      'examination_subject_teacher_list'           => 'ManyKey',
    );
  }
}
