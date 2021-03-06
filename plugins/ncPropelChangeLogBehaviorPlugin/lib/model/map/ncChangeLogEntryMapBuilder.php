<?php


/**
 * This class adds structure of 'nc_change_log_entry' table to 'propel' DatabaseMap object.
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
 * @package    plugins.ncPropelChangeLogBehaviorPlugin.lib.model.map
 */
class ncChangeLogEntryMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.ncPropelChangeLogBehaviorPlugin.lib.model.map.ncChangeLogEntryMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ncChangeLogEntryPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ncChangeLogEntryPeer::TABLE_NAME);
		$tMap->setPhpName('ncChangeLogEntry');
		$tMap->setClassname('ncChangeLogEntry');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CLASS_NAME', 'ClassName', 'VARCHAR', true, 255);

		$tMap->addColumn('OBJECT_PK', 'ObjectPk', 'INTEGER', true, null);

		$tMap->addColumn('CHANGES_DETAIL', 'ChangesDetail', 'LONGVARCHAR', true, null);

		$tMap->addColumn('USERNAME', 'Username', 'VARCHAR', false, 255);

		$tMap->addColumn('OPERATION_TYPE', 'OperationType', 'INTEGER', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

	} // doBuild()

} // ncChangeLogEntryMapBuilder
