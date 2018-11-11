<?php


/**
 * This class adds structure of 'examination_subject_teacher' table to 'propel' DatabaseMap object.
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
class ExaminationSubjectTeacherMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ExaminationSubjectTeacherMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ExaminationSubjectTeacherPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ExaminationSubjectTeacherPeer::TABLE_NAME);
		$tMap->setPhpName('ExaminationSubjectTeacher');
		$tMap->setClassname('ExaminationSubjectTeacher');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignPrimaryKey('EXAMINATION_SUBJECT_ID', 'ExaminationSubjectId', 'INTEGER' , 'examination_subject', 'ID', true, null);

		$tMap->addForeignPrimaryKey('TEACHER_ID', 'TeacherId', 'INTEGER' , 'teacher', 'ID', true, null);

	} // doBuild()

} // ExaminationSubjectTeacherMapBuilder
