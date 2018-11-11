<?php

/**
 * CourseSubjectStudentPathway form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectStudentPathwayForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'student_id'         => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => false)),
      'course_subject_id'  => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => false)),
      'mark'               => new sfWidgetFormInput(),
      'approval_date'      => new sfWidgetFormDate(),
      'pathway_student_id' => new sfWidgetFormPropelChoice(array('model' => 'PathwayStudent', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'CourseSubjectStudentPathway', 'column' => 'id', 'required' => false)),
      'student_id'         => new sfValidatorPropelChoice(array('model' => 'Student', 'column' => 'id')),
      'course_subject_id'  => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id')),
      'mark'               => new sfValidatorNumber(array('required' => false)),
      'approval_date'      => new sfValidatorDate(array('required' => false)),
      'pathway_student_id' => new sfValidatorPropelChoice(array('model' => 'PathwayStudent', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('course_subject_student_pathway[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectStudentPathway';
  }


}
