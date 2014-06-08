<?php

class m140608_214500_alter_table_vtdc extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
            ALTER TABLE `vtdc_truck_doc` DROP COLUMN `vtcd_fcrn_id`, DROP COLUMN `vtcd_price`, ADD COLUMN `vtdc_fixr_id` INT UNSIGNED NULL AFTER `vtdc_vtdt_id`, DROP INDEX `vtcd_fcrn_id`, DROP FOREIGN KEY `vtdc_truck_doc_ibfk_3`; 
            ALTER TABLE `vtdc_truck_doc` ADD FOREIGN KEY (`vtdc_fixr_id`) REFERENCES `fixr_fiit_x_ref`(`fixr_id`); 
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
