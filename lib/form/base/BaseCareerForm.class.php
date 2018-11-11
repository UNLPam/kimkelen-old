<?php

/**
 * Career form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCareerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'created_at'           => new sfWidgetFormDateTime(),
      'file_number_sequence' => new sfWidgetFormInput(),
      'plan_name'            => new sfWidgetFormInput(),
      'quantity_years'       => new sfWidgetFormInput(),
      'career_name'          => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Career', 'column' => 'id', 'required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'file_number_sequence' => new sfValidatorInteger(),
      'plan_name'            => new sfValidatorString(array('max_length' => 255)),
      'quantity_years'       => new sfValidatorInteger(),
      'career_name'          => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('career[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Career';
  }


}
