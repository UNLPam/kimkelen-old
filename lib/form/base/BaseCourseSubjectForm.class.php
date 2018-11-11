<?php

/**
 * CourseSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseCourseSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'course_id'                     => new sfWidgetFormPropelChoice(array('model' => 'Course', 'add_empty' => false)),
      'career_subject_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'CourseSubject', 'column' => 'id', 'required' => false)),
      'course_id'                     => new sfValidatorPropelChoice(array('model' => 'Course', 'column' => 'id')),
      'career_subject_school_year_id' => new sfValidatorPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CourseSubject', 'column' => array('course_id', 'career_subject_school_year_id')))
    );

    $this->widgetSchema->setNameFormat('course_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubject';
  }


}
