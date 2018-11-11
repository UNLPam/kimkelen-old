<?php


/**
 * This class adds structure of 'course_subject_student_pathway' table to 'propel' DatabaseMap object.
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
class CourseSubjectStudentPathwayMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CourseSubjectStudentPathwayMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(CourseSubjectStudentPathwayPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CourseSubjectStudentPathwayPeer::TABLE_NAME);
		$tMap->setPhpName('CourseSubjectStudentPathway');
		$tMap->setClassname('CourseSubjectStudentPathway');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('STUDENT_ID', 'StudentId', 'INTEGER', 'student', 'ID', true, null);

		$tMap->addForeignKey('COURSE_SUBJECT_ID', 'CourseSubjectId', 'INTEGER', 'course_subject', 'ID', true, null);

		$tMap->addColumn('MARK', 'Mark', 'DECIMAL', false, 5);

		$tMap->addColumn('APPROVAL_DATE', 'ApprovalDate', 'DATE', false, null);

		$tMap->addForeignKey('PATHWAY_STUDENT_ID', 'PathwayStudentId', 'INTEGER', 'pathway_student', 'ID', true, null);

	} // doBuild()

} // CourseSubjectStudentPathwayMapBuilder
