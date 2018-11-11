<?php

/**
 * Examination form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseExaminationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'name'               => new sfWidgetFormInput(),
      'date_from'          => new sfWidgetFormDate(),
      'date_to'            => new sfWidgetFormDate(),
      'examination_number' => new sfWidgetFormInput(),
      'school_year_id'     => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Examination', 'column' => 'id', 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 255)),
      'date_from'          => new sfValidatorDate(),
      'date_to'            => new sfValidatorDate(),
      'examination_number' => new sfValidatorInteger(),
      'school_year_id'     => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('examination[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Examination';
  }


}
