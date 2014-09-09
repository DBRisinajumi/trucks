<?php

class m140908_201401_alter_vtrs extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
            ALTER TABLE `vtrs_truck_service` ADD FOREIGN KEY (`vtrs_fixr_id`) REFERENCES `eu`.`fixr_fiit_x_ref`(`fixr_id`); 
            ALTER TABLE `vtls_trailer_service` ADD FOREIGN KEY (`vtls_fixr_id`) REFERENCES `eu`.`fixr_fiit_x_ref`(`fixr_id`); 
            ALTER TABLE `vtrd_trailer_doc` ADD FOREIGN KEY (`vtrd_fixr_id`) REFERENCES `eu`.`fixr_fiit_x_ref`(`fixr_id`); 


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
