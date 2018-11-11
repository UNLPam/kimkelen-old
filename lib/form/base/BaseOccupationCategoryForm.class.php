<?php

/**
 * OccupationCategory form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseOccupationCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorPropelChoice(array('model' => 'OccupationCategory', 'column' => 'id', 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 256)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'OccupationCategory', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('occupation_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'OccupationCategory';
  }


}
