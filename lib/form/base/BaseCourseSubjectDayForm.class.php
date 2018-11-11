<?php

/**
 * CourseSubjectDay form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectDayForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => false)),
      'day'               => new sfWidgetFormInput(),
      'block'             => new sfWidgetFormInput(),
      'starts_at'         => new sfWidgetFormTime(),
      'ends_at'           => new sfWidgetFormTime(),
      'classroom_id'      => new sfWidgetFormPropelChoice(array('model' => 'Classroom', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'CourseSubjectDay', 'column' => 'id', 'required' => false)),
      'course_subject_id' => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id')),
      'day'               => new sfValidatorInteger(),
      'block'             => new sfValidatorInteger(),
      'starts_at'         => new sfValidatorTime(array('required' => false)),
      'ends_at'           => new sfValidatorTime(array('required' => false)),
      'classroom_id'      => new sfValidatorPropelChoice(array('model' => 'Classroom', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('course_subject_day[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectDay';
  }


}
