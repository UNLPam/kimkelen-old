<?php

/**
 * Base class that represents a row from the 'student_career_school_year_conduct' table.
 *
 * Cada tupla representa el comportamiento de un alumno en un periodo
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Thu Aug 23 21:09:10 2018
 *
 * @package    lib.model.om
 */
abstract class BaseStudentCareerSchoolYearConduct extends BaseObject  implements Persistent {


  const PEER = 'StudentCareerSchoolYearConductPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        StudentCareerSchoolYearConductPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the student_career_school_year_id field.
	 * @var        int
	 */
	protected $student_career_school_year_id;

	/**
	 * The value for the conduct_id field.
	 * @var        int
	 */
	protected $conduct_id;

	/**
	 * The value for the career_school_year_period_id field.
	 * @var        int
	 */
	protected $career_school_year_period_id;

	/**
	 * @var        StudentCareerSchoolYear
	 */
	protected $aStudentCareerSchoolYear;

	/**
	 * @var        Conduct
	 */
	protected $aConduct;

	/**
	 * @var        CareerSchoolYearPeriod
	 */
	protected $aCareerSchoolYearPeriod;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Initializes internal state of BaseStudentCareerSchoolYearConduct object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [student_career_school_year_id] column value.
	 * Referencia a un estudainte en una carrera para un año lectivo
	 * @return     int
	 */
	public function getStudentCareerSchoolYearId()
	{
		return $this->student_career_school_year_id;
	}

	/**
	 * Get the [conduct_id] column value.
	 * Referencia a la conducta
	 * @return     int
	 */
	public function getConductId()
	{
		return $this->conduct_id;
	}

	/**
	 * Get the [career_school_year_period_id] column value.
	 * Referencia a un periodo
	 * @return     int
	 */
	public function getCareerSchoolYearPeriodId()
	{
		return $this->career_school_year_period_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = StudentCareerSchoolYearConductPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = StudentCareerSchoolYearConductPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Set the value of [student_career_school_year_id] column.
	 * Referencia a un estudainte en una carrera para un año lectivo
	 * @param      int $v new value
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 */
	public function setStudentCareerSchoolYearId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->student_career_school_year_id !== $v) {
			$this->student_career_school_year_id = $v;
			$this->modifiedColumns[] = StudentCareerSchoolYearConductPeer::STUDENT_CAREER_SCHOOL_YEAR_ID;
		}

		if ($this->aStudentCareerSchoolYear !== null && $this->aStudentCareerSchoolYear->getId() !== $v) {
			$this->aStudentCareerSchoolYear = null;
		}

		return $this;
	} // setStudentCareerSchoolYearId()

	/**
	 * Set the value of [conduct_id] column.
	 * Referencia a la conducta
	 * @param      int $v new value
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 */
	public function setConductId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conduct_id !== $v) {
			$this->conduct_id = $v;
			$this->modifiedColumns[] = StudentCareerSchoolYearConductPeer::CONDUCT_ID;
		}

		if ($this->aConduct !== null && $this->aConduct->getId() !== $v) {
			$this->aConduct = null;
		}

		return $this;
	} // setConductId()

	/**
	 * Set the value of [career_school_year_period_id] column.
	 * Referencia a un periodo
	 * @param      int $v new value
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 */
	public function setCareerSchoolYearPeriodId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->career_school_year_period_id !== $v) {
			$this->career_school_year_period_id = $v;
			$this->modifiedColumns[] = StudentCareerSchoolYearConductPeer::CAREER_SCHOOL_YEAR_PERIOD_ID;
		}

		if ($this->aCareerSchoolYearPeriod !== null && $this->aCareerSchoolYearPeriod->getId() !== $v) {
			$this->aCareerSchoolYearPeriod = null;
		}

		return $this;
	} // setCareerSchoolYearPeriodId()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->created_at = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->student_career_school_year_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->conduct_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->career_school_year_period_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = StudentCareerSchoolYearConductPeer::NUM_COLUMNS - StudentCareerSchoolYearConductPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating StudentCareerSchoolYearConduct object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aStudentCareerSchoolYear !== null && $this->student_career_school_year_id !== $this->aStudentCareerSchoolYear->getId()) {
			$this->aStudentCareerSchoolYear = null;
		}
		if ($this->aConduct !== null && $this->conduct_id !== $this->aConduct->getId()) {
			$this->aConduct = null;
		}
		if ($this->aCareerSchoolYearPeriod !== null && $this->career_school_year_period_id !== $this->aCareerSchoolYearPeriod->getId()) {
			$this->aCareerSchoolYearPeriod = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(StudentCareerSchoolYearConductPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = StudentCareerSchoolYearConductPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aStudentCareerSchoolYear = null;
			$this->aConduct = null;
			$this->aCareerSchoolYearPeriod = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseStudentCareerSchoolYearConduct:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(StudentCareerSchoolYearConductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			StudentCareerSchoolYearConductPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseStudentCareerSchoolYearConduct:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseStudentCareerSchoolYearConduct:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(StudentCareerSchoolYearConductPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(StudentCareerSchoolYearConductPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseStudentCareerSchoolYearConduct:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			StudentCareerSchoolYearConductPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aStudentCareerSchoolYear !== null) {
				if ($this->aStudentCareerSchoolYear->isModified() || $this->aStudentCareerSchoolYear->isNew()) {
					$affectedRows += $this->aStudentCareerSchoolYear->save($con);
				}
				$this->setStudentCareerSchoolYear($this->aStudentCareerSchoolYear);
			}

			if ($this->aConduct !== null) {
				if ($this->aConduct->isModified() || $this->aConduct->isNew()) {
					$affectedRows += $this->aConduct->save($con);
				}
				$this->setConduct($this->aConduct);
			}

			if ($this->aCareerSchoolYearPeriod !== null) {
				if ($this->aCareerSchoolYearPeriod->isModified() || $this->aCareerSchoolYearPeriod->isNew()) {
					$affectedRows += $this->aCareerSchoolYearPeriod->save($con);
				}
				$this->setCareerSchoolYearPeriod($this->aCareerSchoolYearPeriod);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = StudentCareerSchoolYearConductPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = StudentCareerSchoolYearConductPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += StudentCareerSchoolYearConductPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aStudentCareerSchoolYear !== null) {
				if (!$this->aStudentCareerSchoolYear->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aStudentCareerSchoolYear->getValidationFailures());
				}
			}

			if ($this->aConduct !== null) {
				if (!$this->aConduct->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aConduct->getValidationFailures());
				}
			}

			if ($this->aCareerSchoolYearPeriod !== null) {
				if (!$this->aCareerSchoolYearPeriod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCareerSchoolYearPeriod->getValidationFailures());
				}
			}


			if (($retval = StudentCareerSchoolYearConductPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = StudentCareerSchoolYearConductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCreatedAt();
				break;
			case 2:
				return $this->getStudentCareerSchoolYearId();
				break;
			case 3:
				return $this->getConductId();
				break;
			case 4:
				return $this->getCareerSchoolYearPeriodId();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = StudentCareerSchoolYearConductPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreatedAt(),
			$keys[2] => $this->getStudentCareerSchoolYearId(),
			$keys[3] => $this->getConductId(),
			$keys[4] => $this->getCareerSchoolYearPeriodId(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = StudentCareerSchoolYearConductPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCreatedAt($value);
				break;
			case 2:
				$this->setStudentCareerSchoolYearId($value);
				break;
			case 3:
				$this->setConductId($value);
				break;
			case 4:
				$this->setCareerSchoolYearPeriodId($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = StudentCareerSchoolYearConductPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreatedAt($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStudentCareerSchoolYearId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setConductId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCareerSchoolYearPeriodId($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(StudentCareerSchoolYearConductPeer::DATABASE_NAME);

		if ($this->isColumnModified(StudentCareerSchoolYearConductPeer::ID)) $criteria->add(StudentCareerSchoolYearConductPeer::ID, $this->id);
		if ($this->isColumnModified(StudentCareerSchoolYearConductPeer::CREATED_AT)) $criteria->add(StudentCareerSchoolYearConductPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(StudentCareerSchoolYearConductPeer::STUDENT_CAREER_SCHOOL_YEAR_ID)) $criteria->add(StudentCareerSchoolYearConductPeer::STUDENT_CAREER_SCHOOL_YEAR_ID, $this->student_career_school_year_id);
		if ($this->isColumnModified(StudentCareerSchoolYearConductPeer::CONDUCT_ID)) $criteria->add(StudentCareerSchoolYearConductPeer::CONDUCT_ID, $this->conduct_id);
		if ($this->isColumnModified(StudentCareerSchoolYearConductPeer::CAREER_SCHOOL_YEAR_PERIOD_ID)) $criteria->add(StudentCareerSchoolYearConductPeer::CAREER_SCHOOL_YEAR_PERIOD_ID, $this->career_school_year_period_id);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(StudentCareerSchoolYearConductPeer::DATABASE_NAME);

		$criteria->add(StudentCareerSchoolYearConductPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of StudentCareerSchoolYearConduct (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setStudentCareerSchoolYearId($this->student_career_school_year_id);

		$copyObj->setConductId($this->conduct_id);

		$copyObj->setCareerSchoolYearPeriodId($this->career_school_year_period_id);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     StudentCareerSchoolYearConduct Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     StudentCareerSchoolYearConductPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new StudentCareerSchoolYearConductPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a StudentCareerSchoolYear object.
	 *
	 * @param      StudentCareerSchoolYear $v
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setStudentCareerSchoolYear(StudentCareerSchoolYear $v = null)
	{
		if ($v === null) {
			$this->setStudentCareerSchoolYearId(NULL);
		} else {
			$this->setStudentCareerSchoolYearId($v->getId());
		}

		$this->aStudentCareerSchoolYear = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the StudentCareerSchoolYear object, it will not be re-added.
		if ($v !== null) {
			$v->addStudentCareerSchoolYearConduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated StudentCareerSchoolYear object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     StudentCareerSchoolYear The associated StudentCareerSchoolYear object.
	 * @throws     PropelException
	 */
	public function getStudentCareerSchoolYear(PropelPDO $con = null)
	{
		if ($this->aStudentCareerSchoolYear === null && ($this->student_career_school_year_id !== null)) {
			$c = new Criteria(StudentCareerSchoolYearPeer::DATABASE_NAME);
			$c->add(StudentCareerSchoolYearPeer::ID, $this->student_career_school_year_id);
			$this->aStudentCareerSchoolYear = StudentCareerSchoolYearPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aStudentCareerSchoolYear->addStudentCareerSchoolYearConducts($this);
			 */
		}
		return $this->aStudentCareerSchoolYear;
	}

	/**
	 * Declares an association between this object and a Conduct object.
	 *
	 * @param      Conduct $v
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setConduct(Conduct $v = null)
	{
		if ($v === null) {
			$this->setConductId(NULL);
		} else {
			$this->setConductId($v->getId());
		}

		$this->aConduct = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Conduct object, it will not be re-added.
		if ($v !== null) {
			$v->addStudentCareerSchoolYearConduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated Conduct object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Conduct The associated Conduct object.
	 * @throws     PropelException
	 */
	public function getConduct(PropelPDO $con = null)
	{
		if ($this->aConduct === null && ($this->conduct_id !== null)) {
			$c = new Criteria(ConductPeer::DATABASE_NAME);
			$c->add(ConductPeer::ID, $this->conduct_id);
			$this->aConduct = ConductPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aConduct->addStudentCareerSchoolYearConducts($this);
			 */
		}
		return $this->aConduct;
	}

	/**
	 * Declares an association between this object and a CareerSchoolYearPeriod object.
	 *
	 * @param      CareerSchoolYearPeriod $v
	 * @return     StudentCareerSchoolYearConduct The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCareerSchoolYearPeriod(CareerSchoolYearPeriod $v = null)
	{
		if ($v === null) {
			$this->setCareerSchoolYearPeriodId(NULL);
		} else {
			$this->setCareerSchoolYearPeriodId($v->getId());
		}

		$this->aCareerSchoolYearPeriod = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the CareerSchoolYearPeriod object, it will not be re-added.
		if ($v !== null) {
			$v->addStudentCareerSchoolYearConduct($this);
		}

		return $this;
	}


	/**
	 * Get the associated CareerSchoolYearPeriod object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     CareerSchoolYearPeriod The associated CareerSchoolYearPeriod object.
	 * @throws     PropelException
	 */
	public function getCareerSchoolYearPeriod(PropelPDO $con = null)
	{
		if ($this->aCareerSchoolYearPeriod === null && ($this->career_school_year_period_id !== null)) {
			$c = new Criteria(CareerSchoolYearPeriodPeer::DATABASE_NAME);
			$c->add(CareerSchoolYearPeriodPeer::ID, $this->career_school_year_period_id);
			$this->aCareerSchoolYearPeriod = CareerSchoolYearPeriodPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCareerSchoolYearPeriod->addStudentCareerSchoolYearConducts($this);
			 */
		}
		return $this->aCareerSchoolYearPeriod;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aStudentCareerSchoolYear = null;
			$this->aConduct = null;
			$this->aCareerSchoolYearPeriod = null;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseStudentCareerSchoolYearConduct:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseStudentCareerSchoolYearConduct::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseStudentCareerSchoolYearConduct
