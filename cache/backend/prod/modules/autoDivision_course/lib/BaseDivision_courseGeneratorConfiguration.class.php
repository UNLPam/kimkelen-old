<?php

/**
 * division_course module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage division_course
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 12831 2008-11-09 14:33:38Z fabien $
 */
class BaseDivision_courseGeneratorConfiguration extends sfRevisitedModelGeneratorConfiguration
{
  public function getCredentials($action)
  {
    if (0 === strpos($action, '_'))
    {
      $action = substr($action, 1);
    }

    return isset($this->configuration['credentials'][$action]) ? $this->configuration['credentials'][$action] : array();
  }

  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getShowActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,);
  }

  public function getNewActions()
  {
    return array(  '_list' => NULL,  '_delete' =>   array(    'condition' => 'canBeDeleted',    'credentials' =>     array(      0 => 'edit_course',    ),  ),);
  }

  public function getEditActions()
  {
    return array(  '_list' =>   array(    'label' => 'Volver al listado de cursos',  ),  '_save_and_list' =>   array(    'label' => 'Guardar y volver al listado de cursos',  ),);
  }

  public function getListObjectActions()
  {
    return array(  '_show' =>   array(    'credentials' =>     array(      0 => 'show_course',    ),  ),  '_edit' =>   array(    'condition' => 'canBeEdited',    'credentials' =>     array(      0 => 'edit_course',    ),  ),  'students' =>   array(    'label' => 'Listado de estudiantes',    'action' => 'students',    'condition' => 'canListStudents',    'credentials' =>     array(      0 => 'show_course',    ),  ),  'manage_course_days' =>   array(    'action' => 'manageCourseDays',    'label' => 'Manage course days',    'condition' => 'canManageCourseDays',    'credentials' =>     array(      0 => 'edit_course_day',    ),  ),  'manage_students' =>   array(    'action' => 'courseSubjectStudent',    'credentials' =>     array(      0 => 'edit_course',    ),    'condition' => 'canManageStudents',  ),  'califications' =>   array(    'action' => 'califications',    'credentials' =>     array(      0 => 'edit_division_course_califications',    ),    'condition' => 'canCalificate',  ),  'teachers' =>   array(    'action' => 'courseTeachers',    'condition' => 'canTeachers',    'credentials' =>     array(      0 => 'edit_course',    ),  ),  'division_students' =>   array(    'action' => 'copyStudentsFromDivision',    'label' => 'Add division students',    'credentials' =>     array(      0 => 'edit_course',    ),    'condition' => 'canCopyStudentsFromDivision',  ),  'printCalification' =>   array(    'label' => 'Print califications',    'action' => 'printCalification',    'credentials' =>     array(      0 => 'edit_division_course_califications',    ),  ),  'close' =>   array(    'label' => 'Close period',    'action' => 'close',    'credentials' =>     array(      0 => 'close_course',    ),    'condition' => 'canBeClosed',  ),  'revert_period' =>   array(    'label' => 'Back to period',    'action' => 'backPeriod',    'credentials' =>     array(      0 => 'back_period_course',    ),    'condition' => 'canBackPeriod',    'params' => 'confirm=\'Are you sure?\'',  ),  'configuration' =>   array(    'label' => 'Configuration course',    'action' => 'courseConfiguration',    'credentials' =>     array(      0 => 'course_configuration',    ),    'condition' => 'canConfigurate',  ),  'seeAttendanceSheet' =>   array(    'label' => 'Show attendance sheet',    'action' => 'attendanceSheetByCourseSubject',    'credentials' =>     array(      0 => 'show_course',    ),    'condition' => 'canSeeAttendanceSheet',  ),  'attendanceSubject' =>   array(    'label' => 'Load Attendances',    'action' => 'attendanceSubject',    'condition' => 'hasAttendanceForSubject',    'credentials' =>     array(      0 => 'edit_absense_per_subject',    ),  ),  'calificateNonNumericalMark' =>   array(    'label' => 'Calificate non numerical mark',    'action' => 'calificateNonNumericalMark',    'credentials' =>     array(      0 => 'edit_division_course_califications',    ),    'condition' => 'canCalificate',  ),  '_delete' =>   array(    'condition' => 'canBeDeleted',    'credentials' =>     array(      0 => 'delete_division',    ),  ),);
  }

  public function getListActions()
  {
    return array();
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getSortColumnNameForField($field, $modelClass)
  {
    if ( array_key_exists($field, $list_fields = array_merge($this->getFieldsList(),$this->getFieldsDefault())) )
    { 
      if (array_key_exists('column_name',$list_fields[$field]) )
      {
        return constant($list_fields[$field]['column_name']);
      }
    }
    // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
    $peer = constant($modelClass.'::PEER');
    
    //return $peer::translateFieldName(sfInflector::camelize(strtolower($field)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
    return call_user_func(array($peer, 'translateFieldName'), sfInflector::camelize(strtolower($field)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
  }

  public function getListParams()
  {
    return '%%_course_info%%';
  }

  public function getListLayout()
  {
    return 'stacked';
  }

  public function getListTitle()
  {
    return 'Division course List';
  }

  public function getEditTitle()
  {
    return 'Edit Division course';
  }

  public function getNewTitle()
  {
    return 'New Division course';
  }

  public function getShowTitle()
  {
    return 'Show Division course';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getShowDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'name',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'starts_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'quota' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'school_year_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'division_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'related_division_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'is_closed' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'current_period' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'is_pathway' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'starts_at' => array(),
      'name' => array(),
      'quota' => array(),
      'school_year_id' => array(),
      'division_id' => array(),
      'related_division_id' => array(),
      'is_closed' => array(),
      'current_period' => array(),
      'is_pathway' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'starts_at' => array(),
      'name' => array(),
      'quota' => array(),
      'school_year_id' => array(),
      'division_id' => array(),
      'related_division_id' => array(),
      'is_closed' => array(),
      'current_period' => array(),
      'is_pathway' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'starts_at' => array(),
      'name' => array(),
      'quota' => array(),
      'school_year_id' => array(),
      'division_id' => array(),
      'related_division_id' => array(),
      'is_closed' => array(),
      'current_period' => array(),
      'is_pathway' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'starts_at' => array(),
      'name' => array(),
      'quota' => array(),
      'school_year_id' => array(),
      'division_id' => array(),
      'related_division_id' => array(),
      'is_closed' => array(),
      'current_period' => array(),
      'is_pathway' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'starts_at' => array(),
      'name' => array(),
      'quota' => array(),
      'school_year_id' => array(),
      'division_id' => array(),
      'related_division_id' => array(),
      'is_closed' => array(),
      'current_period' => array(),
      'is_pathway' => array(),
    );
  }

  public function getFieldsShow()
  {
    return array(
      'id' => array(),
      'starts_at' => array(),
      'name' => array(),
      'quota' => array(),
      'school_year_id' => array(),
      'division_id' => array(),
      'related_division_id' => array(),
      'is_closed' => array(),
      'current_period' => array(),
      'is_pathway' => array(),
    );
  }


  public function getListSlotActions()
  {
    return array();
      }

  public function getListSlotName()
  {
    return '"actions"';
      }

  public function getNewSlotActions()
  {
    return array();
      }

  public function getNewSlotName()
  {
    return '"actions"';
      }

  public function getEditSlotActions()
  {
    return array();
      }

  public function getEditSlotName()
  {
    return '"actions"';
      }

  public function getShowSlotActions()
  {
    return array();
      }

  public function getShowSlotName()
  {
    return '"actions"';
      }

  


  public function isExportationEnabled()
  {
    return false;
  }


  public function getForm($object = null)
  {
    $class = $this->getFormClass();

    return new $class($object, $this->getFormOptions());
  }

  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'CourseForm';
  }

  public function getFormOptions()
  {
    return array();
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'CourseFormFilter';
  }

  public function getFilterForm($filters)
  {
    $class = $this->getFilterFormClass();

    return new $class($filters, $this->getFilterFormOptions());
  }

  public function getFilterFormOptions()
  {
    return array();
  }

  public function getFilterDefaults()
  {
    return array();
  }

  public function getPager($model)
  {
    $class = $this->getPagerClass();

    return new $class($model, $this->getPagerMaxPerPage());
  }

  public function getPagerClass()
  {
    return 'sfPropelPager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getPeerMethod()
  {
    return 'doSelect';
  }

  public function getPeerCountMethod()
  {
    return 'doCount';
  }

  public function getConnection()
  {
    return null;
  }

  public function getCondition($action)
  {
    $condition = null;
    // first check standard main actions ("_create" for example)
    if (isset($this->configuration['list']['actions']['_'.$action]['condition']))
    {
      $condition = $this->configuration['list']['actions']['_'.$action]['condition'];
    }
    // then check non standard main actions
    if (isset($this->configuration['list']['actions'][$action]['condition']))
    {
      $condition = $this->configuration['list']['actions'][$action]['condition'];
    }
    // then check standard object actions (started with "_", "_edit" for example)
    if (isset($this->configuration['list']['object_actions']['_'.$action]['condition']))
    {
      $condition = $this->configuration['list']['object_actions']['_'.$action]['condition'];
    }
    // finally check non standard object actions
    if (isset($this->configuration['list']['object_actions'][$action]['condition']))
    {
      $condition = $this->configuration['list']['object_actions'][$action]['condition'];
    }

    return $condition;
  }
}
