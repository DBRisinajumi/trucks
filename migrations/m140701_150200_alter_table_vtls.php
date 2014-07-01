<?php

class m140701_150200_alter_table_vtls extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
            ALTER TABLE `vtls_trailer_service`   
                 DROP COLUMN `vtls_start_date`, 
                 DROP COLUMN `vtls_end_date`, 
                 DROP COLUMN `vtls_price`, 
                 DROP COLUMN `vtls_fcrn_id`, 
                 DROP COLUMN `vtls_deleted`, 
                 ADD COLUMN `vtls_fixr_id` INT UNSIGNED NULL AFTER `vtls_notes`, 
                 DROP INDEX `vtls_fcrn_id`,
                 DROP FOREIGN KEY `vtls_trailer_service_ibfk_2`;
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
