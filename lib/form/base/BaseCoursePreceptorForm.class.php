<?php

/**
 * CoursePreceptor form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCoursePreceptorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'preceptor_id' => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => false)),
      'course_id'    => new sfWidgetFormPropelChoice(array('model' => 'Course', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'CoursePreceptor', 'column' => 'id', 'required' => false)),
      'preceptor_id' => new sfValidatorPropelChoice(array('model' => 'Personal', 'column' => 'id')),
      'course_id'    => new sfValidatorPropelChoice(array('model' => 'Course', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CoursePreceptor', 'column' => array('preceptor_id', 'course_id')))
    );

    $this->widgetSchema->setNameFormat('course_preceptor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CoursePreceptor';
  }


}
