<?php


/**
 * This class adds structure of 'subject_configuration' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Thu Aug 23 21:09:09 2018
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class SubjectConfigurationMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SubjectConfigurationMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(SubjectConfigurationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SubjectConfigurationPeer::TABLE_NAME);
		$tMap->setPhpName('SubjectConfiguration');
		$tMap->setClassname('SubjectConfiguration');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('COURSE_MARKS', 'CourseMarks', 'INTEGER', true, null);

		$tMap->addColumn('FINAL_EXAMINATION_REQUIRED', 'FinalExaminationRequired', 'BOOLEAN', false, null);

		$tMap->addColumn('COURSE_REQUIRED', 'CourseRequired', 'BOOLEAN', false, null);

		$tMap->addColumn('COURSE_MINIMUN_MARK', 'CourseMinimunMark', 'INTEGER', false, null);

		$tMap->addColumn('COURSE_EXAMINATION_COUNT', 'CourseExaminationCount', 'INTEGER', true, null);

		$tMap->addColumn('MAX_PREVIOUS', 'MaxPrevious', 'INTEGER', true, null);

		$tMap->addColumn('EVALUATION_METHOD', 'EvaluationMethod', 'INTEGER', false, null);

		$tMap->addColumn('COURSE_TYPE', 'CourseType', 'INTEGER', false, null);

		$tMap->addColumn('ATTENDANCE_TYPE', 'AttendanceType', 'INTEGER', true, null);

		$tMap->addColumn('MAX_DISCIPLINARY_SANCTIONS', 'MaxDisciplinarySanctions', 'INTEGER', false, null);

		$tMap->addColumn('WHEN_DISAPPROVE_SHOW_STRING', 'WhenDisapproveShowString', 'BOOLEAN', false, null);

		$tMap->addColumn('NECESSARY_STUDENT_APPROVED_CAREER_SUBJECT_TO_SHOW_PROM_DEF', 'NecessaryStudentApprovedCareerSubjectToShowPromDef', 'BOOLEAN', false, null);

	} // doBuild()

} // SubjectConfigurationMapBuilder
