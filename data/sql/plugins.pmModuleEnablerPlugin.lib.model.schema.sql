
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- pm_configuration
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pm_configuration`;


CREATE TABLE `pm_configuration`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- pm_module
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pm_module`;


CREATE TABLE `pm_module`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`is_enabled` TINYINT default 0,
	`pm_configuration_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`(20)),
	INDEX `pm_module_FI_1` (`pm_configuration_id`),
	CONSTRAINT `pm_module_FK_1`
		FOREIGN KEY (`pm_configuration_id`)
		REFERENCES `pm_configuration` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
