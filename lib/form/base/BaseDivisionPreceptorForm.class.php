<?php

/**
 * DivisionPreceptor form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseDivisionPreceptorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'preceptor_id' => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => false)),
      'division_id'  => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'DivisionPreceptor', 'column' => 'id', 'required' => false)),
      'preceptor_id' => new sfValidatorPropelChoice(array('model' => 'Personal', 'column' => 'id')),
      'division_id'  => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'DivisionPreceptor', 'column' => array('preceptor_id', 'division_id')))
    );

    $this->widgetSchema->setNameFormat('division_preceptor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DivisionPreceptor';
  }


}
