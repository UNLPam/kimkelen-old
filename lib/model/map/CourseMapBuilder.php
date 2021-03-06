<?php


/**
 * This class adds structure of 'course' table to 'propel' DatabaseMap object.
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
class CourseMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CourseMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(CoursePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CoursePeer::TABLE_NAME);
		$tMap->setPhpName('Course');
		$tMap->setClassname('Course');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('STARTS_AT', 'StartsAt', 'DATE', false, null);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 255);

		$tMap->addColumn('QUOTA', 'Quota', 'INTEGER', false, null);

		$tMap->addForeignKey('SCHOOL_YEAR_ID', 'SchoolYearId', 'INTEGER', 'school_year', 'ID', true, null);

		$tMap->addForeignKey('DIVISION_ID', 'DivisionId', 'INTEGER', 'division', 'ID', false, null);

		$tMap->addForeignKey('RELATED_DIVISION_ID', 'RelatedDivisionId', 'INTEGER', 'division', 'ID', false, null);

		$tMap->addColumn('IS_CLOSED', 'IsClosed', 'BOOLEAN', false, null);

		$tMap->addColumn('CURRENT_PERIOD', 'CurrentPeriod', 'INTEGER', false, null);

		$tMap->addColumn('IS_PATHWAY', 'IsPathway', 'BOOLEAN', false, null);

	} // doBuild()

} // CourseMapBuilder
