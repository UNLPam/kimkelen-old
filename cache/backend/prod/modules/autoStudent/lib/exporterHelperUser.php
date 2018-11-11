<?php

/**
 * student module exporter helper with user selection.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage student
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: exporter.php 14891 2009-01-20 06:47:03Z dwhittle $
 */
class BaseStudentExporterHelperUser extends gmExporterHelperUser
{
  protected function getExporterSubclassPrefix()
  {
    return 'student';
  }
}
