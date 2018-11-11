<?php

/**
 * division_course module exporter helper with user selection.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage division_course
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: exporter.php 14891 2009-01-20 06:47:03Z dwhittle $
 */
class BaseDivision_courseExporterHelperUser extends gmExporterHelperUser
{
  protected function getExporterSubclassPrefix()
  {
    return 'division_course';
  }
}
