<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ExaminationRepprovedSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseExaminationRepprovedSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'examination_repproved_id'                   => new sfWidgetFormPropelChoice(array('model' => 'ExaminationRepproved', 'add_empty' => true)),
      'career_subject_id'                          => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => true)),
      'is_closed'                                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'examination_repproved_subject_teacher_list' => new sfWidgetFormPropelChoice(array('model' => 'Teacher', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'examination_repproved_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ExaminationRepproved', 'column' => 'id')),
      'career_subject_id'                          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubject', 'column' => 'id')),
      'is_closed'                                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'examination_repproved_subject_teacher_list' => new sfValidatorPropelChoice(array('model' => 'Teacher', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('examination_repproved_subject_filters[%s]');

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

    $criteria->addJoin(ExaminationRepprovedSubjectTeacherPeer::EXAMINATION_REPPROVED_SUBJECT_ID, ExaminationRepprovedSubjectPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ExaminationRepprovedSubjectTeacherPeer::TEACHER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ExaminationRepprovedSubjectTeacherPeer::TEACHER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'ExaminationRepprovedSubject';
  }

  public function getFields()
  {
    return array(
      'id'                                         => 'Number',
      'examination_repproved_id'                   => 'ForeignKey',
      'career_subject_id'                          => 'ForeignKey',
      'is_closed'                                  => 'Boolean',
      'examination_repproved_subject_teacher_list' => 'ManyKey',
    );
  }
}
