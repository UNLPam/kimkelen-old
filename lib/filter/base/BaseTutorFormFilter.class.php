<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Tutor filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseTutorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'              => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'occupation_id'          => new sfWidgetFormPropelChoice(array('model' => 'Occupation', 'add_empty' => true)),
      'tutor_type_id'          => new sfWidgetFormPropelChoice(array('model' => 'TutorType', 'add_empty' => true)),
      'nationality'            => new sfWidgetFormFilterInput(),
      'occupation_category_id' => new sfWidgetFormPropelChoice(array('model' => 'OccupationCategory', 'add_empty' => true)),
      'study_id'               => new sfWidgetFormPropelChoice(array('model' => 'Study', 'add_empty' => true)),
      'is_alive'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'person_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'occupation_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Occupation', 'column' => 'id')),
      'tutor_type_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TutorType', 'column' => 'id')),
      'nationality'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'occupation_category_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'OccupationCategory', 'column' => 'id')),
      'study_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Study', 'column' => 'id')),
      'is_alive'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('tutor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tutor';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'person_id'              => 'ForeignKey',
      'occupation_id'          => 'ForeignKey',
      'tutor_type_id'          => 'ForeignKey',
      'nationality'            => 'Number',
      'occupation_category_id' => 'ForeignKey',
      'study_id'               => 'ForeignKey',
      'is_alive'               => 'Boolean',
    );
  }
}
