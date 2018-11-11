<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubjectTeacher filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectTeacherFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'teacher_id'        => new sfWidgetFormPropelChoice(array('model' => 'Teacher', 'add_empty' => true)),
      'course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'situation_r_id'    => new sfWidgetFormPropelChoice(array('model' => 'Situation_R', 'add_empty' => true)),
      'date_from'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_to'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'teacher_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Teacher', 'column' => 'id')),
      'course_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'situation_r_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Situation_R', 'column' => 'id')),
      'date_from'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_to'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('course_subject_teacher_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectTeacher';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'teacher_id'        => 'ForeignKey',
      'course_subject_id' => 'ForeignKey',
      'situation_r_id'    => 'ForeignKey',
      'date_from'         => 'Date',
      'date_to'           => 'Date',
    );
  }
}
