
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- student_career_subject_allowed
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_career_subject_allowed`;


CREATE TABLE `student_career_subject_allowed`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`career_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la materia de una carrera',
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	PRIMARY KEY (`id`,`career_subject_id`,`student_id`),
	UNIQUE KEY `career_subject_student` (`career_subject_id`, `student_id`),
	KEY `career_subject_student_index`(`student_id`, `career_subject_id`),
	CONSTRAINT `student_career_subject_allowed_FK_1`
		FOREIGN KEY (`career_subject_id`)
		REFERENCES `career_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT `student_career_subject_allowed_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa que materias puede cursar un alumno';

#-----------------------------------------------------------------------------
#-- course
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course`;


CREATE TABLE `course`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`starts_at` DATE COMMENT 'Indica el dia que se empieza a cursar',
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre del curso',
	`quota` INTEGER COMMENT 'Entero que representa la capacidad de alumnos que pueden estar inscriptos',
	`school_year_id` INTEGER  NOT NULL,
	`division_id` INTEGER,
	`related_division_id` INTEGER default null COMMENT 'En caso de que una comision, se quiera relacionar con una division.',
	`is_closed` TINYINT default 0,
	`current_period` INTEGER default 1,
	`is_pathway` TINYINT default 0,
	PRIMARY KEY (`id`),
	KEY `course_division`(`school_year_id`, `division_id`),
	CONSTRAINT `course_FK_1`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON DELETE RESTRICT,
	INDEX `course_FI_2` (`division_id`),
	CONSTRAINT `course_FK_2`
		FOREIGN KEY (`division_id`)
		REFERENCES `division` (`id`)
		ON DELETE CASCADE,
	INDEX `course_FI_3` (`related_division_id`),
	CONSTRAINT `course_FK_3`
		FOREIGN KEY (`related_division_id`)
		REFERENCES `division` (`id`)
		ON DELETE SET NULL
)Engine=InnoDB COMMENT='Representa un curso para una materia';

#-----------------------------------------------------------------------------
#-- course_subject_configuration
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject_configuration`;


CREATE TABLE `course_subject_configuration`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`course_subject_id` INTEGER,
	`division_id` INTEGER,
	`career_school_year_period_id` INTEGER COMMENT 'Referencia a al periodo padre (En caso de ser un bimestre, señala a un cuatrimestre padre).',
	`max_absence` FLOAT COMMENT 'Define la cantidad de faltas permitidas en un periodo',
	PRIMARY KEY (`id`),
	KEY `course_subject_configuration`(`course_subject_id`, `division_id`, `career_school_year_period_id`),
	CONSTRAINT `course_subject_configuration_FK_1`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON DELETE CASCADE,
	INDEX `course_subject_configuration_FI_2` (`division_id`),
	CONSTRAINT `course_subject_configuration_FK_2`
		FOREIGN KEY (`division_id`)
		REFERENCES `division` (`id`)
		ON DELETE CASCADE,
	INDEX `course_subject_configuration_FI_3` (`career_school_year_period_id`),
	CONSTRAINT `course_subject_configuration_FK_3`
		FOREIGN KEY (`career_school_year_period_id`)
		REFERENCES `career_school_year_period` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa la configuracion de un curso';

#-----------------------------------------------------------------------------
#-- course_preceptor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_preceptor`;


CREATE TABLE `course_preceptor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`preceptor_id` INTEGER  NOT NULL,
	`course_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_course_preceptor` (`preceptor_id`, `course_id`),
	KEY `course_preceptor`(`preceptor_id`, `course_id`),
	CONSTRAINT `course_preceptor_FK_1`
		FOREIGN KEY (`preceptor_id`)
		REFERENCES `personal` (`id`)
		ON DELETE RESTRICT,
	INDEX `course_preceptor_FI_2` (`course_id`),
	CONSTRAINT `course_preceptor_FK_2`
		FOREIGN KEY (`course_id`)
		REFERENCES `course` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa la relación entre un curso y su/sus preceptores a cargo';

#-----------------------------------------------------------------------------
#-- course_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject`;


CREATE TABLE `course_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`course_id` INTEGER  NOT NULL,
	`career_subject_school_year_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `course_subject_unique` (`course_id`, `career_subject_school_year_id`),
	KEY `course_subject`(`course_id`, `career_subject_school_year_id`),
	CONSTRAINT `course_subject_FK_1`
		FOREIGN KEY (`course_id`)
		REFERENCES `course` (`id`)
		ON DELETE CASCADE,
	INDEX `course_subject_FI_2` (`career_subject_school_year_id`),
	CONSTRAINT `course_subject_FK_2`
		FOREIGN KEY (`career_subject_school_year_id`)
		REFERENCES `career_subject_school_year` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa una materia dentro de un curso';

#-----------------------------------------------------------------------------
#-- course_subject_student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject_student`;


CREATE TABLE `course_subject_student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`course_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la cursada de una materia',
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`student_approved_course_subject_id` INTEGER COMMENT 'Si el estudiante aprobo la cursada existe esta relacion',
	`is_not_averageable` TINYINT default 0 COMMENT 'El alumno no será calificado numéricamente en este curso',
	PRIMARY KEY (`id`),
	UNIQUE KEY `course_subject_student_unique` (`course_subject_id`, `student_id`),
	KEY `course_subject_student`(`course_subject_id`, `student_id`),
	CONSTRAINT `course_subject_student_FK_1`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `course_subject_student_FI_2` (`student_id`),
	CONSTRAINT `course_subject_student_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `course_subject_student_FI_3` (`student_approved_course_subject_id`),
	CONSTRAINT `course_subject_student_FK_3`
		FOREIGN KEY (`student_approved_course_subject_id`)
		REFERENCES `student_approved_course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE SET NULL
)Engine=InnoDB COMMENT='Cada tupla representa un inscripto a una cursada de una materia';

#-----------------------------------------------------------------------------
#-- course_subject_teacher
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject_teacher`;


CREATE TABLE `course_subject_teacher`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`teacher_id` INTEGER  NOT NULL,
	`course_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la cursada de una materia',
	`situation_r_id` INTEGER  NOT NULL COMMENT 'Referencia la situación de revista del profesor en la materia actual',
	`date_from` DATE  NOT NULL,
	`date_to` DATE  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `teacher_course_subject_unique` (`teacher_id`, `course_subject_id`, `situation_r_id`),
	KEY `teacher_course_subject`(`teacher_id`, `course_subject_id`, `situation_r_id`),
	CONSTRAINT `course_subject_teacher_FK_1`
		FOREIGN KEY (`teacher_id`)
		REFERENCES `teacher` (`id`)
		ON DELETE CASCADE,
	INDEX `course_subject_teacher_FI_2` (`course_subject_id`),
	CONSTRAINT `course_subject_teacher_FK_2`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `course_subject_teacher_FI_3` (`situation_r_id`),
	CONSTRAINT `course_subject_teacher_FK_3`
		FOREIGN KEY (`situation_r_id`)
		REFERENCES `situation_r` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Sobreescribe el profesor de un curso en caso de que esta relacion exista';

#-----------------------------------------------------------------------------
#-- course_subject_day
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject_day`;


CREATE TABLE `course_subject_day`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`course_subject_id` INTEGER  NOT NULL,
	`day` INTEGER  NOT NULL COMMENT 'Dia de la semana en que se cursa un curso: los valores van de 1 (lunes) a 7 (domingo)',
	`block` INTEGER default 1 NOT NULL COMMENT 'Bloque horario en un dia para una materia',
	`starts_at` TIME COMMENT 'Hora de comienzo de la cursada',
	`ends_at` TIME COMMENT 'Hora de fin de la cursada',
	`classroom_id` INTEGER,
	PRIMARY KEY (`id`),
	KEY `course_subject_day`(`course_subject_id`, `day`),
	CONSTRAINT `course_subject_day_FK_1`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `course_subject_day_FI_2` (`classroom_id`),
	CONSTRAINT `course_subject_day_FK_2`
		FOREIGN KEY (`classroom_id`)
		REFERENCES `classroom` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa un dia en el cual se cursa una materia para un curso dado';

#-----------------------------------------------------------------------------
#-- course_subject_student_mark
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject_student_mark`;


CREATE TABLE `course_subject_student_mark`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`course_subject_student_id` INTEGER  NOT NULL,
	`mark_number` INTEGER  NOT NULL COMMENT 'Posicion de la nota, 1era, 2da, etc',
	`mark` DECIMAL(5,2) COMMENT 'Nota que obtuvo el alumno',
	`is_closed` TINYINT default 0 COMMENT 'Indica que se cerro la nota del alumno en ese mark_number',
	`is_free` TINYINT default 0 COMMENT 'El alumno esta libre en este periodo',
	PRIMARY KEY (`id`),
	KEY `course_subject_student`(`course_subject_student_id`),
	CONSTRAINT `course_subject_student_mark_FK_1`
		FOREIGN KEY (`course_subject_student_id`)
		REFERENCES `course_subject_student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa una nota para un alumno en una cursada de una materia (no necesariamente es la nota final)';

#-----------------------------------------------------------------------------
#-- student_approved_career_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_approved_career_subject`;


CREATE TABLE `student_approved_career_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`career_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la materia de una carrera',
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`school_year_id` INTEGER  NOT NULL COMMENT 'Referencia al school_year en que se asento la nota',
	`mark` DECIMAL(4,2) COMMENT 'Nota que obtuvo el alumno',
	`is_equivalence` TINYINT default 0 COMMENT 'Si es verdadera, entonces esta nota se paso como equivalencia o de otra carrera o de la historia del alumno',
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_student_approval` (`career_subject_id`, `student_id`, `school_year_id`),
	KEY `student_approval`(`career_subject_id`, `student_id`, `school_year_id`),
	KEY `student_career_subject_id`(`career_subject_id`, `student_id`),
	KEY `student_id`(`student_id`),
	KEY `career_subject`(`career_subject_id`),
	CONSTRAINT `student_approved_career_subject_FK_1`
		FOREIGN KEY (`career_subject_id`)
		REFERENCES `career_subject` (`id`)
		ON DELETE RESTRICT,
	CONSTRAINT `student_approved_career_subject_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_approved_career_subject_FI_3` (`school_year_id`),
	CONSTRAINT `student_approved_career_subject_FK_3`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Tabla para almacenar que materias aprueban los alumnos. Una entrada en esta tabla indica que student_id aprobo career_subject_id.';

#-----------------------------------------------------------------------------
#-- student_approved_course_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_approved_course_subject`;


CREATE TABLE `student_approved_course_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`course_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la materia de un curso',
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`school_year_id` INTEGER  NOT NULL COMMENT 'Referencia al school_year en que se asento la nota',
	`student_approved_career_subject_id` INTEGER COMMENT 'Si el estudiante aprobo el career subject existe esta relacion',
	`mark` DECIMAL(4,2) COMMENT 'Nota que obtuvo el alumno',
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_student_approval` (`course_subject_id`, `student_id`, `school_year_id`),
	KEY `student_school_year_course_subject`(`course_subject_id`, `student_id`, `school_year_id`),
	KEY `student_school_year`(`student_id`, `school_year_id`),
	KEY `student_course_subject`(`student_id`, `course_subject_id`),
	KEY `student`(`student_id`),
	KEY `course_subject`(`course_subject_id`),
	CONSTRAINT `student_approved_course_subject_FK_1`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON DELETE RESTRICT,
	CONSTRAINT `student_approved_course_subject_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_approved_course_subject_FI_3` (`school_year_id`),
	CONSTRAINT `student_approved_course_subject_FK_3`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_approved_course_subject_FI_4` (`student_approved_career_subject_id`),
	CONSTRAINT `student_approved_course_subject_FK_4`
		FOREIGN KEY (`student_approved_career_subject_id`)
		REFERENCES `student_approved_career_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Tabla para almacenar que materia del curso  aprueban los alumnos. Una entrada en esta tabla indica que student_id aprobo course_subject_id.';

#-----------------------------------------------------------------------------
#-- student_disapproved_course_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_disapproved_course_subject`;


CREATE TABLE `student_disapproved_course_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`course_subject_student_id` INTEGER  NOT NULL COMMENT 'Referencia a un alumno en una materia de un curso',
	`examination_number` INTEGER default 0 COMMENT 'Representa el numero de mesa en que rinde (Refiriendose a Diciembre, Marzo , etc)',
	`student_approved_career_subject_id` INTEGER COMMENT 'Si el estudiante aprobo el career subject existe esta relacion',
	PRIMARY KEY (`id`),
	KEY `course_subject`(`course_subject_student_id`),
	KEY `student_approved_career_subject`(`student_approved_career_subject_id`),
	CONSTRAINT `student_disapproved_course_subject_FK_1`
		FOREIGN KEY (`course_subject_student_id`)
		REFERENCES `course_subject_student` (`id`)
		ON DELETE RESTRICT,
	CONSTRAINT `student_disapproved_course_subject_FK_2`
		FOREIGN KEY (`student_approved_career_subject_id`)
		REFERENCES `student_approved_career_subject` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL
)Engine=InnoDB COMMENT='Tabla que refleja los alumnos que se presentaron a una mesa de desaprobados';

#-----------------------------------------------------------------------------
#-- examination
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `examination`;


CREATE TABLE `examination`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`date_from` DATE  NOT NULL,
	`date_to` DATE  NOT NULL,
	`examination_number` INTEGER default 1 NOT NULL COMMENT 'Indica la instancia de la mesa (diciembre, febrero, etc).',
	`school_year_id` INTEGER  NOT NULL COMMENT 'año lectivo',
	PRIMARY KEY (`id`),
	INDEX `examination_FI_1` (`school_year_id`),
	CONSTRAINT `examination_FK_1`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa una mesa de examen.';

#-----------------------------------------------------------------------------
#-- examination_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `examination_subject`;


CREATE TABLE `examination_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`examination_id` INTEGER  NOT NULL COMMENT 'Referencia a una mesa de examen',
	`career_subject_school_year_id` INTEGER  NOT NULL COMMENT 'Referencia a una materia',
	`is_closed` TINYINT default 0,
	PRIMARY KEY (`id`),
	UNIQUE KEY `examination_subject_unique` (`examination_id`, `career_subject_school_year_id`),
	KEY `examination_career_subject_school_year`(`career_subject_school_year_id`, `examination_id`),
	CONSTRAINT `examination_subject_FK_1`
		FOREIGN KEY (`examination_id`)
		REFERENCES `examination` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT `examination_subject_FK_2`
		FOREIGN KEY (`career_subject_school_year_id`)
		REFERENCES `career_subject_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa una mesa de examen para una materia';

#-----------------------------------------------------------------------------
#-- examination_subject_teacher
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `examination_subject_teacher`;


CREATE TABLE `examination_subject_teacher`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`examination_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a una mesa de examen',
	`teacher_id` INTEGER  NOT NULL COMMENT 'Referencia a un profesor',
	PRIMARY KEY (`id`,`examination_subject_id`,`teacher_id`),
	INDEX `examination_subject_teacher_FI_1` (`examination_subject_id`),
	CONSTRAINT `examination_subject_teacher_FK_1`
		FOREIGN KEY (`examination_subject_id`)
		REFERENCES `examination_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `examination_subject_teacher_FI_2` (`teacher_id`),
	CONSTRAINT `examination_subject_teacher_FK_2`
		FOREIGN KEY (`teacher_id`)
		REFERENCES `teacher` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa una mesa de examen para una materia, con un conjunto de profesores';

#-----------------------------------------------------------------------------
#-- course_subject_student_examination
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject_student_examination`;


CREATE TABLE `course_subject_student_examination`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`course_subject_student_id` INTEGER  NOT NULL COMMENT 'Referencia a un alumno en una materia de un curso',
	`examination_subject_id` INTEGER COMMENT 'Referencia a una mesa de examen',
	`mark` DECIMAL(5,2) COMMENT 'Nota que obtuvo el alumno',
	`is_absent` TINYINT default 0,
	`examination_number` INTEGER default 1 NOT NULL COMMENT 'Indica la instancia en la que el alumno se inscribe (por defecto es \"Diciembre\").',
	`can_take_examination` TINYINT default 1 COMMENT 'Indica si el alumno puede rendir el examen. Para casos en que el alumno repite antes de que rinda.',
	`date` DATE COMMENT 'Fecha en que el alumno rinde la materia',
	`folio_number` VARCHAR(20) COMMENT 'Número de folio del examen',
	PRIMARY KEY (`id`),
	UNIQUE KEY `csse_unique` (`course_subject_student_id`, `examination_subject_id`, `examination_number`),
	KEY `course_subject_student_subject_examination_number`(`course_subject_student_id`, `examination_subject_id`, `examination_number`),
	KEY `course_subject_student_examination_number`(`course_subject_student_id`, `examination_number`),
	KEY `course_subject_student_id`(`course_subject_student_id`, `examination_subject_id`),
	CONSTRAINT `course_subject_student_examination_FK_1`
		FOREIGN KEY (`course_subject_student_id`)
		REFERENCES `course_subject_student` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `course_subject_student_examination_FI_2` (`examination_subject_id`),
	CONSTRAINT `course_subject_student_examination_FK_2`
		FOREIGN KEY (`examination_subject_id`)
		REFERENCES `examination_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa la inscripción de un alumno a una mesa de examen.';

#-----------------------------------------------------------------------------
#-- student_repproved_course_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_repproved_course_subject`;


CREATE TABLE `student_repproved_course_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`course_subject_student_id` INTEGER  NOT NULL COMMENT 'Referencia a un alumno en una materia de un curso',
	`student_approved_career_subject_id` INTEGER COMMENT 'Si el estudiante aprobo el career subject existe esta relacion',
	PRIMARY KEY (`id`),
	KEY `course_subject_student_student_approved`(`course_subject_student_id`, `student_approved_career_subject_id`),
	CONSTRAINT `student_repproved_course_subject_FK_1`
		FOREIGN KEY (`course_subject_student_id`)
		REFERENCES `course_subject_student` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_repproved_course_subject_FI_2` (`student_approved_career_subject_id`),
	CONSTRAINT `student_repproved_course_subject_FK_2`
		FOREIGN KEY (`student_approved_career_subject_id`)
		REFERENCES `student_approved_career_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa a un alumno que se llevo una previa de la materia de un curso';

#-----------------------------------------------------------------------------
#-- examination_repproved
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `examination_repproved`;


CREATE TABLE `examination_repproved`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`date_from` DATE  NOT NULL,
	`date_to` DATE  NOT NULL,
	`examination_number` INTEGER default 1 NOT NULL COMMENT 'Indica la instancia de la mesa.',
	`examination_type` INTEGER  NOT NULL COMMENT 'Indica el tipo de examination_repproved (Libre o previa)',
	`school_year_id` INTEGER  NOT NULL COMMENT 'año lectivo',
	PRIMARY KEY (`id`),
	INDEX `examination_repproved_FI_1` (`school_year_id`),
	CONSTRAINT `examination_repproved_FK_1`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa una mesa de previa.';

#-----------------------------------------------------------------------------
#-- examination_repproved_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `examination_repproved_subject`;


CREATE TABLE `examination_repproved_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`examination_repproved_id` INTEGER  NOT NULL COMMENT 'Referencia a una mesa de examen',
	`career_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a una materia',
	`is_closed` TINYINT default 0,
	PRIMARY KEY (`id`),
	INDEX `examination_repproved_subject_FI_1` (`examination_repproved_id`),
	CONSTRAINT `examination_repproved_subject_FK_1`
		FOREIGN KEY (`examination_repproved_id`)
		REFERENCES `examination_repproved` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `examination_repproved_subject_FI_2` (`career_subject_id`),
	CONSTRAINT `examination_repproved_subject_FK_2`
		FOREIGN KEY (`career_subject_id`)
		REFERENCES `career_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa una mesa de previa para una materia';

#-----------------------------------------------------------------------------
#-- examination_repproved_subject_teacher
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `examination_repproved_subject_teacher`;


CREATE TABLE `examination_repproved_subject_teacher`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`examination_repproved_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a una mesa de examen',
	`teacher_id` INTEGER  NOT NULL COMMENT 'Referencia a un profesor',
	PRIMARY KEY (`id`,`examination_repproved_subject_id`,`teacher_id`),
	INDEX `examination_repproved_subject_teacher_FI_1` (`examination_repproved_subject_id`),
	CONSTRAINT `examination_repproved_subject_teacher_FK_1`
		FOREIGN KEY (`examination_repproved_subject_id`)
		REFERENCES `examination_repproved_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `examination_repproved_subject_teacher_FI_2` (`teacher_id`),
	CONSTRAINT `examination_repproved_subject_teacher_FK_2`
		FOREIGN KEY (`teacher_id`)
		REFERENCES `teacher` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa una mesa de previa para una materia, con un conjunto de profesores';

#-----------------------------------------------------------------------------
#-- student_examination_repproved_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_examination_repproved_subject`;


CREATE TABLE `student_examination_repproved_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_repproved_course_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a una previa de un alumno',
	`examination_repproved_subject_id` INTEGER COMMENT 'Referencia a una mesa de previa',
	`mark` DECIMAL(5,2) COMMENT 'Nota que obtuvo el alumno',
	`is_absent` TINYINT default 0,
	`date` DATE COMMENT 'Fecha en que el alumno rinde',
	`folio_number` VARCHAR(20) COMMENT 'Número de folio del examen',
	PRIMARY KEY (`id`),
	INDEX `student_examination_repproved_subject_FI_1` (`student_repproved_course_subject_id`),
	CONSTRAINT `student_examination_repproved_subject_FK_1`
		FOREIGN KEY (`student_repproved_course_subject_id`)
		REFERENCES `student_repproved_course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_examination_repproved_subject_FI_2` (`examination_repproved_subject_id`),
	CONSTRAINT `student_examination_repproved_subject_FK_2`
		FOREIGN KEY (`examination_repproved_subject_id`)
		REFERENCES `examination_repproved_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa la inscripción de un alumno a una mesa de previa.';

#-----------------------------------------------------------------------------
#-- city
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `city`;


CREATE TABLE `city`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`zip_code` VARCHAR(255)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`state_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `state`(`state_id`),
	KEY `name`(`name`),
	CONSTRAINT `city_FK_1`
		FOREIGN KEY (`state_id`)
		REFERENCES `state` (`id`)
)Engine=InnoDB COMMENT='Representa una ciudad';

#-----------------------------------------------------------------------------
#-- state
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `state`;


CREATE TABLE `state`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`country_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `country`(`country_id`),
	CONSTRAINT `state_FK_1`
		FOREIGN KEY (`country_id`)
		REFERENCES `country` (`id`)
)Engine=InnoDB COMMENT='Representa una provincia';

#-----------------------------------------------------------------------------
#-- country
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `country`;


CREATE TABLE `country`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Representa un País';

#-----------------------------------------------------------------------------
#-- orientation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orientation`;


CREATE TABLE `orientation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre de la materia',
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Define una orientacion que podra asociarse a una carrera';

#-----------------------------------------------------------------------------
#-- sub_orientation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sub_orientation`;


CREATE TABLE `sub_orientation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre de la materia',
	`orientation_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `sub_orientation_FI_1` (`orientation_id`),
	CONSTRAINT `sub_orientation_FK_1`
		FOREIGN KEY (`orientation_id`)
		REFERENCES `orientation` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Define una sub orientacion que podra asociarse a una carrera';

#-----------------------------------------------------------------------------
#-- shift
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `shift`;


CREATE TABLE `shift`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Representa un turno elegible por alumnos';

#-----------------------------------------------------------------------------
#-- student_study
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_study`;


CREATE TABLE `student_study`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_id` INTEGER  NOT NULL,
	`study_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`,`study_id`),
	INDEX `student_study_FI_1` (`student_id`),
	CONSTRAINT `student_study_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON DELETE CASCADE,
	INDEX `student_study_FI_2` (`study_id`),
	CONSTRAINT `student_study_FK_2`
		FOREIGN KEY (`study_id`)
		REFERENCES `study` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa un estudio cursado por el alumno';

#-----------------------------------------------------------------------------
#-- study
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `study`;


CREATE TABLE `study`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `study_U_1` (`name`)
)Engine=InnoDB COMMENT='Representa un estudio cursado';

#-----------------------------------------------------------------------------
#-- situation_r
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `situation_r`;


CREATE TABLE `situation_r`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`(20))
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- occupation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `occupation`;


CREATE TABLE `occupation`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`(20))
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- occupation_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `occupation_category`;


CREATE TABLE `occupation_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`(20))
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- classroom
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `classroom`;


CREATE TABLE `classroom`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`seat_number` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `classroom_U_1` (`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- resources
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `resources`;


CREATE TABLE `resources`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `resources_U_1` (`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- classroom_resources
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `classroom_resources`;


CREATE TABLE `classroom_resources`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`resource_id` INTEGER  NOT NULL,
	`classroom_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `classroom_resources_FI_1` (`resource_id`),
	CONSTRAINT `classroom_resources_FK_1`
		FOREIGN KEY (`resource_id`)
		REFERENCES `resources` (`id`)
		ON DELETE CASCADE,
	INDEX `classroom_resources_FI_2` (`classroom_id`),
	CONSTRAINT `classroom_resources_FK_2`
		FOREIGN KEY (`classroom_id`)
		REFERENCES `classroom` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;


CREATE TABLE `tag`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `tag_U_1` (`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`first_name` VARCHAR(255),
	`last_name` VARCHAR(255),
	`identification_type` INTEGER  NOT NULL,
	`identification_number` VARCHAR(20)  NOT NULL,
	`email` VARCHAR(255),
	`phone` VARCHAR(255),
	`observations` TEXT,
	PRIMARY KEY (`id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa el perfil de un usuario';

#-----------------------------------------------------------------------------
#-- conduct
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `conduct`;


CREATE TABLE `conduct`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`short_name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Representa la conducta (muy buena, buena, regular, mala)';

#-----------------------------------------------------------------------------
#-- holiday
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `holiday`;


CREATE TABLE `holiday`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`day` DATE  NOT NULL,
	`description` VARCHAR(50),
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Cada tupla representa un día feriado';

#-----------------------------------------------------------------------------
#-- student_attendance
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_attendance`;


CREATE TABLE `student_attendance`
(
	`career_school_year_id` INTEGER  NOT NULL COMMENT 'Referencia al año lectivo',
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`day` DATE  NOT NULL,
	`absence_type_id` INTEGER default null COMMENT 'Referencia al tipo de asistencia',
	`value` DECIMAL(3,2) default 0,
	`course_subject_id` INTEGER default null COMMENT 'Referencia a la cursada de una materia',
	`student_attendance_justification_id` INTEGER default null COMMENT 'Referencia a la justificacion de la asistencia',
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `student_attendance_unique` (`student_id`, `day`, `course_subject_id`),
	KEY `student_career`(`student_id`, `career_school_year_id`),
	KEY `student_course`(`student_id`, `course_subject_id`),
	INDEX `student_attendance_FI_1` (`career_school_year_id`),
	CONSTRAINT `student_attendance_FK_1`
		FOREIGN KEY (`career_school_year_id`)
		REFERENCES `career_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT `student_attendance_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_attendance_FI_3` (`absence_type_id`),
	CONSTRAINT `student_attendance_FK_3`
		FOREIGN KEY (`absence_type_id`)
		REFERENCES `absence_type` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_attendance_FI_4` (`course_subject_id`),
	CONSTRAINT `student_attendance_FK_4`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `student_attendance_FI_5` (`student_attendance_justification_id`),
	CONSTRAINT `student_attendance_FK_5`
		FOREIGN KEY (`student_attendance_justification_id`)
		REFERENCES `student_attendance_justification` (`id`)
		ON UPDATE CASCADE
		ON DELETE SET NULL
)Engine=InnoDB COMMENT='Representa las asistencias de un alumno en un dia/materia';

#-----------------------------------------------------------------------------
#-- student_reincorporation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_reincorporation`;


CREATE TABLE `student_reincorporation`
(
	`career_school_year_period_id` INTEGER  NOT NULL,
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`reincorporation_days` INTEGER  NOT NULL,
	`course_subject_id` INTEGER default null COMMENT 'Referencia a la cursada de una materia',
	`observation` TEXT,
	`created_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `student_course_subject_career_school_year_period_id`(`student_id`, `course_subject_id`, `career_school_year_period_id`),
	KEY `student_career_school_year_period_id`(`student_id`, `career_school_year_period_id`),
	KEY `student_course`(`student_id`, `course_subject_id`),
	INDEX `student_reincorporation_FI_1` (`career_school_year_period_id`),
	CONSTRAINT `student_reincorporation_FK_1`
		FOREIGN KEY (`career_school_year_period_id`)
		REFERENCES `career_school_year_period` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT `student_reincorporation_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_reincorporation_FI_3` (`course_subject_id`),
	CONSTRAINT `student_reincorporation_FK_3`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa una reincorporacion de un alumno que se quedo libre';

#-----------------------------------------------------------------------------
#-- student_attendance_justification
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_attendance_justification`;


CREATE TABLE `student_attendance_justification`
(
	`justification_type_id` INTEGER  NOT NULL COMMENT 'Referencia al tipo de justificacion',
	`observation` TEXT,
	`document` VARCHAR(255),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `student_attendance_justification_FI_1` (`justification_type_id`),
	CONSTRAINT `student_attendance_justification_FK_1`
		FOREIGN KEY (`justification_type_id`)
		REFERENCES `justification_type` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- justification_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `justification_type`;


CREATE TABLE `justification_type`
(
	`name` VARCHAR(255)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `justification_name` (`name`),
	KEY `name`(`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- absence_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `absence_type`;


CREATE TABLE `absence_type`
(
	`name` VARCHAR(255)  NOT NULL,
	`value` DECIMAL(3,2) default 0 NOT NULL,
	`method` INTEGER default 0 NOT NULL,
	`order` INTEGER  NOT NULL,
	`description` TEXT,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `name`(`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- student_free
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_free`;


CREATE TABLE `student_free`
(
	`student_id` INTEGER  NOT NULL,
	`career_school_year_period_id` INTEGER,
	`career_school_year_id` INTEGER,
	`course_subject_id` INTEGER default null,
	`is_free` TINYINT default 1,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	KEY `student_course_subject_career_school_year_period_id`(`student_id`, `course_subject_id`, `career_school_year_period_id`),
	KEY `student_career_school_year_period_id`(`student_id`, `career_school_year_period_id`),
	KEY `student_course_subject_id`(`student_id`, `course_subject_id`),
	CONSTRAINT `student_free_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_free_FI_2` (`career_school_year_period_id`),
	CONSTRAINT `student_free_FK_2`
		FOREIGN KEY (`career_school_year_period_id`)
		REFERENCES `career_school_year_period` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_free_FI_3` (`career_school_year_id`),
	CONSTRAINT `student_free_FK_3`
		FOREIGN KEY (`career_school_year_id`)
		REFERENCES `career_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_free_FI_4` (`course_subject_id`),
	CONSTRAINT `student_free_FK_4`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- pathway
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pathway`;


CREATE TABLE `pathway`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`school_year_id` INTEGER  NOT NULL COMMENT 'Referencia el año lectivo',
	PRIMARY KEY (`id`),
	INDEX `pathway_FI_1` (`school_year_id`),
	CONSTRAINT `pathway_FK_1`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
)Engine=InnoDB COMMENT='Representa una trayectoria';

#-----------------------------------------------------------------------------
#-- pathway_student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pathway_student`;


CREATE TABLE `pathway_student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`pathway_id` INTEGER  NOT NULL COMMENT 'Referencia a la trayectoria',
	`year` INTEGER COMMENT 'Representa el año para el cual el alumno se inscribe en trayectoria',
	PRIMARY KEY (`id`),
	UNIQUE KEY `pathway_student` (`pathway_id`, `student_id`),
	KEY `pathway_student_index`(`pathway_id`, `student_id`),
	INDEX `pathway_student_FI_1` (`student_id`),
	CONSTRAINT `pathway_student_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`),
	CONSTRAINT `pathway_student_FK_2`
		FOREIGN KEY (`pathway_id`)
		REFERENCES `pathway` (`id`)
)Engine=InnoDB COMMENT='Representa la inscripción de un alumno en una trayectoria';

#-----------------------------------------------------------------------------
#-- course_subject_student_pathway
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `course_subject_student_pathway`;


CREATE TABLE `course_subject_student_pathway`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`course_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la materia dentro del curso',
	`mark` DECIMAL(5,2) COMMENT 'Representa la nota que obtiene el alumno en la trayectoria. Se aprueba con 7 (CNLP).',
	`approval_date` DATE COMMENT 'Representa la fecha de aprobación del curso trayectoria',
	`pathway_student_id` INTEGER  NOT NULL COMMENT 'Referencia a la trayectoria',
	PRIMARY KEY (`id`),
	INDEX `course_subject_student_pathway_FI_1` (`student_id`),
	CONSTRAINT `course_subject_student_pathway_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`),
	INDEX `course_subject_student_pathway_FI_2` (`course_subject_id`),
	CONSTRAINT `course_subject_student_pathway_FK_2`
		FOREIGN KEY (`course_subject_id`)
		REFERENCES `course_subject` (`id`),
	INDEX `course_subject_student_pathway_FI_3` (`pathway_student_id`),
	CONSTRAINT `course_subject_student_pathway_FK_3`
		FOREIGN KEY (`pathway_student_id`)
		REFERENCES `pathway_student` (`id`)
)Engine=InnoDB COMMENT='Representa la inscripción de un alumno en un curso de trayectoria';

#-----------------------------------------------------------------------------
#-- tentative_repproved_student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tentative_repproved_student`;


CREATE TABLE `tentative_repproved_student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`student_career_school_year_id` INTEGER  NOT NULL,
	`is_deleted` TINYINT default 0,
	PRIMARY KEY (`id`),
	INDEX `tentative_repproved_student_FI_1` (`student_career_school_year_id`),
	CONSTRAINT `tentative_repproved_student_FK_1`
		FOREIGN KEY (`student_career_school_year_id`)
		REFERENCES `student_career_school_year` (`id`)
)Engine=InnoDB COMMENT='Representa un alumno que puede llegar a repetir o a ser marcado como trayectoria';

#-----------------------------------------------------------------------------
#-- subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `subject`;


CREATE TABLE `subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`name` VARCHAR(255)  NOT NULL COMMENT 'Nombre de la materia',
	`fantasy_name` VARCHAR(255)  NOT NULL COMMENT 'Nombre de fantasia de la materia',
	PRIMARY KEY (`id`),
	UNIQUE KEY `subject_unique` (`name`, `fantasy_name`),
	KEY `name`(`name`)
)Engine=InnoDB COMMENT='Representa una materia';

#-----------------------------------------------------------------------------
#-- career
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `career`;


CREATE TABLE `career`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`file_number_sequence` BIGINT default 1 NOT NULL COMMENT 'Proximo numero de alumno en esta carrera',
	`plan_name` VARCHAR(255)  NOT NULL COMMENT 'Nombre del plan',
	`quantity_years` INTEGER  NOT NULL COMMENT 'Cantidad de años de la carrera',
	`career_name` VARCHAR(255)  NOT NULL COMMENT 'Nombre de la carrera',
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Representa una Carrera';

#-----------------------------------------------------------------------------
#-- subject_configuration
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `subject_configuration`;


CREATE TABLE `subject_configuration`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`course_marks` INTEGER default 3 NOT NULL COMMENT 'Cantidad de notas que tendrá la materia. Por defecto son 2.',
	`final_examination_required` TINYINT default 0 COMMENT 'Si es true, la aprobacion de una materia es a traves de final requerido',
	`course_required` TINYINT default 1 COMMENT 'Si es true, es requerido la cursada para poder rendir final',
	`course_minimun_mark` INTEGER default 7 COMMENT 'Nota minima para aprobar una cursada',
	`course_examination_count` INTEGER default 2 NOT NULL COMMENT 'cantidad de mesas para aprobar la cursada',
	`max_previous` INTEGER default 1 NOT NULL COMMENT 'Cantidad de previas que un alumno puede tener. Superado éste número, el alumno debe repetir el año.',
	`evaluation_method` INTEGER default 1 COMMENT 'Método de evaluación que se utiliza para obtener la nota final de la materia',
	`course_type` INTEGER default 1 COMMENT 'Indica el tipo de la materia (anual, anual cuatrimestral, etc)',
	`attendance_type` INTEGER default 1 NOT NULL COMMENT 'Define el comportamiento de la asistencia',
	`max_disciplinary_sanctions` INTEGER default 0 COMMENT 'Define la cantidad de sanciones permitidas.',
	`when_disapprove_show_string` TINYINT default 0,
	`necessary_student_approved_career_subject_to_show_prom_def` TINYINT default 1 COMMENT 'Esta configuracion da la posibilidad de mostrar el promedio definitivo teniendo o no el student_approved_career_subject',
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Configuración de las materias';

#-----------------------------------------------------------------------------
#-- subject_year_configuration
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `subject_year_configuration`;


CREATE TABLE `subject_year_configuration`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`subject_configuration_id` INTEGER  NOT NULL COMMENT 'Referencia a la configuracion de la carrera',
	`course_type` INTEGER COMMENT 'Indica el tipo de la materia (anual, anual cuatrimestral, etc)',
	`year` INTEGER  NOT NULL,
	`has_max_absence_by_period` TINYINT default 1 COMMENT 'Esta configuración da la posibilidad de totalizar por periodo o de forma anual las asistencias.',
	`max_absences` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `subject_year_configuration_FI_1` (`subject_configuration_id`),
	CONSTRAINT `subject_year_configuration_FK_1`
		FOREIGN KEY (`subject_configuration_id`)
		REFERENCES `subject_configuration` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Configuración de las materias';

#-----------------------------------------------------------------------------
#-- career_student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `career_student`;


CREATE TABLE `career_student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`career_id` INTEGER  NOT NULL COMMENT 'Referencia a la carrera',
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`orientation_id` INTEGER default null,
	`sub_orientation_id` INTEGER default null,
	`orientation_change_observations` TEXT,
	`start_year` INTEGER default 1,
	`file_number` VARCHAR(20)  NOT NULL COMMENT 'Número de alumno en la carrera (si usa uno único para todo el colegio entonces se copia del global file number de student)',
	`status` INTEGER default 0 COMMENT 'El estado de un alumno en una carrera (CURSANDO , GRADUADO)',
	`graduation_school_year_id` INTEGER default null,
	PRIMARY KEY (`id`),
	UNIQUE KEY `career_student_unique` (`career_id`, `student_id`),
	KEY `student_career`(`student_id`, `career_id`),
	KEY `student_career_orientation`(`student_id`, `career_id`, `orientation_id`),
	KEY `student_career_orientation_sub_orientation`(`student_id`, `career_id`, `orientation_id`, `sub_orientation_id`),
	CONSTRAINT `career_student_FK_1`
		FOREIGN KEY (`career_id`)
		REFERENCES `career` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	CONSTRAINT `career_student_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `career_student_FI_3` (`orientation_id`),
	CONSTRAINT `career_student_FK_3`
		FOREIGN KEY (`orientation_id`)
		REFERENCES `orientation` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `career_student_FI_4` (`sub_orientation_id`),
	CONSTRAINT `career_student_FK_4`
		FOREIGN KEY (`sub_orientation_id`)
		REFERENCES `sub_orientation` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `career_student_FI_5` (`graduation_school_year_id`),
	CONSTRAINT `career_student_FK_5`
		FOREIGN KEY (`graduation_school_year_id`)
		REFERENCES `school_year` (`id`)
)Engine=InnoDB COMMENT='Cada tupla representa un inscripto a una carrera';

#-----------------------------------------------------------------------------
#-- student_career_school_year
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_career_school_year`;


CREATE TABLE `student_career_school_year`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`career_school_year_id` INTEGER  NOT NULL COMMENT 'Referencia a la carrera en el año lectivo',
	`student_id` INTEGER  NOT NULL COMMENT 'Referencia al estudiante',
	`year` INTEGER  NOT NULL,
	`status` INTEGER default 0 COMMENT 'Campo que dice el estado del alumno en la carrera en ese año (cursando, paso de año y repitio)',
	`is_processed` TINYINT default 0,
	PRIMARY KEY (`id`),
	UNIQUE KEY `student_career_school_year_unique` (`career_school_year_id`, `student_id`, `year`),
	KEY `student_career_school_year`(`student_id`, `career_school_year_id`),
	CONSTRAINT `student_career_school_year_FK_1`
		FOREIGN KEY (`career_school_year_id`)
		REFERENCES `career_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `student_career_school_year_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Cada tupla representa el estado de un inscripto en una carrera en un año lectivo';

#-----------------------------------------------------------------------------
#-- career_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `career_subject`;


CREATE TABLE `career_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`career_id` INTEGER  NOT NULL COMMENT 'Referencia a la carrera',
	`subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la materia',
	`year` INTEGER  NOT NULL COMMENT 'Representa un entero q indica el año de la carrera para esa materia',
	`has_options` TINYINT default 0 COMMENT 'esta materia tiene opciones',
	`is_option` TINYINT default 0 COMMENT 'esta materia es opcional',
	`orientation_id` INTEGER COMMENT 'Orientacion de la materia en el plan de estudio. No debería setearse si es opcion (solo para opcionales)',
	`sub_orientation_id` INTEGER COMMENT 'Sub orientacion de la materia en el plan de estudio. No debería setearse si es opcion (solo para opcionales)',
	`has_correlative_previous_year` TINYINT default 1 COMMENT 'Indica si esta materia tiene como correlatividas las materias del año previo completo o deben elegirse materias',
	PRIMARY KEY (`id`),
	UNIQUE KEY `career_subject_year_unique` (`career_id`, `subject_id`, `year`, `orientation_id`, `sub_orientation_id`),
	KEY `career_subject`(`subject_id`, `career_id`),
	KEY `career_subject_orientation`(`subject_id`, `career_id`, `orientation_id`),
	KEY `career_subject_orientation_sub_orientation`(`subject_id`, `career_id`, `orientation_id`, `sub_orientation_id`),
	CONSTRAINT `career_subject_FK_1`
		FOREIGN KEY (`career_id`)
		REFERENCES `career` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	CONSTRAINT `career_subject_FK_2`
		FOREIGN KEY (`subject_id`)
		REFERENCES `subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `career_subject_FI_3` (`orientation_id`),
	CONSTRAINT `career_subject_FK_3`
		FOREIGN KEY (`orientation_id`)
		REFERENCES `orientation` (`id`)
		ON DELETE RESTRICT,
	INDEX `career_subject_FI_4` (`sub_orientation_id`),
	CONSTRAINT `career_subject_FK_4`
		FOREIGN KEY (`sub_orientation_id`)
		REFERENCES `sub_orientation` (`id`)
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Cada tupla representa una carrera, una materia y el año';

#-----------------------------------------------------------------------------
#-- correlative
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `correlative`;


CREATE TABLE `correlative`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`career_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la materia',
	`correlative_career_subject_id` INTEGER  NOT NULL COMMENT 'Referencia a la correlativa que posee',
	PRIMARY KEY (`id`),
	UNIQUE KEY `career_subject_correlative_career_subject_unique` (`career_subject_id`, `correlative_career_subject_id`),
	CONSTRAINT `correlative_FK_1`
		FOREIGN KEY (`career_subject_id`)
		REFERENCES `career_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `correlative_FI_2` (`correlative_career_subject_id`),
	CONSTRAINT `correlative_FK_2`
		FOREIGN KEY (`correlative_career_subject_id`)
		REFERENCES `career_subject` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Tabla q referencia a las correlativas para una materia de una carrera en un año';

#-----------------------------------------------------------------------------
#-- optional_career_subject
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `optional_career_subject`;


CREATE TABLE `optional_career_subject`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`career_subject_school_year_id` INTEGER  NOT NULL,
	`choice_career_subject_school_year_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `career_subject_optional_career_subject_unique` (`career_subject_school_year_id`, `choice_career_subject_school_year_id`),
	CONSTRAINT `optional_career_subject_FK_1`
		FOREIGN KEY (`career_subject_school_year_id`)
		REFERENCES `career_subject_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `optional_career_subject_FI_2` (`choice_career_subject_school_year_id`),
	CONSTRAINT `optional_career_subject_FK_2`
		FOREIGN KEY (`choice_career_subject_school_year_id`)
		REFERENCES `career_subject_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Materias opcionales de una materia optativa. career_subject_id DEBE ser optativa';

#-----------------------------------------------------------------------------
#-- school_year
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `school_year`;


CREATE TABLE `school_year`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`year` INTEGER COMMENT 'numero que representa el año (debe ser de 4 dígitos)',
	`is_active` TINYINT COMMENT 'Representa si un año lectivo esta activo o no',
	`is_closed` TINYINT default 0 COMMENT 'Representa si esta cerrado el año lectivo o no',
	PRIMARY KEY (`id`),
	UNIQUE KEY `school_year_U_1` (`year`)
)Engine=InnoDB COMMENT='Representa un año lectivo';

#-----------------------------------------------------------------------------
#-- career_school_year
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `career_school_year`;


CREATE TABLE `career_school_year`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`school_year_id` INTEGER  NOT NULL,
	`career_id` INTEGER  NOT NULL,
	`subject_configuration_id` INTEGER  NOT NULL COMMENT 'Referencia a la configuración global de las materias pertenecientes a esta carrera.',
	`is_processed` TINYINT default 0 COMMENT 'Indica si la carrera en este año lectivo ya fue procesado.',
	PRIMARY KEY (`id`),
	UNIQUE KEY `career_school_year_u` (`school_year_id`, `career_id`),
	KEY `career_school_year`(`school_year_id`, `career_id`),
	CONSTRAINT `career_school_year_FK_1`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON DELETE RESTRICT,
	INDEX `career_school_year_FI_2` (`career_id`),
	CONSTRAINT `career_school_year_FK_2`
		FOREIGN KEY (`career_id`)
		REFERENCES `career` (`id`)
		ON DELETE RESTRICT,
	INDEX `career_school_year_FI_3` (`subject_configuration_id`),
	CONSTRAINT `career_school_year_FK_3`
		FOREIGN KEY (`subject_configuration_id`)
		REFERENCES `subject_configuration` (`id`)
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa la configuracion de un plan de estudios en un año lectivo';

#-----------------------------------------------------------------------------
#-- career_subject_school_year
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `career_subject_school_year`;


CREATE TABLE `career_subject_school_year`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`career_school_year_id` INTEGER  NOT NULL,
	`career_subject_id` INTEGER  NOT NULL,
	`subject_configuration_id` INTEGER COMMENT 'Referencia a la configuración global de las materias pertenecientes a esta carrera.',
	`index_sort` INTEGER default 0 COMMENT 'Numero que ordena a las materias',
	PRIMARY KEY (`id`),
	UNIQUE KEY `career_subject_school_year` (`career_subject_id`, `career_school_year_id`),
	INDEX `career_subject_school_year_FI_1` (`career_school_year_id`),
	CONSTRAINT `career_subject_school_year_FK_1`
		FOREIGN KEY (`career_school_year_id`)
		REFERENCES `career_school_year` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `career_subject_school_year_FK_2`
		FOREIGN KEY (`career_subject_id`)
		REFERENCES `career_subject` (`id`)
		ON DELETE RESTRICT,
	INDEX `career_subject_school_year_FI_3` (`subject_configuration_id`),
	CONSTRAINT `career_subject_school_year_FK_3`
		FOREIGN KEY (`subject_configuration_id`)
		REFERENCES `subject_configuration` (`id`)
		ON DELETE SET NULL
)Engine=InnoDB COMMENT='Representa la configuracion de un career subject en un año lectivo';

#-----------------------------------------------------------------------------
#-- career_subject_school_year_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `career_subject_school_year_tag`;


CREATE TABLE `career_subject_school_year_tag`
(
	`career_subject_school_year_id` INTEGER  NOT NULL,
	`tag_id` INTEGER  NOT NULL,
	PRIMARY KEY (`career_subject_school_year_id`,`tag_id`),
	CONSTRAINT `career_subject_school_year_tag_FK_1`
		FOREIGN KEY (`career_subject_school_year_id`)
		REFERENCES `career_subject_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `career_subject_school_year_tag_FI_2` (`tag_id`),
	CONSTRAINT `career_subject_school_year_tag_FK_2`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- school_year_student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `school_year_student`;


CREATE TABLE `school_year_student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_id` INTEGER  NOT NULL,
	`school_year_id` INTEGER  NOT NULL,
	`shift_id` INTEGER  NOT NULL COMMENT 'Especifica el turno del usuario en un año lectivo',
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique` (`student_id`, `school_year_id`),
	KEY `student_school_year`(`student_id`, `school_year_id`),
	CONSTRAINT `school_year_student_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON DELETE RESTRICT,
	INDEX `school_year_student_FI_2` (`school_year_id`),
	CONSTRAINT `school_year_student_FK_2`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON DELETE RESTRICT,
	INDEX `school_year_student_FI_3` (`shift_id`),
	CONSTRAINT `school_year_student_FK_3`
		FOREIGN KEY (`shift_id`)
		REFERENCES `shift` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Matrícula por año lectivo: inscripción de un alumno a un año lectivo.';

#-----------------------------------------------------------------------------
#-- division_title
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `division_title`;


CREATE TABLE `division_title`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB COMMENT='Nombre de las divisiones';

#-----------------------------------------------------------------------------
#-- division
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `division`;


CREATE TABLE `division`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`division_title_id` INTEGER  NOT NULL,
	`career_school_year_id` INTEGER  NOT NULL,
	`shift_id` INTEGER  NOT NULL COMMENT 'Especifica el turno de la division',
	`year` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique` (`division_title_id`, `career_school_year_id`, `year`),
	CONSTRAINT `division_FK_1`
		FOREIGN KEY (`division_title_id`)
		REFERENCES `division_title` (`id`)
		ON DELETE RESTRICT,
	INDEX `division_FI_2` (`career_school_year_id`),
	CONSTRAINT `division_FK_2`
		FOREIGN KEY (`career_school_year_id`)
		REFERENCES `career_school_year` (`id`)
		ON DELETE CASCADE,
	INDEX `division_FI_3` (`shift_id`),
	CONSTRAINT `division_FK_3`
		FOREIGN KEY (`shift_id`)
		REFERENCES `shift` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='representa por ejemplo 1°A en el 2010 es decir, el primer año, con el grupo de alumnos de la division A en el ciclo lectivo 2010';

#-----------------------------------------------------------------------------
#-- division_preceptor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `division_preceptor`;


CREATE TABLE `division_preceptor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`preceptor_id` INTEGER  NOT NULL,
	`division_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_preceptor` (`preceptor_id`, `division_id`),
	KEY `division_preceptor`(`preceptor_id`, `division_id`),
	CONSTRAINT `division_preceptor_FK_1`
		FOREIGN KEY (`preceptor_id`)
		REFERENCES `personal` (`id`)
		ON DELETE RESTRICT,
	INDEX `division_preceptor_FI_2` (`division_id`),
	CONSTRAINT `division_preceptor_FK_2`
		FOREIGN KEY (`division_id`)
		REFERENCES `division` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa la relación entre una division y su/sus preceptores a cargo';

#-----------------------------------------------------------------------------
#-- division_student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `division_student`;


CREATE TABLE `division_student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_id` INTEGER  NOT NULL,
	`division_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_student_division` (`student_id`, `division_id`),
	KEY `division_student`(`division_id`, `student_id`),
	CONSTRAINT `division_student_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON DELETE RESTRICT,
	CONSTRAINT `division_student_FK_2`
		FOREIGN KEY (`division_id`)
		REFERENCES `division` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa la relación entre una division y sus alumnos';

#-----------------------------------------------------------------------------
#-- student_advice
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_advice`;


CREATE TABLE `student_advice`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`number` VARCHAR(11),
	`name` VARCHAR(255),
	`student_id` INTEGER  NOT NULL,
	`request_date` DATE  NOT NULL,
	`resolution_date` DATE,
	`value` DECIMAL default 1 NOT NULL,
	`disciplinary_sanction_type_id` INTEGER  NOT NULL COMMENT 'Motivo de sancion',
	`sanction_type_id` INTEGER  NOT NULL COMMENT 'Tipo de sancion (apercibimiento, llamdo de atencion, amonestación, ultimo apercibimiento)',
	`observation` TEXT,
	`document` VARCHAR(255),
	`applicant_id` INTEGER default null,
	`applicant_other` VARCHAR(255),
	`responsible_id` INTEGER default null,
	`school_year_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `student_school_year`(`student_id`, `school_year_id`),
	CONSTRAINT `student_advice_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_advice_FI_2` (`disciplinary_sanction_type_id`),
	CONSTRAINT `student_advice_FK_2`
		FOREIGN KEY (`disciplinary_sanction_type_id`)
		REFERENCES `disciplinary_sanction_type` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_advice_FI_3` (`sanction_type_id`),
	CONSTRAINT `student_advice_FK_3`
		FOREIGN KEY (`sanction_type_id`)
		REFERENCES `sanction_type` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_advice_FI_4` (`applicant_id`),
	CONSTRAINT `student_advice_FK_4`
		FOREIGN KEY (`applicant_id`)
		REFERENCES `person` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_advice_FI_5` (`responsible_id`),
	CONSTRAINT `student_advice_FK_5`
		FOREIGN KEY (`responsible_id`)
		REFERENCES `person` (`id`)
		ON DELETE SET NULL,
	INDEX `student_advice_FI_6` (`school_year_id`),
	CONSTRAINT `student_advice_FK_6`
		FOREIGN KEY (`school_year_id`)
		REFERENCES `school_year` (`id`)
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa las amonestaciones de un alumno';

#-----------------------------------------------------------------------------
#-- disciplinary_sanction_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `disciplinary_sanction_type`;


CREATE TABLE `disciplinary_sanction_type`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `disciplinary_sanction_type_name` (`name`)
)Engine=InnoDB COMMENT='Representa los motivos de amonestación de alumnos';

#-----------------------------------------------------------------------------
#-- sanction_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sanction_type`;


CREATE TABLE `sanction_type`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`considered_in_report_card` TINYINT default 1,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sanction_type_name` (`name`)
)Engine=InnoDB COMMENT='Representa los tipos de amonestación de alumnos';

#-----------------------------------------------------------------------------
#-- student_career_school_year_conduct
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_career_school_year_conduct`;


CREATE TABLE `student_career_school_year_conduct`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`student_career_school_year_id` INTEGER  NOT NULL COMMENT 'Referencia a un estudainte en una carrera para un año lectivo',
	`conduct_id` INTEGER  NOT NULL COMMENT 'Referencia a la conducta',
	`career_school_year_period_id` INTEGER  NOT NULL COMMENT 'Referencia a un periodo',
	PRIMARY KEY (`id`),
	UNIQUE KEY `subject_unique` (`student_career_school_year_id`, `career_school_year_period_id`),
	CONSTRAINT `student_career_school_year_conduct_FK_1`
		FOREIGN KEY (`student_career_school_year_id`)
		REFERENCES `student_career_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `student_career_school_year_conduct_FI_2` (`conduct_id`),
	CONSTRAINT `student_career_school_year_conduct_FK_2`
		FOREIGN KEY (`conduct_id`)
		REFERENCES `conduct` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `student_career_school_year_conduct_FI_3` (`career_school_year_period_id`),
	CONSTRAINT `student_career_school_year_conduct_FK_3`
		FOREIGN KEY (`career_school_year_period_id`)
		REFERENCES `career_school_year_period` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Cada tupla representa el comportamiento de un alumno en un periodo';

#-----------------------------------------------------------------------------
#-- career_school_year_period
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `career_school_year_period`;


CREATE TABLE `career_school_year_period`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`short_name` VARCHAR(255)  NOT NULL,
	`career_school_year_id` INTEGER  NOT NULL COMMENT 'Referencia a una carrera para un año lectivo',
	`start_at` DATE  NOT NULL,
	`end_at` DATE  NOT NULL,
	`is_closed` TINYINT default 0,
	`course_type` INTEGER COMMENT 'Indica el tipo de la materia (anual, anual cuatrimestral, etc)',
	`career_school_year_period_id` INTEGER COMMENT 'Referencia a al periodo padre (En caso de ser un bimestre, señala a un cuatrimestre padre).',
	`max_absences` INTEGER,
	PRIMARY KEY (`id`),
	KEY `career_school_year_course_type`(`course_type`, `career_school_year_id`),
	INDEX `career_school_year_period_FI_1` (`career_school_year_id`),
	CONSTRAINT `career_school_year_period_FK_1`
		FOREIGN KEY (`career_school_year_id`)
		REFERENCES `career_school_year` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `career_school_year_period_FI_2` (`career_school_year_period_id`),
	CONSTRAINT `career_school_year_period_FK_2`
		FOREIGN KEY (`career_school_year_period_id`)
		REFERENCES `career_school_year_period` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Cada tupla representa un periodo en una carrera de un año lectivo';

#-----------------------------------------------------------------------------
#-- person
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `person`;


CREATE TABLE `person`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`lastname` VARCHAR(255)  NOT NULL,
	`firstname` VARCHAR(255)  NOT NULL,
	`identification_type` INTEGER,
	`identification_number` VARCHAR(20),
	`sex` INTEGER  NOT NULL,
	`cuil` VARCHAR(20),
	`is_active` TINYINT default 1,
	`email` VARCHAR(255),
	`phone` VARCHAR(255),
	`birthdate` DATE,
	`birth_country` VARCHAR(255),
	`birth_state` VARCHAR(255),
	`birth_city` VARCHAR(255),
	`observations` TEXT,
	`civil_status` INTEGER default 0 COMMENT 'Representa el estado civil de la persona (Soltero-Casado-Viudo-Divorciado)',
	`address_id` INTEGER,
	`user_id` INTEGER COMMENT 'Si se crea un usuario para la persona, este id representará el sf_guard_user_id',
	`photo` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `person_FI_1` (`address_id`),
	CONSTRAINT `person_FK_1`
		FOREIGN KEY (`address_id`)
		REFERENCES `address` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `person_FI_2` (`user_id`),
	CONSTRAINT `person_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE CASCADE
		ON DELETE SET NULL
)Engine=InnoDB COMMENT='Representa los datos comunes para las diferentes personas del sistema';

#-----------------------------------------------------------------------------
#-- personal
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `personal`;


CREATE TABLE `personal`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER,
	`salary` FLOAT,
	`aging_institution` DATE,
	`file_number` INTEGER,
	`personal_type` INTEGER default 1,
	PRIMARY KEY (`id`),
	INDEX `personal_FI_1` (`person_id`),
	CONSTRAINT `personal_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa las personas no docentes de la institución (regentes, jefe de preceptores, preceptores)';

#-----------------------------------------------------------------------------
#-- head_personal_personal
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `head_personal_personal`;


CREATE TABLE `head_personal_personal`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`head_personal_id` INTEGER,
	`personal_id` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `head_personal_personal` (`head_personal_id`, `personal_id`),
	CONSTRAINT `head_personal_personal_FK_1`
		FOREIGN KEY (`head_personal_id`)
		REFERENCES `personal` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `head_personal_personal_FI_2` (`personal_id`),
	CONSTRAINT `head_personal_personal_FK_2`
		FOREIGN KEY (`personal_id`)
		REFERENCES `personal` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa a un jefe de preceptor con sus preceptores a cargo.';

#-----------------------------------------------------------------------------
#-- student
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student`;


CREATE TABLE `student`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`global_file_number` VARCHAR(20)  NOT NULL COMMENT 'Número de alumno en el colegio (puede que coincida con el numero de alumno de la carrera) depende del behaviour',
	`order_of_merit` VARCHAR(20) COMMENT 'Número de orden de merito del alumno',
	`year_income` DATE COMMENT 'Año de ingreso',
	`nationality` INTEGER default 0 COMMENT 'La nacionalidad del estudiante (nativo, naturalizado, extrangero)',
	`folio_number` VARCHAR(20) COMMENT 'Número de folio del alumno',
	`person_id` INTEGER,
	`occupation_id` INTEGER default null,
	`busy_starts_at` TIME,
	`busy_ends_at` TIME,
	`blood_group` VARCHAR(50),
	`blood_factor` VARCHAR(50),
	`emergency_information` TEXT,
	`health_coverage_id` INTEGER default null,
	`origin_school` VARCHAR(255),
	`educational_dependency` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `student_FI_1` (`person_id`),
	CONSTRAINT `student_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `student_FI_2` (`occupation_id`),
	CONSTRAINT `student_FK_2`
		FOREIGN KEY (`occupation_id`)
		REFERENCES `occupation` (`id`)
		ON DELETE RESTRICT,
	INDEX `student_FI_3` (`health_coverage_id`),
	CONSTRAINT `student_FK_3`
		FOREIGN KEY (`health_coverage_id`)
		REFERENCES `health_coverage` (`id`)
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Representa un alumno';

#-----------------------------------------------------------------------------
#-- brotherhood
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `brotherhood`;


CREATE TABLE `brotherhood`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`student_id` INTEGER,
	`brother_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `brotherhood_FI_1` (`student_id`),
	CONSTRAINT `brotherhood_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `brotherhood_FI_2` (`brother_id`),
	CONSTRAINT `brotherhood_FK_2`
		FOREIGN KEY (`brother_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='Representa la relación de hermandad entre dos alumnos';

#-----------------------------------------------------------------------------
#-- health_coverage
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `health_coverage`;


CREATE TABLE `health_coverage`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- student_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_tag`;


CREATE TABLE `student_tag`
(
	`student_id` INTEGER  NOT NULL,
	`tag_id` INTEGER  NOT NULL,
	PRIMARY KEY (`student_id`,`tag_id`),
	CONSTRAINT `student_tag_FK_1`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `student_tag_FI_2` (`tag_id`),
	CONSTRAINT `student_tag_FK_2`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON UPDATE RESTRICT
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- teacher
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `teacher`;


CREATE TABLE `teacher`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER,
	`salary` FLOAT,
	`aging_institution` DATE,
	`file_number` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `teacher_FI_1` (`person_id`),
	CONSTRAINT `teacher_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='representa a un docente';

#-----------------------------------------------------------------------------
#-- tutor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tutor`;


CREATE TABLE `tutor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`person_id` INTEGER,
	`occupation_id` INTEGER default null,
	`tutor_type_id` INTEGER default null,
	`nationality` INTEGER default 0 COMMENT 'La nacionalidad del tutor (nativo, naturalizado, extrangero)',
	`occupation_category_id` INTEGER default null,
	`study_id` INTEGER default null,
	`is_alive` TINYINT default 1,
	PRIMARY KEY (`id`),
	INDEX `tutor_FI_1` (`person_id`),
	CONSTRAINT `tutor_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `tutor_FI_2` (`occupation_id`),
	CONSTRAINT `tutor_FK_2`
		FOREIGN KEY (`occupation_id`)
		REFERENCES `occupation` (`id`)
		ON DELETE RESTRICT,
	INDEX `tutor_FI_3` (`tutor_type_id`),
	CONSTRAINT `tutor_FK_3`
		FOREIGN KEY (`tutor_type_id`)
		REFERENCES `tutor_type` (`id`)
		ON DELETE RESTRICT,
	INDEX `tutor_FI_4` (`occupation_category_id`),
	CONSTRAINT `tutor_FK_4`
		FOREIGN KEY (`occupation_category_id`)
		REFERENCES `occupation_category` (`id`)
		ON DELETE RESTRICT,
	INDEX `tutor_FI_5` (`study_id`),
	CONSTRAINT `tutor_FK_5`
		FOREIGN KEY (`study_id`)
		REFERENCES `study` (`id`)
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='representa a un tutor';

#-----------------------------------------------------------------------------
#-- tutor_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tutor_type`;


CREATE TABLE `tutor_type`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`)
)Engine=InnoDB COMMENT='representa el tipo de un tutor (madre, padre, hermano mayor de 21, etc)';

#-----------------------------------------------------------------------------
#-- student_tutor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `student_tutor`;


CREATE TABLE `student_tutor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tutor_id` INTEGER,
	`student_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `student_tutor_FI_1` (`tutor_id`),
	CONSTRAINT `student_tutor_FK_1`
		FOREIGN KEY (`tutor_id`)
		REFERENCES `tutor` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `student_tutor_FI_2` (`student_id`),
	CONSTRAINT `student_tutor_FK_2`
		FOREIGN KEY (`student_id`)
		REFERENCES `student` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB COMMENT='representa la tutoría sobre un alumno';

#-----------------------------------------------------------------------------
#-- address
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `address`;


CREATE TABLE `address`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`state_id` INTEGER,
	`city_id` INTEGER,
	`street` VARCHAR(255),
	`number` VARCHAR(255),
	`floor` VARCHAR(255),
	`flat` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `address_FI_1` (`state_id`),
	CONSTRAINT `address_FK_1`
		FOREIGN KEY (`state_id`)
		REFERENCES `state` (`id`),
	INDEX `address_FI_2` (`city_id`),
	CONSTRAINT `address_FK_2`
		FOREIGN KEY (`city_id`)
		REFERENCES `city` (`id`)
)Engine=InnoDB COMMENT='Representa una direccion postal';

#-----------------------------------------------------------------------------
#-- license
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `license`;


CREATE TABLE `license`
(
	`person_id` INTEGER,
	`license_type_id` INTEGER,
	`date_from` DATE  NOT NULL,
	`date_to` DATE,
	`observation` TEXT,
	`is_active` TINYINT default 1,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `license_FI_1` (`person_id`),
	CONSTRAINT `license_FK_1`
		FOREIGN KEY (`person_id`)
		REFERENCES `person` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `license_FI_2` (`license_type_id`),
	CONSTRAINT `license_FK_2`
		FOREIGN KEY (`license_type_id`)
		REFERENCES `license_type` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)Engine=InnoDB COMMENT='Licencia de una persona';

#-----------------------------------------------------------------------------
#-- license_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `license_type`;


CREATE TABLE `license_type`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `license_type` (`name`)
)Engine=InnoDB COMMENT='Tipos de licencia';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
