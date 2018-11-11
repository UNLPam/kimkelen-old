<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ExaminationSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseExaminationSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'examination_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Examination', 'add_empty' => true)),
      'career_subject_school_year_id'    => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => true)),
      'is_closed'                        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'examination_subject_teacher_list' => new sfWidgetFormPropelChoice(array('model' => 'Teacher', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'examination_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Examination', 'column' => 'id')),
      'career_subject_school_year_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
      'is_closed'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'examination_subject_teacher_list' => new sfValidatorPropelChoice(array('model' => 'Teacher', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('examination_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(ExaminationSubjectTeacherPeer::EXAMINATION_SUBJECT_ID, ExaminationSubjectPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(ExaminationSubjectTeacherPeer::TEACHER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(ExaminationSubjectTeacherPeer::TEACHER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'ExaminationSubject';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'examination_id'                   => 'ForeignKey',
      'career_subject_school_year_id'    => 'ForeignKey',
      'is_closed'                        => 'Boolean',
      'examination_subject_teacher_list' => 'ManyKey',
    );
  }
}
