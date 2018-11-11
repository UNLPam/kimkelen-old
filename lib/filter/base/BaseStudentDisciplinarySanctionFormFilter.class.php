<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * StudentDisciplinarySanction filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
class BaseStudentDisciplinarySanctionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'number'                        => new sfWidgetFormFilterInput(),
      'name'                          => new sfWidgetFormFilterInput(),
      'student_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Student', 'add_empty' => true)),
      'request_date'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'resolution_date'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'value'                         => new sfWidgetFormFilterInput(),
      'disciplinary_sanction_type_id' => new sfWidgetFormPropelChoice(array('model' => 'DisciplinarySanctionType', 'add_empty' => true)),
      'sanction_type_id'              => new sfWidgetFormPropelChoice(array('model' => 'SanctionType', 'add_empty' => true)),
      'observation'                   => new sfWidgetFormFilterInput(),
      'document'                      => new sfWidgetFormFilterInput(),
      'applicant_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'applicant_other'               => new sfWidgetFormFilterInput(),
      'responsible_id'                => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'school_year_id'                => new sfWidgetFormPropelChoice(array('model' => 'SchoolYear', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'number'                        => new sfValidatorPass(array('required' => false)),
      'name'                          => new sfValidatorPass(array('required' => false)),
      'student_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Student', 'column' => 'id')),
      'request_date'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'resolution_date'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'value'                         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'disciplinary_sanction_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DisciplinarySanctionType', 'column' => 'id')),
      'sanction_type_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SanctionType', 'column' => 'id')),
      'observation'                   => new sfValidatorPass(array('required' => false)),
      'document'                      => new sfValidatorPass(array('required' => false)),
      'applicant_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'applicant_other'               => new sfValidatorPass(array('required' => false)),
      'responsible_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'school_year_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SchoolYear', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('student_disciplinary_sanction_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentDisciplinarySanction';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'number'                        => 'Text',
      'name'                          => 'Text',
      'student_id'                    => 'ForeignKey',
      'request_date'                  => 'Date',
      'resolution_date'               => 'Date',
      'value'                         => 'Number',
      'disciplinary_sanction_type_id' => 'ForeignKey',
      'sanction_type_id'              => 'ForeignKey',
      'observation'                   => 'Text',
      'document'                      => 'Text',
      'applicant_id'                  => 'ForeignKey',
      'applicant_other'               => 'Text',
      'responsible_id'                => 'ForeignKey',
      'school_year_id'                => 'ForeignKey',
    );
  }
}
