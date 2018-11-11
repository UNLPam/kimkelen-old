<?php

/**
 * shared_course module exporter helper with user selection.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage shared_course
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: exporter.php 14891 2009-01-20 06:47:03Z dwhittle $
 */
class BaseShared_courseExporterHelperUser extends gmExporterHelperUser
{
  protected function getExporterSubclassPrefix()
  {
    return 'shared_course';
  }
}
