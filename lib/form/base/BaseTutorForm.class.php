<?php

/**
 * Tutor form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseTutorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'person_id'              => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'occupation_id'          => new sfWidgetFormPropelChoice(array('model' => 'Occupation', 'add_empty' => true)),
      'tutor_type_id'          => new sfWidgetFormPropelChoice(array('model' => 'TutorType', 'add_empty' => true)),
      'nationality'            => new sfWidgetFormInput(),
      'occupation_category_id' => new sfWidgetFormPropelChoice(array('model' => 'OccupationCategory', 'add_empty' => true)),
      'study_id'               => new sfWidgetFormPropelChoice(array('model' => 'Study', 'add_empty' => true)),
      'is_alive'               => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Tutor', 'column' => 'id', 'required' => false)),
      'person_id'              => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'occupation_id'          => new sfValidatorPropelChoice(array('model' => 'Occupation', 'column' => 'id', 'required' => false)),
      'tutor_type_id'          => new sfValidatorPropelChoice(array('model' => 'TutorType', 'column' => 'id', 'required' => false)),
      'nationality'            => new sfValidatorInteger(array('required' => false)),
      'occupation_category_id' => new sfValidatorPropelChoice(array('model' => 'OccupationCategory', 'column' => 'id', 'required' => false)),
      'study_id'               => new sfValidatorPropelChoice(array('model' => 'Study', 'column' => 'id', 'required' => false)),
      'is_alive'               => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tutor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tutor';
  }


}
