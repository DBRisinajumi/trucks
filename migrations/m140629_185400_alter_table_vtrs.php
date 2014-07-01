<?php

class m140629_185400_alter_table_vtrs extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
            ALTER TABLE `vtrs_truck_service`   
              DROP COLUMN `vtrs_start_date`, 
              DROP COLUMN `vtrs_end_date`, 
              DROP COLUMN `vtrs_price`, 
              DROP COLUMN `vtrs_fcrn_id`, 
              DROP COLUMN `vtrs_deleted`, 
              ADD COLUMN `vtrs_fixr_id` INT UNSIGNED NULL AFTER `vtrs_vsrv_id`, 
              DROP INDEX `vtrs_fcrn_id`,
              DROP FOREIGN KEY `vtrs_truck_service_ibfk_2`;
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
