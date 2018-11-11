<?php

/**
 * CareerStudent form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerStudentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                              => new sfWidgetFormInputHidden(),
      'created_at'                      => new sfWidgetFormDateTime(),
      'career_id'                       => new sfWidgetFormPropelChoice(array('model' => 'Career', 'add_empty' => false)),
      'student_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'orientation_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Orientation', 'add_empty' => true)),
      'sub_orientation_id'              => new sfWidgetFormPropelChoice(array('model' => 'SubOrientation', 'add_empty' => true)),
      'orientation_change_observations' => new sfWidgetFormTextarea(),
      'start_year'                      => new sfWidgetFormInput(),
      'file_number'                     => new sfWidgetFormInput(),
      'status'                          => new sfWidgetFormInput(),
      'graduation_school_year_id'       => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                              => new sfValidatorPropelChoice(array('model' => 'CareerStudent', 'column' => 'id', 'required' => false)),
      'created_at'                      => new sfValidatorDateTime(array('required' => false)),
      'career_id'                       => new sfValidatorPropelChoice(array('model' => 'Career', 'column' => 'id')),
      'student_id'                      => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'orientation_id'                  => new sfValidatorPropelChoice(array('model' => 'Orientation', 'column' => 'id', 'required' => false)),
      'sub_orientation_id'              => new sfValidatorPropelChoice(array('model' => 'SubOrientation', 'column' => 'id', 'required' => false)),
      'orientation_change_observations' => new sfValidatorString(array('required' => false)),
      'start_year'                      => new sfValidatorInteger(array('required' => false)),
      'file_number'                     => new sfValidatorString(array('max_length' => 20)),
      'status'                          => new sfValidatorInteger(array('required' => false)),
      'graduation_school_year_id'       => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CareerStudent', 'column' => array('career_id', 'student_id')))
    );

    $this->widgetSchema->setNameFormat('career_student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CareerStudent';
  }


}
