<?php

/**
 * PathwayStudent form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BasePathwayStudentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'pathway_id' => new sfWidgetFormPropelChoice(array('model' => 'Pathway', 'add_empty' => false)),
      'year'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'PathwayStudent', 'column' => 'id', 'required' => false)),
      'student_id' => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'pathway_id' => new sfValidatorPropelChoice(array('model' => 'Pathway', 'column' => 'id')),
      'year'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'PathwayStudent', 'column' => array('pathway_id', 'student_id')))
    );

    $this->widgetSchema->setNameFormat('pathway_student[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PathwayStudent';
  }


}
