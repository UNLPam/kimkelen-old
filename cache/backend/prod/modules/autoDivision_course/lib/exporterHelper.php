<?php

/**
 * division_course module exporter.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage division_course
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: exporter.php 14891 2009-01-20 06:47:03Z dwhittle $
 */
class BaseDivision_courseExporterHelper extends gmExporterHelper
{
  protected function getExporterSubclassPrefix()
  {
    return 'division_course';
  }
}
