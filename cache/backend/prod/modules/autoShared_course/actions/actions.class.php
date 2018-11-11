<?php

require_once(dirname(__FILE__).'/../lib/BaseShared_courseGeneratorConfiguration.class.php');
require_once(dirname(__FILE__).'/../lib/BaseShared_courseGeneratorHelper.class.php');
require_once(dirname(__FILE__).'/../lib/exporterHelper.php');
require_once(dirname(__FILE__).'/../lib/exporterHelperUser.php');
require_once(dirname(__FILE__).'/../lib/exporterXls.php');
require_once(dirname(__FILE__).'/../lib/exporterCsv.php');
require_once(dirname(__FILE__).'/../lib/exporterForm.php');


/**
 * shared_course actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage shared_course
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 12493 2008-10-31 14:43:26Z fabien $
 */
class autoShared_courseActions extends sfActions
{
  public function preExecute()
  {
    $this->configuration = new shared_courseGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    if ($condition = $this->configuration->getCondition($this->getActionName()))
    {
      if ($this->getActionName() == 'new')
      {
        $this->forward404Unless($this->getUser()->$condition());
      }
      else
      {
        $this->course = $this->getRoute()->getObject();
        $this->forward404Unless($this->course->$condition());
      }
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new shared_courseGeneratorHelper();
  }

  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort'))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@shared_course');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues(), true);

      $this->redirect('@shared_course');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->course = $this->form->getObject();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->course = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->course = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->course);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->course = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->course);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->course = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->course);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->setDeleteFlash();

    $this->redirect('@shared_course');
  }

  public function setDeleteFlash()
  {
    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
  }

  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@shared_course');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@shared_course');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorPropelChoiceMany(array('model' => 'Course'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      $objects = CoursePeer::retrieveByPks($ids);

      // execute batch
      $this->$method($request, $objects);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect('@shared_course');
  }

  protected function executeBatchDelete(sfWebRequest $request, $objects)
  {
    $count = 0;
    foreach ($objects as $object)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $object)));

      $object->delete();
      if ($object->isDeleted())
      {
        $count++;
      }
    }

    if ($count >= count($objects))
    {
      $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    }
    else
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items.');
    }

    $this->redirect('@shared_course');
  }

  public function executeAllBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $peer_method = $this->configuration->getPeerMethod();
    $objects = call_user_func(array("CoursePeer", $peer_method), $this->buildCriteria());

    if (!count($objects))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@shared_course');
    }

    if (!$action = $request->getParameter('all_batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@shared_course');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    // execute batch
    $this->$method($request, $objects);

    $this->redirect('@shared_course');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $this->getProcessFormNotice($form->getObject()->isNew());

      $course = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $course)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->setProcessFormSaveAndAddFlash($notice);

        $this->redirect('@shared_course_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        if($request->hasParameter('_save_and_list')){
          $this->redirect('@shared_course');
        }
        else{
          $this->redirect('@shared_course_edit?id='.$course->getId());
        }
      }
    }
    else
    {
      $this->setProcessFormErrorFlash();
    }
  }

  public function getProcessFormNotice($new)
  {
    return $new ? 'The item was created successfully.' : 'The item was updated successfully.';
  }

  public function setProcessFormErrorFlash()
  {
    $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
  }

  public function setProcessFormSaveAndAddFlash($notice)
  {
    $this->getUser()->setFlash('notice', $notice.' You can add another one below.');
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('shared_course.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters, $filtering = false)
  {
    $this->getUser()->setAttribute('shared_course.filtering', $filtering, 'admin_module');
    
    return $this->getUser()->setAttribute('shared_course.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Course');
    $pager->setCriteria($this->buildCriteria());
    $pager->setPage($this->getPage());
    $pager->setPeerMethod($this->configuration->getPeerMethod());
    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
    $pager->init();

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('shared_course.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('shared_course.page', 1, 'admin_module');
  }

  protected function buildCriteria()
  {
    if ($this->configuration->hasFilterForm())
    {
      if (is_null($this->filters))
      {
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
      }

      $criteria = $this->filters->buildCriteria($this->getFilters());
    } else {
    $criteria = new Criteria();
    }

    $this->addSortCriteria($criteria);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
    $criteria = $event->getReturnValue();

    return $criteria;
  }

  protected function addSortCriteria($criteria)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    
    $column = $this->configuration->getSortColumnNameForField(strtolower($sort[0]),'Course');
    if ('asc' == $sort[1])
    {
      $criteria->addAscendingOrderByColumn($column);
    }
    else
    {
      $criteria->addDescendingOrderByColumn($column);
    }
  }

  protected function getSort()
  {
    if (!is_null($sort = $this->getUser()->getAttribute('shared_course.sort', null, 'admin_module')))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('shared_course.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (!is_null($sort[0]) && is_null($sort[1]))
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('shared_course.sort', $sort, 'admin_module');
  }



}
