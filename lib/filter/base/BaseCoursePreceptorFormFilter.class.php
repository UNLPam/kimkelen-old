<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CoursePreceptor filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCoursePreceptorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'preceptor_id' => new sfWidgetFormPropelChoice(array('model' => 'Personal', 'add_empty' => true)),
      'course_id'    => new sfWidgetFormPropelChoice(array('model' => 'Course', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'preceptor_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Personal', 'column' => 'id')),
      'course_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Course', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('course_preceptor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CoursePreceptor';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'preceptor_id' => 'ForeignKey',
      'course_id'    => 'ForeignKey',
    );
  }
}
