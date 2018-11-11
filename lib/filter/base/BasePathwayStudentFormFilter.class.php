<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PathwayStudent filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BasePathwayStudentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id' => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'pathway_id' => new sfWidgetFormPropelChoice(array('model' => 'Pathway', 'add_empty' => true)),
      'year'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'student_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'pathway_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pathway', 'column' => 'id')),
      'year'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pathway_student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PathwayStudent';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'student_id' => 'ForeignKey',
      'pathway_id' => 'ForeignKey',
      'year'       => 'Number',
    );
  }
}
