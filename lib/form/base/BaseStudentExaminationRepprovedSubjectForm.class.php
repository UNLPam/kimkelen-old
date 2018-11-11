<?php

/**
 * StudentExaminationRepprovedSubject form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseStudentExaminationRepprovedSubjectForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'student_repproved_course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'StudentRepprovedCourseSubject', 'add_empty' => false)),
      'examination_repproved_subject_id'    => new sfWidgetFormPropelChoice(array('model' => 'ExaminationRepprovedSubject', 'add_empty' => true)),
      'mark'                                => new sfWidgetFormInput(),
      'is_absent'                           => new sfWidgetFormInputCheckbox(),
      'date'                                => new sfWidgetFormDate(),
      'folio_number'                        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorPropelChoice(array('model' => 'StudentExaminationRepprovedSubject', 'column' => 'id', 'required' => false)),
      'student_repproved_course_subject_id' => new sfValidatorPropelChoice(array('model' => 'StudentRepprovedCourseSubject', 'column' => 'id')),
      'examination_repproved_subject_id'    => new sfValidatorPropelChoice(array('model' => 'ExaminationRepprovedSubject', 'column' => 'id', 'required' => false)),
      'mark'                                => new sfValidatorNumber(array('required' => false)),
      'is_absent'                           => new sfValidatorBoolean(array('required' => false)),
      'date'                                => new sfValidatorDate(array('required' => false)),
      'folio_number'                        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_examination_repproved_subject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentExaminationRepprovedSubject';
  }


}
