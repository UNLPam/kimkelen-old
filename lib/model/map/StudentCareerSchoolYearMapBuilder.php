<?php


/**
 * This class adds structure of 'student_career_school_year' table to 'propel' DatabaseMap object.
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
class StudentCareerSchoolYearMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.StudentCareerSchoolYearMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(StudentCareerSchoolYearPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(StudentCareerSchoolYearPeer::TABLE_NAME);
		$tMap->setPhpName('StudentCareerSchoolYear');
		$tMap->setClassname('StudentCareerSchoolYear');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CAREER_SCHOOL_YEAR_ID', 'CareerSchoolYearId', 'INTEGER', 'career_school_year', 'ID', true, null);

		$tMap->addForeignKey('STUDENT_ID', 'StudentId', 'INTEGER', 'student', 'ID', true, null);

		$tMap->addColumn('YEAR', 'Year', 'INTEGER', true, null);

		$tMap->addColumn('STATUS', 'Status', 'INTEGER', false, null);

		$tMap->addColumn('IS_PROCESSED', 'IsProcessed', 'BOOLEAN', false, null);

	} // doBuild()

} // StudentCareerSchoolYearMapBuilder
