<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CourseSubject filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseCourseSubjectFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'course_id'                     => new sfWidgetFormPropelChoice(array('model' => 'Course', 'add_empty' => true)),
      'career_subject_school_year_id' => new sfWidgetFormPropelChoice(array('model' => 'CareerSubjectSchoolYear', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'course_id'                     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Course', 'column' => 'id')),
      'career_subject_school_year_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CareerSubjectSchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('course_subject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CourseSubject';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'course_id'                     => 'ForeignKey',
      'career_subject_school_year_id' => 'ForeignKey',
    );
  }
}
