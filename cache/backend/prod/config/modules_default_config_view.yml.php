<?php
// auto-generated by sfViewConfigHandler
// date: 2018/09/25 15:21:49
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Kimkëlen', false, false);
  $response->addMeta('description', 'Sistema de gestión de alumnos - CeSPI - UNLP', false, false);
  $response->addMeta('keywords', 'Kimkelen, Cespi, unlp, alumnos', false, false);
  $response->addMeta('language', 'es_AR', false, false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('smoothness/jquery-ui-1.7.2.custom.css', '', array ());
  $response->addStylesheet('/pmJSCookMenuPlugin/css/ThemePanel/theme.css', '', array ());
  $response->addJavascript('jquery.js', '', array ());
  $response->addJavascript('jquery-ui.js', '', array ());
  $response->addJavascript('jquery.cookie.js', '', array ());
  $response->addJavascript('no-conflict.js', '', array ());
  $response->addJavascript('/sfProtoculousPlugin/js/prototype.js', '', array ());
  $response->addJavascript('main.js', '', array ());
  $response->addJavascript('jquery.notification.js', '', array ());
  $response->addJavascript('i18n/ui.datepicker-es.js', '', array ());
  $response->addJavascript('/pmJSCookMenuPlugin/js/JSCookMenu.js', '', array ());
  $response->addJavascript('/pmJSCookMenuPlugin/js/ThemePanel/theme.js', '', array ());


