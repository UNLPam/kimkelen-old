<?php

/**
 * student module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage student
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 12831 2008-11-09 14:33:38Z fabien $
 */
class BaseStudentGeneratorConfiguration extends sfRevisitedModelGeneratorConfiguration
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
    return array(  '_list' =>   array(    'label' => 'Volver al listado de alumnos',  ),  '_edit' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),  ),  '_delete' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),    'condition' => 'canBeDeleted',  ),  'regiter_for_careers' =>   array(    'label' => 'Career register',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'registerForCareer',  ),  'register_for_current_school_year' =>   array(    'label' => 'School year register',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'registerForCurrentSchoolYear',  ),  'manage_orientation' =>   array(    'label' => 'Cambiar orientacion',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'changeOrientation',    'condition' => 'isInscriptedInCareer',  ),  'manage_allowed_subjects' =>   array(    'label' => 'Subjects to be coursed',    'credentials' =>     array(      0 => 'edit_student',    ),    'condition' => 'canBeManagedForCareerSubjectAllowed',    'action' => 'manageCareerSubjectAllowed',  ),  'equivalence' =>   array(    'credentials' =>     array(      0 => 'show_equivalence',    ),    'condition' => 'canManageEquivalence',    'action' => 'equivalence',  ),  'activate' =>   array(    'label' => 'Set active',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'personActivation',    'condition' => 'canPersonBeActivated',  ),  'deactivate' =>   array(    'label' => 'Set inactive',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'personDeactivation',    'condition' => 'canPersonBeDeactivated',  ),  'print_report_card' =>   array(    'label' => 'print report card',    'action' => 'printReportCard',    'condition' => 'canPrintReportCard',  ),  'brothers' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'manageBrothers',  ),  'tutors' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'tutors',  ),  'sanctions' =>   array(    'credentials' =>     array(      0 => 'show_student_disciplinary_sanction',    ),    'label' => 'Sanctions',    'action' => 'sanctions',  ),  'free' =>   array(    'credentials' =>     array(      0 => 'set_free',    ),    'label' => 'Student free',    'action' => 'free',    'condition' => 'canBeFree',  ),  'student_reincorporation' =>   array(    'credentials' =>     array(      0 => 'student_reincorporation_student',    ),    'label' => 'Student reincorporation',    'action' => 'reincorporation',    'condition' => 'canBeReincorporated',  ),);
  }

  public function getNewActions()
  {
    return array(  '_list' =>   array(    'label' => 'Volver al listado de alumnos',  ),  '_save_and_list' =>   array(    'label' => 'Guardar y volver al listado de alumnos',  ),  '_save_and_add' =>   array(    'label' => 'Guardar y agregar otro alumno',  ),);
  }

  public function getEditActions()
  {
    return array(  '_list' =>   array(    'label' => 'Volver al listado de alumnos',  ),  '_save_and_list' =>   array(    'label' => 'Guardar y volver al listado de alumnos',  ),);
  }

  public function getListObjectActions()
  {
    return array(  '_show' =>   array(    'credentials' =>     array(      0 => 'show_student',    ),    'label' => 'Ver Legajo Completo',  ),  '_edit' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),  ),  '_delete' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),    'condition' => 'canBeDeleted',  ),  'regiter_for_careers' =>   array(    'label' => 'Career register',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'registerForCareer',  ),  'register_for_current_school_year' =>   array(    'label' => 'School year register',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'registerForCurrentSchoolYear',  ),  'manage_orientation' =>   array(    'label' => 'Cambiar orientacion',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'changeOrientation',    'condition' => 'isInscriptedInCareer',  ),  'manage_allowed_subjects' =>   array(    'label' => 'Subjects to be coursed',    'credentials' =>     array(      0 => 'edit_student',    ),    'condition' => 'canBeManagedForCareerSubjectAllowed',    'action' => 'manageCareerSubjectAllowed',  ),  'analytical' =>   array(    'credentials' =>     array(      0 => 'show_equivalence',    ),    'action' => 'analytical',  ),  'activate' =>   array(    'label' => 'Set active',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'personActivation',    'condition' => 'canPersonBeActivated',  ),  'deactivate' =>   array(    'label' => 'Set inactive',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'deactivate',    'condition' => 'canBeDeactivated',  ),  'sanctions' =>   array(    'credentials' =>     array(      0 => 'show_student_disciplinary_sanction',    ),    'label' => 'Sanctions',    'action' => 'sanctions',  ),  'free' =>   array(    'credentials' =>     array(      0 => 'set_free',    ),    'label' => 'Student free',    'action' => 'free',    'condition' => 'canBeFree',  ),  'print_report_card' =>   array(    'label' => 'print report card',    'action' => 'printReportCard',    'condition' => 'canPrintReportCard',  ),  'student_reincorporation' =>   array(    'credentials' =>     array(      0 => 'student_reincorporation_student',    ),    'label' => 'Student reincorporation',    'action' => 'reincorporation',    'condition' => 'canBeReincorporated',  ),  'student_assistance_sanction_report' =>   array(    'label' => 'Student assistance and sanction report',    'action' => 'showAssistanceAndSanctionReport',    'condition' => 'canGenerateReport',  ),  'print_details' =>   array(    'label' => 'print details of student',    'action' => 'printDetails',  ),  'withdraw' =>   array(    'label' => 'Withdraw student',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'withdrawStudent',    'condition' => 'canBeWithdrawn',  ),  'undo_withdraw' =>   array(    'label' => 'Undo withdraw student',    'credentials' =>     array(      0 => 'edit_student',    ),    'action' => 'undoWithdrawStudent',    'condition' => 'canUndoWithdrawn',  ),);
  }

  public function getListActions()
  {
    return array(  '_new' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),    'label' => 'Nuevo alumno',  ),  '_user_export' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  'registerForCareer' =>   array(    'label' => 'Career inscriptions',    'credentials' =>     array(      0 => 'edit_student',    ),  ),  'registerForCurrentSchoolYear' =>   array(    'label' => 'Administrar matrícula',    'credentials' =>     array(      0 => 'edit_student',    ),  ),  '_delete' =>   array(    'credentials' =>     array(      0 => 'edit_student',    ),  ),);
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
    return '%%_student_info%%';
  }

  public function getListLayout()
  {
    return 'stacked';
  }

  public function getListTitle()
  {
    return 'Student list';
  }

  public function getEditTitle()
  {
    return 'Edición de alumnos "%%person%%"';
  }

  public function getNewTitle()
  {
    return 'Nuevo Alumno';
  }

  public function getShowTitle()
  {
    return 'Detalle del alumno "%%person%%"';
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
    return array(  'Alumno' =>   array(    0 => '_student_show_tabs',  ),);
  }

  public function getListDisplay()
  {
    return array(  0 => 'person_lastname',  1 => 'person_firstname',  2 => 'person_full_identification',  3 => 'person_is_active',  4 => 'person_sf_guard_user',  5 => '_is_registered',  6 => '_careers',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'global_file_number' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'order_of_merit' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'year_income' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'nationality' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'folio_number' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'person_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'occupation_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'busy_starts_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Time',),
      'busy_ends_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Time',),
      'blood_group' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'blood_factor' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'emergency_information' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'health_coverage_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'origin_school' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'educational_dependency' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'student_tag_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'student_career_subject_allowed_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'person' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'person_lastname' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Lastname',  'column_name' => 'PersonPeer::LASTNAME',),
      'person_firstname' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Firstname',  'column_name' => 'PersonPeer::FIRSTNAME',),
      'careers' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Careers',),
      'person_is_active' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Is Active?',),
      'is_registered' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'School year registered?',),
      'person_full_identification' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Identification number',  'column_name' => 'PersonPeer::IDENTIFICATION_NUMBER',),
      'person_sf_guard_user' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Username',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'global_file_number' => array(),
      'order_of_merit' => array(),
      'year_income' => array(),
      'nationality' => array(),
      'folio_number' => array(),
      'person_id' => array(),
      'occupation_id' => array(),
      'busy_starts_at' => array(),
      'busy_ends_at' => array(),
      'blood_group' => array(),
      'blood_factor' => array(),
      'emergency_information' => array(),
      'health_coverage_id' => array(),
      'origin_school' => array(),
      'educational_dependency' => array(),
      'student_tag_list' => array(),
      'student_career_subject_allowed_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'global_file_number' => array(),
      'order_of_merit' => array(),
      'year_income' => array(),
      'nationality' => array(),
      'folio_number' => array(),
      'person_id' => array(),
      'occupation_id' => array(),
      'busy_starts_at' => array(),
      'busy_ends_at' => array(),
      'blood_group' => array(),
      'blood_factor' => array(),
      'emergency_information' => array(),
      'health_coverage_id' => array(),
      'origin_school' => array(),
      'educational_dependency' => array(),
      'student_tag_list' => array(),
      'student_career_subject_allowed_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'global_file_number' => array(),
      'order_of_merit' => array(),
      'year_income' => array(),
      'nationality' => array(),
      'folio_number' => array(),
      'person_id' => array(),
      'occupation_id' => array(),
      'busy_starts_at' => array(),
      'busy_ends_at' => array(),
      'blood_group' => array(),
      'blood_factor' => array(),
      'emergency_information' => array(),
      'health_coverage_id' => array(),
      'origin_school' => array(),
      'educational_dependency' => array(),
      'student_tag_list' => array(),
      'student_career_subject_allowed_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'global_file_number' => array(),
      'order_of_merit' => array(),
      'year_income' => array(),
      'nationality' => array(),
      'folio_number' => array(),
      'person_id' => array(),
      'occupation_id' => array(),
      'busy_starts_at' => array(),
      'busy_ends_at' => array(),
      'blood_group' => array(),
      'blood_factor' => array(),
      'emergency_information' => array(),
      'health_coverage_id' => array(),
      'origin_school' => array(),
      'educational_dependency' => array(),
      'student_tag_list' => array(),
      'student_career_subject_allowed_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'global_file_number' => array(),
      'order_of_merit' => array(),
      'year_income' => array(),
      'nationality' => array(),
      'folio_number' => array(),
      'person_id' => array(),
      'occupation_id' => array(),
      'busy_starts_at' => array(),
      'busy_ends_at' => array(),
      'blood_group' => array(),
      'blood_factor' => array(),
      'emergency_information' => array(),
      'health_coverage_id' => array(),
      'origin_school' => array(),
      'educational_dependency' => array(),
      'student_tag_list' => array(),
      'student_career_subject_allowed_list' => array(),
    );
  }

  public function getFieldsShow()
  {
    return array(
      'id' => array(),
      'global_file_number' => array(),
      'order_of_merit' => array(),
      'year_income' => array(),
      'nationality' => array(),
      'folio_number' => array(),
      'person_id' => array(),
      'occupation_id' => array(),
      'busy_starts_at' => array(),
      'busy_ends_at' => array(),
      'blood_group' => array(),
      'blood_factor' => array(),
      'emergency_information' => array(),
      'health_coverage_id' => array(),
      'origin_school' => array(),
      'educational_dependency' => array(),
      'student_tag_list' => array(),
      'student_career_subject_allowed_list' => array(),
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
    return 'studentExporterHelper';
  }

  public function getExportationAjaxIndicatorPath()
  {
    return '/gmGeneratorPlugin/images/ajax-loader.gif';
  }

  public function getExportationHelperUserClass()
  {
    return 'studentExporterHelperUser';
  }

  public function getExportationForm($defaults = array(), $options = array())
  {
    $formClass = 'studentExporterForm';
    return new $formClass(array(), array_merge(array('fields' => $this->getExportationFieldSelectionDecorators(), 'title' => $this->getExportationTitle(), 'type' => $this->getExportationType(), 'allowUserTypeSelection' => $this->getExportationAllowUserTypeSelection()), $options));
  }

  public function getExportationAllowUserTypeSelection()
  {
    return false;
  }

  public function getExportationFieldSelection()
  {
    return array(  'lastname' =>   array(    'label' => 'Lastname',    'method' => 'getPersonLastname',    'decorator' => 'text',  ),  'person_firstname' =>   array(    'label' => 'Firstname',    'method' => 'getPersonFirstname',    'decorator' => 'text',  ),  'person_identification_type' =>   array(    'label' => 'Identification type',    'method' => 'getPersonIdentificationTypeString',    'decorator' => 'text',  ),  'person_identification_number' =>   array(    'label' => 'Identification number',    'method' => 'getPersonIdentificationNumber',    'decorator' => 'text',  ),  'person_birth_date' =>   array(    'label' => 'Birthdate',    'method' => 'getPersonFormattedBirthDate',    'decorator' => 'text',  ),  'person_email' =>   array(    'label' => 'Email',    'method' => 'getPersonEmail',    'decorator' => 'text',  ),  'person_phone' =>   array(    'label' => 'Phone',    'method' => 'getPersonPhone',    'decorator' => 'text',  ),  'person_address' =>   array(    'label' => 'Address',    'method' => 'getPersonAddress',    'decorator' => 'text',  ),  'person_health_coverage' =>   array(    'label' => 'Health coverage',    'method' => 'getHealthCoverage',    'decorator' => 'text',  ),  'person_emergency_information' =>   array(    'label' => 'Emergency information',    'method' => 'getEmergencyInformation',    'decorator' => 'text',  ),  'person_is_active' =>   array(    'label' => 'Is Active?',    'method' => 'getPersonIsActiveString',    'decorator' => 'text',  ),  'is_registered' =>   array(    'label' => 'School year registered?',    'method' => 'getIsRegisteredString',    'decorator' => 'text',  ),  'division' =>   array(    'label' => 'División/es',    'method' => 'getCurrentDivisionsString',    'decorator' => 'text',  ),  'current_year' =>   array(    'label' => 'Año de cursada',    'method' => 'getCurrentCourseYear',    'decorator' => 'integer',  ),  'repetitive_curse_subject' =>   array(    'label' => 'Materias que desaprobó',    'method' => 'getStudentDisapprovedCourseSubjectString',    'decorator' => 'text',  ),  'speciality' =>   array(    'label' => 'Especialidad',    'method' => 'getStudentSpecialityString',    'decorator' => 'text',  ),  'orientation' =>   array(    'label' => 'Orientación',    'method' => 'getStudentOrientationString',    'decorator' => 'text',  ),);
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
    return "Student list";
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
    return 'StudentForm';
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
    return 'StudentFormFilter';
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
    return 'doSelectJoinPerson';
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
