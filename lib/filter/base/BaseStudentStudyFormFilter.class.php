<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentStudy filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentStudyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_study_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentStudy';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'student_id' => 'ForeignKey',
      'study_id'   => 'ForeignKey',
    );
  }
}
