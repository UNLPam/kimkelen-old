<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ExaminationSubjectTeacher filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseExaminationSubjectTeacherFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('examination_subject_teacher_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExaminationSubjectTeacher';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'examination_subject_id' => 'ForeignKey',
      'teacher_id'             => 'ForeignKey',
    );
  }
}
