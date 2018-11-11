<?php


/**
 * This class adds structure of 'course_subject_teacher' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Thu Aug 23 21:09:08 2018
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CourseSubjectTeacherMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CourseSubjectTeacherMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(CourseSubjectTeacherPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CourseSubjectTeacherPeer::TABLE_NAME);
		$tMap->setPhpName('CourseSubjectTeacher');
		$tMap->setClassname('CourseSubjectTeacher');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('TEACHER_ID', 'TeacherId', 'INTEGER', 'teacher', 'ID', true, null);

		$tMap->addForeignKey('COURSE_SUBJECT_ID', 'CourseSubjectId', 'INTEGER', 'course_subject', 'ID', true, null);

		$tMap->addForeignKey('SITUATION_R_ID', 'SituationRId', 'INTEGER', 'situation_r', 'ID', true, null);

		$tMap->addColumn('DATE_FROM', 'DateFrom', 'DATE', true, null);

		$tMap->addColumn('DATE_TO', 'DateTo', 'DATE', true, null);

	} // doBuild()

} // CourseSubjectTeacherMapBuilder
