<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentTutor filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentTutorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tutor_id'   => new sfWidgetFormPropelChoice(array('model' => 'Tutor', 'add_empty' => true)),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tutor_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tutor', 'column' => 'id')),
      'student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_tutor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentTutor';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'tutor_id'   => 'ForeignKey',
      'student_id' => 'ForeignKey',
    );
  }
}
