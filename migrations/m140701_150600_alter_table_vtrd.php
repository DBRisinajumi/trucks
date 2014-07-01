<?php

class m140701_150600_alter_table_vtrd extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
        ALTER TABLE `vtrd_trailer_doc`   
          DROP COLUMN `vtrd_updated`, 
          DROP COLUMN `vtcd_fcrn_id`, 
          DROP COLUMN `vtcd_price`, 
          DROP COLUMN `vtrd_deleted`, 
          ADD COLUMN `vtrd_fixr_id` INT UNSIGNED NULL AFTER `vtrd_vtdt_id`, 
          DROP INDEX `vtcd_fcrn_id`,
          DROP FOREIGN KEY `vtrd_truck_doc_ibfk_3`;
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
