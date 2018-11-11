<?php

/**
 * division module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage division
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 12831 2008-11-09 14:33:38Z fabien $
 */
class BaseDivisionGeneratorConfiguration extends sfRevisitedModelGeneratorConfiguration
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
    return array(  '_list' =>   array(    'label' => 'Volver al listado de divisiones',  ),  'students' =>   array(    'label' => 'Listado de estudiantes',    'action' => 'students',    'condition' => 'canListStudents',    'credentials' =>     array(      0 => 'show_course',    ),  ),  'show_calendar' =>   array(    'action' => 'showCalendar',    'credentials' =>     array(      0 => 'show_course',    ),  ),  'division_preceptors' =>   array(    'action' => 'divisionPreceptors',    'label' => 'Preceptors',    'credentials' =>     array(      0 => 'edit_division_preceptors',    ),  ),  'division_students' =>   array(    'action' => 'divisionStudents',    'label' => 'Students',    'credentials' =>     array(      0 => 'edit_course',    ),  ),  'division_courses' =>   array(    'action' => 'divisionCourses',    'label' => 'Cursos',    'credentils' =>     array(      0 => 'show_course',    ),  ),  '_delete' =>   array(    'credentials' =>     array(      0 => 'delete_division',    ),    'condition' => 'canBeDeleted',  ),);
  }

  public function getNewActions()
  {
    return array(  '_list' =>   array(    'label' => 'Volver al listado de divisiones',  ),  '_save_and_list' =>   array(    'label' => 'Guardar y volver al listado de divisiones',  ),  '_save_and_add' =>   array(    'label' => 'Guardar y agregar otra división',  ),);
  }

  public function getEditActions()
  {
    return array(  '_list' =>   array(    'label' => 'Volver al listado de divisiones',  ),  '_save_and_list' =>   array(    'label' => 'Guardar y volver al listado de divisiones',  ),);
  }

  public function getListObjectActions()
  {
    return array(  '_show' =>   array(    'credentials' =>     array(      0 => 'show_course',    ),  ),  'students' =>   array(    'label' => 'Listado de estudiantes',    'action' => 'students',    'condition' => 'canListStudents',    'credentials' =>     array(      0 => 'show_course',    ),  ),  'show_calendar' =>   array(    'action' => 'showCalendar',    'credentials' =>     array(      0 => 'show_course',    ),  ),  'division_configure' =>   array(    'action' => 'courseConfiguration',    'credentials' =>     array(      0 => 'course_configuration',    ),  ),  'division_preceptors' =>   array(    'action' => 'divisionPreceptors',    'label' => 'Preceptors',    'condition' => 'canDivisionPreceptors',    'credentials' =>     array(      0 => 'edit_division_preceptors',    ),  ),  'division_students' =>   array(    'action' => 'divisionStudents',    'label' => 'Students',    'condition' => 'canDivisionStudents',    'credentials' =>     array(      0 => 'edit_course',    ),  ),  'student_conduct' =>   array(    'action' => 'studentConduct',    'label' => 'Student conduct',    'condition' => 'canManageConduct',    'credentials' =>     array(      0 => 'edit_division_preceptors',    ),  ),  'division_courses' =>   array(    'action' => 'divisionCourses',    'credentils' =>     array(      0 => 'show_course',    ),  ),  'seeAttendanceSheet' =>   array(    'label' => 'Show attendance sheet',    'action' => 'attendanceSheetByDay',    'credentials' =>     array(      0 => 'show_course',    ),    'condition' => 'canManageAttendance',  ),  'boletines' =>   array(    'action' => 'printReportCard',    'label' => 'Imprimir boletines division',    'credentials' =>     array(      0 =>       array(        0 => 'report_card',        1 => 'edit_division_preceptors',        2 => 'show_division_course_califications',      ),    ),    'condition' => 'canPrintReportCards',  ),  'show_disciplinary_sanction_report' =>   array(    'label' => 'Student disciplinary sanction report',    'action' => 'showDisciplinarySanctionReport',  ),  'show_assistance_report' =>   array(    'label' => 'Student assistance report',    'action' => 'showAssistanceReport',  ),  'printCalification' =>   array(    'label' => 'Print califications',    'action' => 'printCalification',    'credentials' =>     array(      0 =>       array(        0 => 'edit_division_course_califications',        1 => 'show_division_course_califications',      ),    ),    'condition' => 'canPrintCalification',  ),  'attendanceDay' =>   array(    'label' => 'Load Attendances',    'action' => 'attendanceDay',    'credentials' =>     array(      0 => 'edit_course',    ),    'condition' => 'canLoadAttendances',  ),  '_delete' =>   array(    'credentials' =>     array(      0 => 'delete_division',    ),    'condition' => 'canBeDeleted',  ),);
  }

  public function getListActions()
  {
    return array(  '_new' =>   array(    'credentials' =>     array(      0 => 'new_division',    ),    'label' => 'Nueva división',  ),  '_user_export' => NULL,);
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
    return '<div class=\'info_div\'><strong>%%name%%</strong><div class=\'info_div\'><em><strong>Año lectivo:</strong> %%school_year%% </em></div><div class=\'info_div\'><em><strong>Carrera:</strong> %%career_school_year%%</em></div><div class=\'info_div\'>%%_division_info%%</div>';
  }

  public function getListLayout()
  {
    return 'stacked';
  }

  public function getListTitle()
  {
    return 'Listado de divisiones';
  }

  public function getEditTitle()
  {
    return 'Editar división';
  }

  public function getNewTitle()
  {
    return 'Nueva división';
  }

  public function getShowTitle()
  {
    return 'Ver división';
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
    return array(  0 => '_division_show_tabs',);
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'División',),
      'division_title_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'career_school_year_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'shift_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'year' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'division_courses' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Crear cursos',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'division_title_id' => array(),
      'career_school_year_id' => array(),
      'shift_id' => array(),
      'year' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'division_title_id' => array(),
      'career_school_year_id' => array(),
      'shift_id' => array(),
      'year' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'division_title_id' => array(),
      'career_school_year_id' => array(),
      'shift_id' => array(),
      'year' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'division_title_id' => array(),
      'career_school_year_id' => array(),
      'shift_id' => array(),
      'year' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'division_title_id' => array(),
      'career_school_year_id' => array(),
      'shift_id' => array(),
      'year' => array(),
    );
  }

  public function getFieldsShow()
  {
    return array(
      'id' => array(),
      'division_title_id' => array(),
      'career_school_year_id' => array(),
      'shift_id' => array(),
      'year' => array(),
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

    public function getExportationHelperClass()
  {
    return 'divisionExporterHelper';
  }

  public function getExportationAjaxIndicatorPath()
  {
    return '/gmGeneratorPlugin/images/ajax-loader.gif';
  }

  public function getExportationHelperUserClass()
  {
    return 'divisionExporterHelperUser';
  }

  public function getExportationForm($defaults = array(), $options = array())
  {
    $formClass = 'divisionExporterForm';
    return new $formClass(array(), array_merge(array('fields' => $this->getExportationFieldSelectionDecorators(), 'title' => $this->getExportationTitle(), 'type' => $this->getExportationType(), 'allowUserTypeSelection' => $this->getExportationAllowUserTypeSelection()), $options));
  }

  public function getExportationAllowUserTypeSelection()
  {
    return false;
  }

  public function getExportationFieldSelection()
  {
    return array(  'title' =>   array(    'label' => 'Titulo de división',    'method' => 'getDivisionTitle',    'decorator' => 'text',  ),  'career' =>   array(    'label' => 'Career',    'method' => 'getCareer',    'decorator' => 'text',  ),  'count_students' =>   array(    'label' => 'Count students',    'method' => 'countStudents',    'decorator' => 'text',  ),);
  }

  public function getExportationFieldSelectionDecorators()
  {
    $fields = array();
    foreach ($this->getExportationFieldSelection() as $id => $f)
    {
      $fields[$id] = gmExporterFieldDecorator::getInstance($f);
    }
    return $fields;
  }

  public function getExportationHeaders()
  {
    $headers = array();
    foreach ($this->getExportationFieldSelection() as $f)
    {
      $f = gmExporterFieldDecorator::getInstance($f);
      $headers[] = $f->getLabel();
    }
    return $headers;
  }

  public function getExportationTitle()
  {
    return "Divisiones";
  }

  public function getExportationDefaultType()
  {
    return gmExporterTypes::EXPORT_TYPE_XLS;
  }

  public function getExportationType()
  {
        return "xls";
      }

  public function getExportationSavePath()
  {
    return "/tmp/";
  }

  public function getExportationFileExtension($type = null)
  {
    $type = is_null($type)? $this->getExportationType() : $type;
    return gmExporterTypes::getFileExtension($type);
  }

  public function getExportationFileName($extension = null)
  {
    $extension = is_null($extension)? $this->getExportationFileExtension() : $extension;
    return 'report.'.$extension;
  }

  public function getExportationMimeType($type = null)
  {
    $type = is_null($type)? $this->getExportationType() : $type;
    return gmExporterTypes::getMimeType($type);
  }
    public function getExportationPager($model = null, $type = null)
  {
    $class = $this->getExportationPagerClass();

    return new $class($model, $this->getExportationPagerMaxPerPage($type));
  }

  public function getExportationPagerClass()
  {
    return 'sfPropelPager';
  }

  public function getExportationPagerMaxPerPage($type = 'default')
  {
        $maxPerPageOpts = array('default' => 1000);
    
    return isset($maxPerPageOpts[$type])? $maxPerPageOpts[$type] : $maxPerPageOpts['default'];
  }



  public function isExportationEnabled()
  {
    return true;
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
    return 'DivisionForm';
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
    return 'DivisionFormFilter';
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
