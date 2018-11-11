<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentCareerSubjectAllowed filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentCareerSubjectAllowedFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('student_career_subject_allowed_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentCareerSubjectAllowed';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'career_subject_id' => 'ForeignKey',
      'student_id'        => 'ForeignKey',
    );
  }
}
