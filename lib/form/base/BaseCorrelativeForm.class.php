<?php

/**
 * Correlative form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCorrelativeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'career_subject_id'             => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => false)),
      'correlative_career_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubject', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'Correlative', 'column' => 'id', 'required' => false)),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
      'career_subject_id'             => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'column' => 'id')),
      'correlative_career_subject_id' => new sfValidatorPropelChoice(array('model' => 'CareerSubject', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Correlative', 'column' => array('career_subject_id', 'correlative_career_subject_id')))
    );

    $this->widgetSchema->setNameFormat('correlative[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Correlative';
  }


}
