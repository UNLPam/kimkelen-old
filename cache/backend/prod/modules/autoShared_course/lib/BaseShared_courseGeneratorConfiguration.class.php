<?php

/**
 * shared_course module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage shared_course
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 12831 2008-11-09 14:33:38Z fabien $
 */
class BaseShared_courseGeneratorConfiguration extends sfRevisitedModelGeneratorConfiguration
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
    return array(  '_edit' =>   array(    'condition' => 'canBeEdited',    'credentials' =>     array(      0 => 'edit_course',    ),  ),  'manage_course_days' =>   array(    'action' => 'manageCourseDays',    'label' => 'Manage course days',    'credentials' =>     array(      0 => 'edit_course',    ),  ),  'manage_students' =>   array(    'action' => 'courseSubjectStudent',    'credentials' =>     array(      0 => 'edit_course',    ),    'condition' => 'canManageStudents',  ),  'teachers' =>   array(    'action' => 'courseTeachers',    'credentials' =>     array(      0 => 'edit_course',    ),  ),  'close' =>   array(    'label' => 'Close period',    'action' => 'close',    'credentials' =>     array(      0 => 'close_course',    ),    'condition' => 'canBeClosed',  ),  'revert_period' =>   array(    'label' => 'Back to period',    'action' => 'backPeriod',    'credentials' =>     array(      0 => 'back_period_course',    ),    'condition' => 'canBackPeriod',    'params' => 'confirm=\'Are you sure?\'',  ),  '_delete' =>   array(    'condition' => 'canBeDeleted',    'credentials' =>     array(      0 => 'delete_division',    ),  ),);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,  '_show' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
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
    return '%%id%% - %%starts_at%% - %%name%% - %%quota%% - %%school_year_id%% - %%division_id%% - %%related_division_id%% - %%is_closed%% - %%current_period%% - %%is_pathway%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Shared course List';
  }

  public function getEditTitle()
  {
    return 'Edit Shared course';
  }

  public function getNewTitle()
  {
    return 'New Shared course';
  }

  public function getShowTitle()
  {
    return 'Show Shared course';
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
    return array(  'Curso' =>   array(    0 => '_course_show_tabs',  ),);
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => 'starts_at',  2 => 'name',  3 => 'quota',  4 => 'school_year_id',  5 => 'division_id',  6 => 'related_division_id',  7 => 'is_closed',  8 => 'current_period',  9 => 'is_pathway',);
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
