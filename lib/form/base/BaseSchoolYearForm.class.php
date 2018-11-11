<?php

/**
 * SchoolYear form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseSchoolYearForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'year'      => new sfWidgetFormInput(),
      'is_active' => new sfWidgetFormInputCheckbox(),
      'is_closed' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'SchoolYear', 'column' => 'id', 'required' => false)),
      'year'      => new sfValidatorInteger(array('required' => false)),
      'is_active' => new sfValidatorBoolean(array('required' => false)),
      'is_closed' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SchoolYear', 'column' => array('year')))
    );

    $this->widgetSchema->setNameFormat('school_year[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SchoolYear';
  }


}
