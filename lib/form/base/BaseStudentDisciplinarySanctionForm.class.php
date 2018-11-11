<?php

/**
 * StudentDisciplinarySanction form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentDisciplinarySanctionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'number'                        => new sfWidgetFormInput(),
      'name'                          => new sfWidgetFormInput(),
      'student_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'request_date'                  => new sfWidgetFormDate(),
      'resolution_date'               => new sfWidgetFormDate(),
      'value'                         => new sfWidgetFormInput(),
      'disciplinary_sanction_type_id' => new sfWidgetFormPropelChoice(array('model' => 'DisciplinarySanctionType', 'add_empty' => false)),
      'sanction_type_id'              => new sfWidgetFormPropelChoice(array('model' => 'SanctionType', 'add_empty' => false)),
      'observation'                   => new sfWidgetFormTextarea(),
      'document'                      => new sfWidgetFormInput(),
      'applicant_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'applicant_other'               => new sfWidgetFormInput(),
      'responsible_id'                => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'school_year_id'                => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'StudentDisciplinarySanction', 'column' => 'id', 'required' => false)),
      'number'                        => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'name'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'student_id'                    => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'request_date'                  => new sfValidatorDate(),
      'resolution_date'               => new sfValidatorDate(array('required' => false)),
      'value'                         => new sfValidatorNumber(),
      'disciplinary_sanction_type_id' => new sfValidatorPropelChoice(array('model' => 'DisciplinarySanctionType', 'column' => 'id')),
      'sanction_type_id'              => new sfValidatorPropelChoice(array('model' => 'SanctionType', 'column' => 'id')),
      'observation'                   => new sfValidatorString(array('required' => false)),
      'document'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'applicant_id'                  => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'applicant_other'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'responsible_id'                => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'school_year_id'                => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_disciplinary_sanction[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentDisciplinarySanction';
  }


}
