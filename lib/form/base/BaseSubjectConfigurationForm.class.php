<?php

/**
 * SubjectConfiguration form base class.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class BaseSubjectConfigurationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                                         => new sfWidgetFormInputHidden(),
      'created_at'                                                 => new sfWidgetFormDateTime(),
      'course_marks'                                               => new sfWidgetFormInput(),
      'final_examination_required'                                 => new sfWidgetFormInputCheckbox(),
      'course_required'                                            => new sfWidgetFormInputCheckbox(),
      'course_minimun_mark'                                        => new sfWidgetFormInput(),
      'course_examination_count'                                   => new sfWidgetFormInput(),
      'max_previous'                                               => new sfWidgetFormInput(),
      'evaluation_method'                                          => new sfWidgetFormInput(),
      'course_type'                                                => new sfWidgetFormInput(),
      'attendance_type'                                            => new sfWidgetFormInput(),
      'max_disciplinary_sanctions'                                 => new sfWidgetFormInput(),
      'when_disapprove_show_string'                                => new sfWidgetFormInputCheckbox(),
      'necessary_student_approved_career_subject_to_show_prom_def' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                                                         => new sfValidatorPropelChoice(array('model' => 'SubjectConfiguration', 'column' => 'id', 'required' => false)),
      'created_at'                                                 => new sfValidatorDateTime(array('required' => false)),
      'course_marks'                                               => new sfValidatorInteger(),
      'final_examination_required'                                 => new sfValidatorBoolean(array('required' => false)),
      'course_required'                                            => new sfValidatorBoolean(array('required' => false)),
      'course_minimun_mark'                                        => new sfValidatorInteger(array('required' => false)),
      'course_examination_count'                                   => new sfValidatorInteger(),
      'max_previous'                                               => new sfValidatorInteger(),
      'evaluation_method'                                          => new sfValidatorInteger(array('required' => false)),
      'course_type'                                                => new sfValidatorInteger(array('required' => false)),
      'attendance_type'                                            => new sfValidatorInteger(),
      'max_disciplinary_sanctions'                                 => new sfValidatorInteger(array('required' => false)),
      'when_disapprove_show_string'                                => new sfValidatorBoolean(array('required' => false)),
      'necessary_student_approved_career_subject_to_show_prom_def' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('subject_configuration[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SubjectConfiguration';
  }


}
