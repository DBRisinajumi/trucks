<?php

class m141025_214301_create_vodo extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
        CREATE TABLE `vodo_odometer`(  
          `vodo_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
          `vodo_vtrc_id` SMALLINT UNSIGNED NOT NULL COMMENT 'Truck',
          `vodo_type` ENUM('READING','VOYAGE_RUN','VOYAGE_ODO','ODO_CHANGE') NOT NULL COMMENT 'reading type',
          `vodo_start_odo` SMALLINT UNSIGNED,
          `vodo_start_datetime` DATETIME,
          `vodo_end_odo` SMALLINT UNSIGNED,
          `vodo_end_datetime` DATETIME,
          `vodo_run` SMALLINT UNSIGNED COMMENT 'mileage',
          `vodo_abs_ado` MEDIUMINT UNSIGNED COMMENT 'absolut odmeter',
          `vodo_notes` TEXT,
          `vodo_ref_model` VARCHAR(20) CHARSET latin1 COMMENT 'referenc model name',
          `vodo_ref_id` INT UNSIGNED COMMENT 'refernc model pk value',
          PRIMARY KEY (`vodo_id`)
        ) ENGINE=INNODB CHARSET=utf8
        COMMENT='Registre all odometer reading';

        ALTER TABLE `vodo_odometer`(  
          ADD FOREIGN KEY (`vodo_vtrc_id`) REFERENCES `vtrc_truck`(`vtrc_id`)
        ) ENGINE=INNODB CHARSET=utf8
        COMMENT='Registre all odometer reading';

        ");
	}

	/**
	 * Drops the table
	 */
	public function down()
	{
	
	}

	/**
	 * Creates initial version of the table in a transaction-safe way.
	 * Uses $this->up to not duplicate code.
	 */
	public function safeUp()
	{
		$this->up();
	}

	/**
	 * Drops the table in a transaction-safe way.
	 * Uses $this->down to not duplicate code.
	 */
	public function safeDown()
	{
		$this->down();
	}
}
