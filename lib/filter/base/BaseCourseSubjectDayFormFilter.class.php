<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubjectDay filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectDayFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'course_subject_id' => new sfWidgetFormPropelChoice(array('model' => 'CourseSubject', 'add_empty' => true)),
      'day'               => new sfWidgetFormFilterInput(),
      'block'             => new sfWidgetFormFilterInput(),
      'starts_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'ends_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'classroom_id'      => new sfWidgetFormPropelChoice(array('model' => 'Classroom', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'course_subject_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CourseSubject', 'column' => 'id')),
      'day'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'block'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'starts_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ends_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'classroom_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Classroom', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('course_subject_day_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubjectDay';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'course_subject_id' => 'ForeignKey',
      'day'               => 'Number',
      'block'             => 'Number',
      'starts_at'         => 'Date',
      'ends_at'           => 'Date',
      'classroom_id'      => 'ForeignKey',
    );
  }
}
