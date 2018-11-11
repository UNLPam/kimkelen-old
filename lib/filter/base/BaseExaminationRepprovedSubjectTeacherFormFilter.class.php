<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ExaminationRepprovedSubjectTeacher filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseExaminationRepprovedSubjectTeacherFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('examination_repproved_subject_teacher_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExaminationRepprovedSubjectTeacher';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'examination_repproved_subject_id' => 'ForeignKey',
      'teacher_id'                       => 'ForeignKey',
    );
  }
}
