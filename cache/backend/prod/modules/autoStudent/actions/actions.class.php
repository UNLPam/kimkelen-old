<?php

require_once(dirname(__FILE__).'/../lib/BaseStudentGeneratorConfiguration.class.php');
require_once(dirname(__FILE__).'/../lib/BaseStudentGeneratorHelper.class.php');
require_once(dirname(__FILE__).'/../lib/exporterHelper.php');
require_once(dirname(__FILE__).'/../lib/exporterHelperUser.php');
require_once(dirname(__FILE__).'/../lib/exporterXls.php');
require_once(dirname(__FILE__).'/../lib/exporterCsv.php');
require_once(dirname(__FILE__).'/../lib/exporterForm.php');


/**
 * student actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage student
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 12493 2008-10-31 14:43:26Z fabien $
 */
class autoStudentActions extends sfActions
{
  public function preExecute()
  {
    $this->configuration = new studentGeneratorConfiguration();

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
        $this->student = $this->getRoute()->getObject();
        $this->forward404Unless($this->student->$condition());
      }
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new studentGeneratorHelper();
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

      $this->redirect('@student');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues(), true);

      $this->redirect('@student');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->student = $this->form->getObject();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->student = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->student = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->student);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->student = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->student);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->student = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->student);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->setDeleteFlash();

    $this->redirect('@student');
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

      $this->redirect('@student');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@student');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorPropelChoiceMany(array('model' => 'Student'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      $objects = StudentPeer::retrieveByPks($ids);

      // execute batch
      $this->$method($request, $objects);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect('@student');
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

    $this->redirect('@student');
  }

  public function executeAllBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $peer_method = $this->configuration->getPeerMethod();
    $objects = call_user_func(array("StudentPeer", $peer_method), $this->buildCriteria());

    if (!count($objects))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@student');
    }

    if (!$action = $request->getParameter('all_batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@student');
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

    $this->redirect('@student');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $this->getProcessFormNotice($form->getObject()->isNew());

      $student = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $student)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->setProcessFormSaveAndAddFlash($notice);

        $this->redirect('@student_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        if($request->hasParameter('_save_and_list')){
          $this->redirect('@student');
        }
        else{
          $this->redirect('@student_edit?id='.$student->getId());
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
    return $this->getUser()->getAttribute('student.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters, $filtering = false)
  {
    $this->getUser()->setAttribute('student.filtering', $filtering, 'admin_module');
    
    return $this->getUser()->setAttribute('student.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Student');
    $pager->setCriteria($this->buildCriteria());
    $pager->setPage($this->getPage());
    $pager->setPeerMethod($this->configuration->getPeerMethod());
    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
    $pager->init();

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('student.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('student.page', 1, 'admin_module');
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

    
    $column = $this->configuration->getSortColumnNameForField(strtolower($sort[0]),'Student');
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
    if (!is_null($sort = $this->getUser()->getAttribute('student.sort', null, 'admin_module')))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('student.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (!is_null($sort[0]) && is_null($sort[1]))
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('student.sort', $sort, 'admin_module');
  }

    public function executeDoExportation(sfWebRequest $request)
  {
    $this->pageNumber       = $request->getParameter('page');

    if (empty($this->pageNumber))
    {
      $this->getUser()->setFlash('error', 'There was an error while trying to export the desired page.');
      $this->redirect('@student');
    }
    else
    {
      $this->exportationPager = $this->getExportationPager($this->configuration->getExportationType(), $this->pageNumber);

      $helperKlass    = $this->configuration->getExportationHelperClass();
      $exporterType   = $this->configuration->getExportationType();
      $this->exportationHelper = new $helperKlass($this->configuration, $this->getExportationResults($this->exportationPager), array('type' => $exporterType, 'context' => $this->getContext(), 'title' => $this->configuration->getExportationTitle(), 'headers' => $this->configuration->getExportationHeaders()));

      $this->exportationHelper->build();
      $this->exportationHelper->saveFile($this->configuration->getExportationSavePath().time().rand(1,1000).'.'.$this->configuration->getExportationFileExtension());
      $this->exportationHelper->freeMem();
      $this->content = $this->exportationHelper->getFileContents();
      $this->exportationHelper->deleteFile();
      $this->prepareResponseForExportation($this->configuration->getExportationFileExtension());

      return $this->renderText($this->content);
    }
  }

  public function executeDoExportationPages(sfWebRequest $request)
  {
    $this->exportationPager = $this->getExportationPager($this->configuration->getExportationType());
    return $this->renderPartial('student/exportation_pages', array('pager' => $this->exportationPager, 'exportUrl' => 'doExportation'));
  }

  public function executeNewUserExportation(sfWebRequest $request)
  {
    $this->form  = $this->configuration->getExportationForm(array(), array('pager' => $this->getExportationPager(), 'configuration' => $this->configuration));
  }

  public function executeCreateUserExportation(sfWebRequest $request)
  {
    $this->pager = $this->getExportationPager();
    $this->form  = $this->configuration->getExportationForm(array(), array('pager' => $this->pager, 'configuration' => $this->configuration));

    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
    if ($this->form->isValid())
    {
      $values = $this->form->getValues();
      if ( $this->form->isCSRFProtected() )
      {
        $values = array_merge($values,array($this->form->getCSRFFieldName() => $this->form->getCSRFToken() ));
      }
      $this->getUser()->setAttribute('student.exportation_form_values', $values);
      $this->setTemplate('createUserExportation');
    }
    else
    {
      $this->setTemplate('newUserExportation');
    }
  }

  public function getExportationFileExtension($form)
  {
    return $this->configuration->getExportationFileExtension($form->getExportationType());
  }

  public function executeProcessUserExportation(sfWebRequest $request)
  {
    $this->pageNumber            = $request->getParameter('page');
    $this->exportationFormValues = $this->getUser()->getAttribute('student.exportation_form_values', array());

    if (!empty($this->pageNumber) && !empty($this->exportationFormValues))
    {
      $this->form = $this->configuration->getExportationForm(array(), array('pager' => $this->getExportationPager(null, $this->pageNumber), 'configuration' => $this->configuration));
      $this->form->bind($this->exportationFormValues);
      if ($this->form->isValid())
      {
        $helperKlass    = $this->configuration->getExportationHelperUserClass();
        $exporterType   = $this->form->getExportationType();

        $this->exportationPager = $this->form->getExportationPager();

        $this->exportationHelper = new $helperKlass($this->configuration, $this->form->getExportationResults(), array('type' => $this->form->getExportationType(), 'context' => $this->getContext(), 'title' => $this->configuration->getExportationTitle(), 'headers' => $this->configuration->getExportationHeaders()), $this->form);

        $this->exportationHelper->build();
        $this->exportationHelper->saveFile($this->configuration->getExportationSavePath().time().rand(1,1000).'.'.$this->getExportationFileExtension($this->form));
        $this->exportationHelper->freeMem();
        $this->content = $this->exportationHelper->getFileContents();
        $this->exportationHelper->deleteFile();
        $this->prepareResponseForExportation($this->getExportationFileExtension($this->form));

        return $this->renderText($this->content);
      }
      else
      {
        $this->getUser()->setFlash('error', 'There was an error while trying to export the desired page.');
        $this->redirect('@student');
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'There was an error while trying to export the desired page.');
      $this->redirect('@student');
    }
  }

  public function getExportationResults($pager)
  {
    return $pager->getResults();
  }

  public function prepareResponseForExportation($extension)
  {
    sfConfig::set('sf_web_debug', false);
    $this->setLayout(false);
    
    $mimeType = $this->configuration->getExportationMimeType($extension);
    $this->getResponse()->setHttpHeader('Content-type', "$mimeType; charset=UTF-8");
    $this->getResponse()->setHttpHeader('Content-Disposition', ' attachment; filename="'.$this->configuration->getExportationFileName($extension).'"');
    $this->getResponse()->setHttpHeader('Cache-Control', ' maxage=3600');
    $this->getResponse()->setHttpHeader('Pragma', 'public');
  }
    protected function getExportationPager($type = null, $page = null)
  {
    $pager = $this->configuration->getExportationPager('Student', $type);
    $pager->setCriteria($this->buildExportationCriteria());
    $pager->setPage($this->getExportationPage());
    $pager->setPeerMethod($this->configuration->getPeerMethod());
    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());

    if (!is_null($page)) $pager->setPage($page);
    $pager->init();

    return $pager;
  }

  protected function setExportationPage($page)
  {
    $this->getUser()->setAttribute('student.exportation_page', $page, 'admin_module');
  }

  protected function getExportationPage()
  {
    return $this->getUser()->getAttribute('student.exportation_page', 1, 'admin_module');
  }

  protected function buildExportationCriteria()
  {
    return $this->buildCriteria();
  }


}
