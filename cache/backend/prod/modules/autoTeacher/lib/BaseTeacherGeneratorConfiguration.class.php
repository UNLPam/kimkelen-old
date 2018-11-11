<?php

/**
 * teacher module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage teacher
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 12831 2008-11-09 14:33:38Z fabien $
 */
class BaseTeacherGeneratorConfiguration extends sfRevisitedModelGeneratorConfiguration
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
    return array(  '_list' =>   array(    'label' => 'Volver al listado de docentes',  ),);
  }

  public function getNewActions()
  {
    return array(  '_list' =>   array(    'label' => 'Volver al listado de docentes',  ),  '_save_and_list' =>   array(    'label' => 'Guardar y volver al listado de docentes',  ),  '_save_and_add' =>   array(    'label' => 'Guardar y agregar otro docente',  ),);
  }

  public function getEditActions()
  {
    return array(  '_list' =>   array(    'label' => 'Volver al listado de docentes',  ),  '_save_and_list' =>   array(    'label' => 'Guardar y volver al listado de docentes',  ),);
  }

  public function getListObjectActions()
  {
    return array(  '_show' =>   array(    'credentials' =>     array(      0 => 'show_teacher',    ),  ),  'show_calendar' =>   array(    'action' => 'showCalendar',    'credentials' =>     array(      0 => 'show_teacher',    ),  ),  '_edit' =>   array(    'credentials' =>     array(      0 => 'edit_teacher',    ),  ),  '_delete' =>   array(    'credentials' =>     array(      0 => 'edit_teacher',    ),  ),  'aggregate_preceptor' =>   array(    'label' => 'Aggregate as a preceptor',    'action' => 'aggregateAsPreceptor',    'condition' => 'canAddPreceptor',    'credentials' =>     array(      0 => 'edit_teacher',    ),  ),  'licenses' =>   array(    'label' => 'Licenses',    'action' => 'licenses',    'credentials' =>     array(      0 => 'edit_teacher',    ),  ),  'course' =>   array(    'label' => 'Courses',    'action' => 'courses',    'condition' => 'haveCourses',  ),  'activate' =>   array(    'label' => 'Set active',    'credentials' =>     array(      0 => 'edit_teacher',    ),    'action' => 'personActivation',    'condition' => 'canPersonBeActivated',  ),  'deactivate' =>   array(    'label' => 'Set inactive',    'credentials' =>     array(      0 => 'edit_teacher',    ),    'action' => 'personActivation',    'condition' => 'canPersonBeDeactivated',  ),);
  }

  public function getListActions()
  {
    return array(  '_new' =>   array(    'label' => 'Nuevo docente',    'credentials' =>     array(      0 => 'edit_teacher',    ),  ),  '_user_export' => NULL,);
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
    return '%%person_lastname%% - %%person_firstname%% - %%person_full_identification%% - %%person_is_active%% - %%person_is_in_license%% - %%person_sf_guard_user%% - %%_subjects%% - %%phone%% - %%email%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Listado de docentes';
  }

  public function getEditTitle()
  {
    return 'Editar datos del docente "%%person%%"';
  }

  public function getNewTitle()
  {
    return 'Crear un nuevo docente';
  }

  public function getShowTitle()
  {
    return 'Detalle del docente "%%person%%"';
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
    return array(  'Datos personales' =>   array(    0 => '_person',  ),);
  }

  public function getListDisplay()
  {
    return array(  0 => 'person_lastname',  1 => 'person_firstname',  2 => 'person_full_identification',  3 => 'person_is_active',  4 => 'person_is_in_license',  5 => 'person_sf_guard_user',  6 => '_subjects',  7 => 'phone',  8 => 'email',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'person_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'salary' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'aging_institution' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'file_number' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'examination_repproved_subject_teacher_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'examination_subject_teacher_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'person' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'person_lastname' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Lastname',  'column_name' => 'PersonPeer::LASTNAME',),
      'person_firstname' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Firstname',  'column_name' => 'PersonPeer::FIRSTNAME',),
      'person_full_identification' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Identification number',  'column_name' => 'PersonPeer::IDENTIFICATION_NUMBER',),
      'person_sf_guard_user' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Username',),
      'person_is_active' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Activo',),
      'person_is_in_license' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Licencia',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'person_id' => array(),
      'salary' => array(),
      'aging_institution' => array(),
      'file_number' => array(),
      'examination_repproved_subject_teacher_list' => array(),
      'examination_subject_teacher_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'person_id' => array(),
      'salary' => array(),
      'aging_institution' => array(),
      'file_number' => array(),
      'examination_repproved_subject_teacher_list' => array(),
      'examination_subject_teacher_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'person_id' => array(),
      'salary' => array(),
      'aging_institution' => array(),
      'file_number' => array(),
      'examination_repproved_subject_teacher_list' => array(),
      'examination_subject_teacher_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'person_id' => array(),
      'salary' => array(),
      'aging_institution' => array(),
      'file_number' => array(),
      'examination_repproved_subject_teacher_list' => array(),
      'examination_subject_teacher_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'person_id' => array(),
      'salary' => array(),
      'aging_institution' => array(),
      'file_number' => array(),
      'examination_repproved_subject_teacher_list' => array(),
      'examination_subject_teacher_list' => array(),
    );
  }

  public function getFieldsShow()
  {
    return array(
      'id' => array(),
      'person_id' => array(),
      'salary' => array(),
      'aging_institution' => array(),
      'file_number' => array(),
      'examination_repproved_subject_teacher_list' => array(),
      'examination_subject_teacher_list' => array(),
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
    return 'teacherExporterHelper';
  }

  public function getExportationAjaxIndicatorPath()
  {
    return '/gmGeneratorPlugin/images/ajax-loader.gif';
  }

  public function getExportationHelperUserClass()
  {
    return 'teacherExporterHelperUser';
  }

  public function getExportationForm($defaults = array(), $options = array())
  {
    $formClass = 'teacherExporterForm';
    return new $formClass(array(), array_merge(array('fields' => $this->getExportationFieldSelectionDecorators(), 'title' => $this->getExportationTitle(), 'type' => $this->getExportationType(), 'allowUserTypeSelection' => $this->getExportationAllowUserTypeSelection()), $options));
  }

  public function getExportationAllowUserTypeSelection()
  {
    return false;
  }

  public function getExportationFieldSelection()
  {
    return array(  'lastname' =>   array(    'label' => 'Lastname',    'method' => 'getPersonLastname',    'decorator' => 'text',  ),  'person_firstname' =>   array(    'label' => 'Firstname',    'method' => 'getPersonFirstname',    'decorator' => 'text',  ),  'person_identification_type' =>   array(    'label' => 'Identification type',    'method' => 'getPersonIdentificationTypeString',    'decorator' => 'text',  ),  'person_identification_number' =>   array(    'label' => 'Identification number',    'method' => 'getPersonIdentificationNumber',    'decorator' => 'text',  ),  'person_email' =>   array(    'label' => 'Email',    'method' => 'getPersonEmail',    'decorator' => 'text',  ),  'person_phone' =>   array(    'label' => 'Phone',    'method' => 'getPersonPhone',    'decorator' => 'text',  ),  'person_address' =>   array(    'label' => 'Address',    'method' => 'getPersonAddress',    'decorator' => 'text',  ),);
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
    return "Teacher list";
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
    return 'TeacherForm';
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
    return 'TeacherFormFilter';
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
    return array('person_lastname', 'asc');
  }

  public function getPeerMethod()
  {
    return 'doSelectJoinAll';
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
