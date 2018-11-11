<?php

/**
 * CourseSubjectTeacher form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectTeacherForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'teacher_id'        => new sfWidgetFormPropelChoice(array('model' => 'Teacher', 'add_empty' => false)),
      'course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => false)),
      'situation_r_id'    => new sfWidgetFormPropelChoice(array('model' => 'Situation_R', 'add_empty' => false)),
      'date_from'         => new sfWidgetFormDate(),
      'date_to'           => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'CourseSubjectTeacher', 'column' => 'id', 'required' => false)),
      'teacher_id'        => new sfValidatorPropelChoice(array('model' => 'Teacher', 'column' => 'id')),
      'course_subject_id' => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id')),
      'situation_r_id'    => new sfValidatorPropelChoice(array('model' => 'Situation_R', 'column' => 'id')),
      'date_from'         => new sfValidatorDate(),
      'date_to'           => new sfValidatorDate(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CourseSubjectTeacher', 'column' => array('teacher_id', 'course_subject_id', 'situation_r_id')))
    );

    $this->widgetSchema->setNameFormat('course_subject_teacher[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectTeacher';
  }


}
